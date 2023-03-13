<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    |
    | For detailed instructions you can look the title section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'title' => '',
    'title_prefix' => '',
    'title_postfix' => '| Correspondencia',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon.
    |
    | For detailed instructions you can look the favicon section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'use_ico_only' => false,
    'use_full_favicon' => false,

    /*
    |--------------------------------------------------------------------------
    | Logo
    |--------------------------------------------------------------------------
    |
    | Here you can change the logo of your admin panel.
    |
    | For detailed instructions you can look the logo section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'logo' => '',
    'logo_img' => 'vendor/adminlte/dist/img/logoAasana4.png',
    'logo_img_class' => 'elevation-2 ml-4 rounded',
    'logo_img_xl' => null,
    'logo_img_xl_class' => '',
    'logo_img_alt' => 'correspondencia',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and change the user menu.
    |
    | For detailed instructions you can look the user menu section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    |
    */

    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-dark',
    'usermenu_image' => false,
    'usermenu_desc' => false,
    'usermenu_profile_url' => true,

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | Here we change the layout of your admin panel.
    |
    | For detailed instructions you can look the layout section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => true,
    'layout_fixed_navbar' => true,
    'layout_fixed_footer' => true,

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the authentication views.
    |
    | For detailed instructions you can look the auth classes section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => 'bg-gradient-dark',
    'classes_auth_body' => '',
    'classes_auth_footer' => 'text-center',
    'classes_auth_icon' => 'fa-lg text-dark',
    'classes_auth_btn' => 'btn-flat btn-dark',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Here you can change the look and behavior of the admin panel.
    |
    | For detailed instructions you can look the admin panel classes here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'classes_body' => '',
    'classes_brand' => 'bg-transparent',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',
    //'classes_sidebar' => 'sidebar-light-dark shadow elevation-4 bg-gray-dark',
    'classes_sidebar' => 'bg-light',
    //'classes_sidebar' => 'sidebar-dark-white shadow elevation-4 bg-gray-dark',
    'classes_sidebar_nav' => 'bg-white elevation-2',
    'classes_topnav' => 'bg-white elevation-2',
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container',

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar of the admin panel.
    |
    | For detailed instructions you can look the sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'sidebar_mini' => false,
    'sidebar_collapse' => false,
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false,
    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-dark',
    'sidebar_scrollbar_auto_hide' => 'l',
    'sidebar_nav_accordion' => true,
    'sidebar_nav_animation_speed' => 300,

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Here we can modify the right sidebar aka control sidebar of the admin panel.
    |
    | For detailed instructions you can look the right sidebar section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/7.-Layout-and-Styling-Configuration
    |
    */

    'right_sidebar' => true,
    'right_sidebar_icon' => 'fas fa-comments',
    'right_sidebar_theme' => 'light',
    'right_sidebar_slide' => true,
    'right_sidebar_push' => false,
    'right_sidebar_scrollbar_theme' => 'os-theme-light',
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Here we can modify the url settings of the admin panel.
    |
    | For detailed instructions you can look the urls section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/6.-Basic-Configuration
    | ERICK
    |
    */

    'use_route_url' => false,
    'dashboard_url' => 'dashboard',
    'logout_url' => 'logout',
    'login_url' => 'login',
    'register_url' => 'register',
    'password_reset_url' => 'forgot-password',
    'password_email_url' => 'passwords/email',
    'profile_url' => false,

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Laravel Mix option for the admin panel.
    |
    | For detailed instructions you can look the laravel mix section here:||
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'enabled_laravel_mix' => false,
    'laravel_mix_css_path' => 'css/app.css',
    'laravel_mix_js_path' => 'js/app.js',

    /*
    |--------------------------------------------------------------------------
    | Menu Items
    |--------------------------------------------------------------------------
    |
    | Here we can modify the sidebar/top navigation of the admin panel.
    |
    | For detailed instructions you can look here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'menu' => [
        [
            'text' => 'search',
            'search' => false,
            'topnav' => true,
        ],

        ['header' => 'DOCUMENTACIÓN', 'can' => 'hojaruta_index'],
            
            [
                'text' => 'Hojas de Ruta',
                'url'  => 'hojas_de_ruta',
                'icon' => 'fas fa-fw fa-folder-plus',
                'icon_color' => 'dark',
                'can' => 'hojaruta_index',
            ],
            [
                'text' => 'Hojas de Ruta Externas',
                'url'  => '#',
                'icon' => 'fas fa-fw fa-folder-plus',
                'icon_color' => 'dark',
                'can' => 'hojarutaexterna_index',
            ],
            [
                'text' => 'Agrupar H.R.',
                'url'  => 'agrupar_hr',
                'icon' => 'fas fa-fw fa-layer-group',
                'icon_color' => 'dark',
                'can' => 'hojaruta_agrupar_archivar_derivar',
            ],
            [
                'text' => 'Buzón de Salida',
                'url'  => 'buzon_salida',
                'icon' => 'fas fa-fw fa-paper-plane',
                'icon_color' => 'dark',
                'can' => 'buzonsalida_index',
            ],
        
        ['header' => 'CONSULTAS', 'can' => 'seguimientohojaruta_index', 'text_color' => 'text-danger'],
            [
                'text' => 'Seguimiento a H.R.',
                'url'  => '#',
                'icon' => 'fas fa-fw fa-eye',
                'icon_color' => 'dark',
                'can' => 'seguimientohojaruta_index',
            ],
            [
                'text' => 'Documentos Archivados',
                'url'  => 'hr_archivados',
                'icon' => 'fas fa-fw fa-server',
                'icon_color' => 'dark',
                'can' => 'hojarutaarchivadas_index',
            ],

        ['header' => 'OTROS', 'can' => 'otros_index'],
            [
                'text' => 'Comisiones de Viaje',
                'url'  => '#',
                'icon' => 'fas fa-fw fa-folder-plus',
                'icon_color' => 'dark',
                'can' => 'otros_index',
            ],
        

        ['header' => 'REGIONALES', 'can' => 'Regionales_HR_index'],
        [
            'text' => 'H.R. Regionales',
            'icon'     => 'fas fa-fw fa-file-alt',
            'icon_color' => 'dark',
            'can' => 'Regionales_HR_index',
            'submenu' =>[
                [
                    'text' => 'Crear Hoja de Ruta',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-folder-plus',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                ],
                [
                    'text' => 'Enviados',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-paper-plane',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                ],
                [
                    'text' => 'Recibidos',
                    'url'  => '#',
                    'icon' => 'fas fa-fw fa-download',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                ],
            ],
        ],    




        ['header' => 'SISTEMA', 'can' => 'documento_index', 'can' => 'funcionario_index'],
        
        [
            'text' => 'Institución',
            'icon'     => 'fas fa-fw fa-file-alt' ,
            'icon_color' => 'dark', 'can' => 'organigramas_index',
            'submenu' => [
                [
                    'text' => 'Organigrama',
                    'url'  => 'organigramas',
                    'icon' => 'fas fa-fw fa-sitemap',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                    'can'  => 'organigramas_index',
                ],
                [
                    'text' => 'Cargos',
                    'url'  => 'cargos',
                    'icon' => 'fas fa-fw fa-chalkboard-teacher',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                    'can'  => 'cargos_index',
                ],
            ],
        ],
        
        [
            'text' => 'Personal',
            'icon'     => 'fas fa-fw fa-file-alt',
            'icon_color' => 'dark', 'can' => 'funcionario_index',
            'submenu' => [
                [
                    'text' => 'Roles y Permisos',
                    'url'  => 'permissions_roles/create',
                    'icon' => 'fas fa-fw fa-user-tag',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                    'can' => 'asignarRole_index',
                ],

                [
                    'text' => 'Funcionarios',
                    'url'  => 'funcionarios',
                    'icon' => 'fas fa-fw fa-users',
                    'icon_color' => 'dark',
                    'shift' => 'ml-4' ,
                    'can' => 'funcionario_index',
                ],
                
            ],
        ],
        
        [
            'text' => 'Documentación Base',
            'url'  => 'documentos',
            'icon' => 'fas fa-fw fa-file-signature',
            'icon_color' => 'dark',
            'can' => 'documento_index',
        ],
        [
            'header' => '',
        ],


    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here we can modify the menu filters of the admin panel.
    |
    | For detailed instructions you can look the menu filters section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/8.-Menu-Configuration
    |
    */

    'filters' => [
        JeroenNoten\LaravelAdminLte\Menu\Filters\GateFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\HrefFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\SearchFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ActiveFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\ClassesFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\LangFilter::class,
        JeroenNoten\LaravelAdminLte\Menu\Filters\DataFilter::class,
    ],

    /*
    |--------------------------------------------------------------------------
    | Plugins Initialization
    |--------------------------------------------------------------------------
    |
    | Here we can modify the plugins used inside the admin panel.
    |
    | For detailed instructions you can look the plugins section here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    |
    */

    'plugins' => [
        'Datatables' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/jquery.dataTables.min.js',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/js/dataTables.bootstrap4.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdn.datatables.net/1.10.19/css/dataTables.bootstrap4.min.css',
                ],
            ],
        ],
        'Select2' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.min.js',
                ],
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/css/select2.css',
                ],
            ],
        ],
        'Chartjs' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/Chart.js/2.7.0/Chart.bundle.min.js',
                ],
            ],
        ],
        'Sweetalert2' => [
            'active' => true,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => true,
                    'location' => 'vendor/sweetalert2/sweetalert2.all.min.js',
                ],
            ],
        ],
        'Pace' => [
            'active' => false,
            'files' => [
                [
                    'type' => 'css',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/themes/blue/pace-theme-center-radar.min.css',
                ],
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdnjs.cloudflare.com/ajax/libs/pace/1.0.2/pace.min.js',
                ],
            ],
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Here we can enable the Livewire support.
    |
    | For detailed instructions you can look the livewire here:
    | https://github.com/jeroennoten/Laravel-AdminLTE/wiki/9.-Other-Configuration
    */

    'livewire' => true,
];
