//admin

return [
            // Inicio
            'Dashboard' => [
                'submenu' => 0,
                'ruta' => route('home'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-home',
                'complementoruta' => '',
            ],
            // Fin inicio

               // Ecommerce
            'Ecommerce' => [
            'submenu' => 1,
            'ruta' => 'javascript:;',
            'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
            'icon' => 'feather icon-shopping-cart',
            'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Grupos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('group.index'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Paquetes',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('package.index'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Tienda',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('shop'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin Ecommerce

            // Informenes
            'Informenes' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-file-text',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Pedidos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('reports.pedidos'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Comisiones',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('reports.comision'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin Informenes

            // Organización
            'Organización' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-users',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Arbol',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_type', 'tree'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Referidos Directos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_list_network', 'direct'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Referidos en Red',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_list_network', 'network'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin organizacion
            // Cierre Comisiones
            'Cierre Comisiones' => [
                'submenu' => 0,
                'ruta' => route('commission_closing.index'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => '-',
                'complementoruta' => '',
            ],
            // Fin Cierre Comisiones
            // Liquidaciones
            'Liquidaciones' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'fa fa-list-alt',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'General Liquidaciones',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('settlement'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Liquidaciones Pendientes',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('settlement.pending'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Liquidaciones Pagadas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('settlement.history.status', 'Pagadas'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin Liquidaciones

            // Usuarios
            'Usuarios' => [
                'submenu' => 0,
                'ruta' => route('users.list-user'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'fa fa-users',
                'complementoruta' => '',
            ],
            // Fin Usuarios

        ];



        //USUARIOS

        return [

            // Inicio
            'Inicio' => [
                'submenu' => 0,
                'ruta' => route('home.user'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-home',
                'complementoruta' => '',
            ],
            // Fin inicio

            // Añadir Saldo
            'Ecommerce' => [
                'submenu' => 0,
                'ruta' => route('shop'),
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-shopping-cart',
                'complementoruta' => '',
            ],
            // Fin añadir saldo

            // Organización
            'Organización' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-users',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Arbol',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_type', 'tree'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Referidos Directos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_list_network', 'direct'),
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Referidos en Red',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('genealogy_list_network', 'network'),
                        'complementoruta' => ''
                    ],
                ],
            ],
            // Fin Organización
       
            //Inverisones
            'Inverisones' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-activity',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Activas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => '',
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Culminadas',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => '',
                        'complementoruta' => '',
                    ],
                ],
            ],
            // Fin Inverisones

            // Financiero
            'Financiero' => [
                'submenu' => 1,
                'ruta' => 'javascript:;',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-dollar-sign',
                'complementoruta' => '',
                'submenus' => [
                    [
                        'name' => 'Pagos',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => '',
                        'complementoruta' => ''
                    ],
                    [
                        'name' => 'Billetera',
                        'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                        'ruta' => route('wallet.index'),
                        'complementoruta' => '',
                    ],
                ],
            ],
            // Fin Financiero

            // Historial de Ordenes
            'Historial de Ordenes' => [
                'submenu' => 0,
                'ruta' => '',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-clipboard',
                'complementoruta' => '',
            ],
            // Fin historial de ordenes

            // tickets
              'Tickets' => [
                'submenu' => 0,
                'ruta' => '',
                'blank'=> '', // si es para una pagina diferente del sistema solo coloquen _blank
                'icon' => 'feather icon-tag',
                'complementoruta' => '',
            ],
            // Fin tickets
        ];