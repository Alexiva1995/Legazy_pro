<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\View;

class Menu
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $menu = null;
        if (Auth::check()) {
            $menu = $this->menuUsuario();
            if (Auth::user()->admin == 1) {
                $menu = $this->menuAdmin();
            }
        }
        View::share('menu', $menu);
        return $next($request);
    }

    /**
     * Permite Obtener el menu del usuario
     *
     * @return void
     */
    public function menuUsuario()
    {
       // $orden = app($OrdenService)->find($id);

        return [
            // Inicio
            'Dashboard' => [
                'submenu' => 0,
                'ruta' => route('home.user'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-home',
                'complementoruta' => '',
            ],
            // Fin inicio

            // Tienda
            'Tienda' => [
                'submenu' => 0,
                'ruta' => route('shop'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-shopping-cart',
                'complementoruta' => '',
            ],
            // Fin añadir Tienda

            // Negocio
            'Negocio' => [
                'submenu' => 1,
                'ruta' => route('group.index'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-briefcase',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Árbol binario',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_type', 'tree'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Directos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_list_network', 'direct'),
                        'complementoruta' => ''
                    ],

                ],
            ],
            // Fin añadir Negocio

            // Financiero
            'Inversiones' => [
                'submenu' => 1,
                'ruta' => route('home'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-dollar-sign',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Wallet',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('wallet.index'),
                        'complementoruta' => '' 
                    ],
                    [
                        'name' => 'Retiros',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('payments.index'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Inversiones Activas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('inversiones.index', 1),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Inversiones Culminadas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('inversiones.index', 2),
                        'complementoruta' => ''
                    ]
                ],
            ],
            // Fin Financiero

            // Soporte
            'Soporte' => [
                'submenu' => 0,
                'ruta' => route('ticket.list-user'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-help-circle',
                'complementoruta' => '',
            ],
            // Fin Soporte
        ];

    }

    /**
     * Permite Obtener el menu del admin
     *
     * @return void
     */
    public function menuAdmin()
    {
        return [

            // tickets
            'Tickets' => [
                'submenu' => 0,
                'ruta' => '',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-tag',
                'complementoruta' => '',
            ],
            // Fin tickets



            // Inicio
            'Dashboard' => [
                'submenu' => 0,
                'ruta' => route('home'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-home',
                'complementoruta' => '',
            ],
            // Fin inicio

            // Ordenes
            'Ordenes' => [
                'submenu' => 0,
                'ruta' => route('reports.pedidos'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-file-text',
                'complementoruta' => '',
            ],
            // Fin Ordenes

            // Paquetes
            'Paquetes' => [
                'submenu' => 1,
                'ruta' =>'',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-archive',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Lista de paquetes',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('products.package-list'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Grupos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('products.package-grupos'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Administra Tienda',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('products.package-index'),
                        'complementoruta' => ''
                    ],


                ],
            ],
            // Fin Paquetes

            // Red
            'Red' => [
                'submenu' => 1,
                'ruta' => route('package.index'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-globe',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Usuarios',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('users.list-user'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Árbol binario',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_type', 'tree'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Directos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_list_network', 'direct'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin Red

            // Financiero
            'Financiero' => [
                'submenu' => 1,
                'ruta' => route('home'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-dollar-sign',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Activas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('inversiones.index', 1),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Culminadas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('inversiones.index', 2),
                        'complementoruta' => ''
                    ]
                ],
            ],
            // Fin Financiero
            // Liquidaciones
            'Retiros' => [
                'submenu' => 1,
                'ruta' => route('home'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-pocket',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Por confirmar',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('settlement.pending'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Confirmados',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('settlement.history.status', 'Pagadas'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin Retiros

            // Soporte
            'Soporte' => [
                'submenu' => 0,
                'ruta' => route('ticket.list-admin'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-help-circle',
                'complementoruta' => '',
            ],
            // Fin Soporte
        ];
    }
}
