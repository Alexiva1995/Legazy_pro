<?php

namespace App\Http\Controllers;

use App\Models\Groups;
use App\Models\OrdenPurchases;
use App\Models\Packages;
use App\Models\User;
use Illuminate\Support\Facades\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;



class TiendaController extends Controller
{

    public $apis_key_nowpayments;

    public function __construct()
    {
        $this->apis_key_nowpayments = 'YH0WTN1-5T64QQC-MRVZZPE-0DSX41R';
    }

    /**
     * Lleva a la vista de la tienda
     *
     * @return void
     */
    public function index()
    {
        try {
            // title
            View::share('titleg', 'Tienda - Grupos');
            $categories = Groups::all()->where('status', 1);

            return view('shop.index', compact('categories'));
        } catch (\Throwable $th) {
            Log::error('Tienda - Index -> Error: '.$th);
            abort(403, "Ocurrio un error, contacte con el administrador");
        }
    }

    /**
     * Lleva a la vista de productos de un paquete en especificio
     *
     * @param integer $idgroup
     * @return void
     */
    public function products($idgroup)
    {
        try {
            // title
            View::share('titleg', 'Tienda - Productos');
            $category = Groups::find($idgroup);
            $services = $category->getPackage->where('status', 1);

            return view('shop.products', compact('services'));
        } catch (\Throwable $th) {
            Log::error('Tienda - products -> Error: '.$th);
            abort(403, "Ocurrio un error en shop, contacte con el administrador");
        }
    }

    /**
     * Permiete procesar la orden de compra
     *
     * @param Request $request
     * @return void
     */
    public function procesarOrden(Request $request)
    {

        //Obtener el valor de la direccion de billetera del usuario logueado
        $check_wallet = DB::table('users')
            ->where('id', '=', Auth::user()->id)->value('wallet_address');

        if($check_wallet != null || $check_wallet != ''){//Validar si usuario tiene la wallet registrada.

            $validate = $request->validate([
                'idproduct' => 'required'
            ]);

            try {
                if ($validate) {
                    $paquete = Packages::find($request->idproduct);

                    $porcentaje = ($paquete->price * 0.03);
                    $total = ($paquete->price + $porcentaje);

                    $data = [
                        'iduser' => Auth::id(),
                     //'group_id' => $paquete->getGroup->id,
                        'package_id' => $paquete->id,
                        'cantidad' => 1,
                        'total' => $total
                    ];

                    $data['idorden'] = $this->saveOrden($data);

                    //dd($data);

                    $data['descripcion'] = $paquete->description;
                    $url = $this->generalUrlOrden($data);
                    if (!empty($url)) {
                        return redirect($url);

                    }else{
                        OrdenPurchases::where('id', $data['idorden'])->delete();
                        return redirect()->back()->with('msj-info', 'Problemas al general la orden, intente mas tarde');
                    }
                }
            } catch (\Throwable $th) {
               Log::error('Tienda - procesarOrden -> Error: '.$th);
                abort(403, "Ocurrio un error en la funcion  procesar orden  , contacte con el administrador");
            }
        }
        return redirect()->back()->with('msj-warning', 'Necesita registrar su billetera para poder continuar con la operación.');

    }

    /**
     * Guarda la informacion de las ordenes nuevas
     *
     * @param array $data
     * @return integer
     */
    public function saveOrden($data): int
    {
       // dd($data);

        return OrdenPurchases::insertGetId($data);

    }

    /**
     * Notifica el estado de la compra una vez realizada
     *
     * @param string $status
     * @return void
     */
    public function statusProcess($status)
    {
        $type = ($status == 'Completada') ? 'success' : 'danger';
        $msj = 'Compra '.$status;

        return redirect()->route('shop')->with('msj-'.$type, $msj);
    }

    /**
     * Permite recibir el estado de las ordenes
     *
     * @param Request $resquet
     * @return void
     */
    public function ipn(Request $resquet)
    {
        Log::info('ipn prueba ->', $resquet);
    }

    /**
     * Permite general el url para pagar la compra
     *
     * @param array $data
     * @return string
     */
    private function generalUrlOrden($data): string
    {
       try {
            $headers = [
                'x-api-key: '.$this->apis_key_nowpayments,
                'Content-Type:application/json'
            ];
           // dd($headers);
            $resul = '';
            $curl = curl_init();

            $dataRaw = collect([
                'price_amount' => $data['total'],
                "price_currency" => "usd",
                "order_id" => $data['idorden'],
                'pay_currency' => 'USDTTRC20',
                "order_description" => $data['descripcion'],
                "ipn_callback_url" => route('shop.ipn'),
                "success_url" => route('shop.proceso.status', 'Completada'),
                "cancel_url" => route('shop.proceso.status', 'Cancelada')
            ]);


            curl_setopt_array($curl, array(
                CURLOPT_URL => "https://api.nowpayments.io/v1/invoice",
                CURLOPT_RETURNTRANSFER => true,
                CURLOPT_ENCODING => "",
                CURLOPT_MAXREDIRS => 10,
                CURLOPT_TIMEOUT => 30,
                CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
                CURLOPT_CUSTOMREQUEST => "POST",
                CURLOPT_POSTFIELDS => $dataRaw->toJson(),
                CURLOPT_HTTPHEADER => $headers
            ));

                $response = curl_exec($curl);
                $err = curl_error($curl);
                curl_close($curl);
                if ($err) {
                    Log::error('Tienda - generalUrlOrden -> Error curl: '.$err);
                } else {
                    $response = json_decode($response);
                    OrdenPurchases::where('id', $data['idorden'])->update(['idtransacion' => $response->id]);
                    $resul = $response->invoice_url;
                }

            return $resul;
        } catch (\Throwable $th) {
            Log::error('Tienda - generalUrlOrden -> Error: '.$th);
            abort(403, "Ocurrio un error2, contacte con el administrador");
        }
    }
}
