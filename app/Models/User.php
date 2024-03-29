<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

use App\Notifications\MailResetPasswordNotification as ResetPasswordNotification;


class User extends Authenticatable

{
    use HasFactory;
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'last_name', 'username', 'email', 'password', 'whatsapp',
        'fullname', 'referred_id', 'binary_id', 'admin', 'balance', 'status',
        'wallet', 'address', 'binary_side', 'binary_side_register', 'dni',
        'photoDB', 'wallet_address', 'point_rank', 'rank_id', 'type_wallet',
        'code_licence', 'token_google', 'activar_2fact', 'code_email', 'code_email_date',
        'not_payment_binary_point_der', 'not_payment_binary_point_izq'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token', 'code_licence'
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ]; 



    /**
     * Permite obtener todas las ordenes de compra de saldo realizadas
     *
     * @return void
     */
    public function getWallet()
    {
        return $this->hasMany('App\Models\Wallet', 'iduser');
    }

    /**
     * Permite obtener todas la liquidaciones que tengo
     *
     * @return void
     */
    public function getLiquidate()
    {
        return $this->hasMany('App\Models\Liquidaction', 'iduser');
    }

    /**
     * Permite obtener las ordenes de servicio asociada a una categoria
     *
     * @return void 
     */
    public function getUserOrden()
    {
        return $this->belongsTo('App\Models\OrdenPurchases', 'id', 'iduser');
    }

    public function sendPasswordResetNotification($token)
    {
        // Your your own implementation.
        $this->notify(new ResetPasswordNotification($token));
    }

    public function getInversiones()
    {
        return $this->hasMany('App\Models\Inversion', 'iduser');
    }

    public function inversionMasAlta()
    {
        return $this->getInversiones()->where('status', 1)->orderBy('invertido', 'desc')->first();
        //->sortByDesc('invertido')
    }

    public function saldoDisponible()
    {
        return number_format($this->getWallet->where('status', 0)->where('liquidado', 0)->where('tipo_transaction', 0)->sum('monto'), 2);
    }

    /**
     * muestra el saldo disponible en numeros
     *
     * @return float
     */
    public function saldoDisponibleNumber(): float
    {
        return $this->getWallet->where('status', 0)->where('liquidado', 0)->where('tipo_transaction', 0)->sum('monto');
    }

    public function gananciaActual()
    {   
        if(isset($this->inversionMasAlta()->ganacia) && $this->inversionMasAlta()->ganacia != null){
            return number_format($this->inversionMasAlta()->ganacia, 2);
        }else{
            return number_format(0, 2);
        }
        
    }

    public function progreso()
    {
        if(isset($this->inversionMasAlta()->max_ganancia) && isset($this->inversionMasAlta()->restante)){
            $total = $this->inversionMasAlta()->max_ganancia - $this->inversionMasAlta()->restante;

            if($this->inversionMasAlta()->max_ganancia != null && $this->inversionMasAlta()->max_ganancia != 0){
                $operacion = ($total * 100) / $this->inversionMasAlta()->max_ganancia;
            }else{
                $operacion = 0;
            }
        }else{
            $operacion = 0;
        }
        return $operacion;
    }

    public function fechaActivo()
    {
        if($this->inversionMasAlta() != null){
            return $this->inversionMasAlta()->created_at->format('Y-m-d');
        }else{
            return "";
        }
    }

    /**
     * Permite obtener de forma bonita el status de un usuario
     *
     * @return string
     */
    public function getStatus(): string
    {
        $estado = 'Inactivo';
        if ($this->status == '1') {
            $estado = 'Activo';
        } elseif($this->status == '1') {
            $estado = 'Eliminado';
        }
        return $estado;
    }

    /**
     * Permite obtener el fee de los retiros
     *
     * @return float
     */
    public function getFeeWithdraw(): float
    {
        $result = 0;
        $disponible = $this->saldoDisponibleNumber();        
        if ($disponible > 0) {
            $result = ($disponible * 0.06);
        }
        return floatval($result);
    }

    /**
     * Obtiene el total a retirar de cada usuario
     *
     * @return float
     */
    public function totalARetirar(): float
    {
        $result = 0;
        $disponible = $this->saldoDisponibleNumber();        
        if ($disponible > 0) {
            $result = ($disponible - $this->getFeeWithdraw());
        }
        return floatval($result);
    }
}
