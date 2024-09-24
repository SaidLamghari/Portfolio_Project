<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Title
    |--------------------------------------------------------------------------
    |
    | Here you can change the default title of your admin panel.
    | The title_prefix and title_postfix are optional and can be used
    | to customize how the title is displayed in the browser tab.
    |
    */
    'title' => 'LaManag',
    'title_prefix' => '',
    'title_postfix' => '',

    /*
    |--------------------------------------------------------------------------
    | Favicon
    |--------------------------------------------------------------------------
    |
    | Here you can activate the favicon (the small icon shown in the browser tab).
    | Set 'use_ico_only' to true if you are only using a .ico file.
    | 'use_full_favicon' can be set to true for other file types like .png or .svg.
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
    | The logo will appear in the upper-left corner of the admin panel.
    | You can provide HTML to customize the logo text and image.
    |
    */
    'logo' => '<b>LabManag</b>',
    'logo_img' => 'vendor/adminlte/dist/img/AdminLTELogo.png',
    'logo_img_class' => 'brand-image img-circle elevation-3',
    'logo_img_xl' => null, // Extra-large logo for large screen views
    'logo_img_xl_class' => 'brand-image-xs',
    'logo_img_alt' => 'AdminLTE',

    /*
    |--------------------------------------------------------------------------
    | User Menu
    |--------------------------------------------------------------------------
    |
    | Here you can activate and customize the user menu.
    | The user menu displays user-specific information, such as name, image, and profile links.
    |
    */
    'usermenu_enabled' => true,
    'usermenu_header' => true,
    'usermenu_header_class' => 'bg-info', // Background color for user menu header
    'usermenu_image' => true, // Enable user profile image

    'usermenu_desc' => true, // Display user description below the name
    'usermenu_profile_url' => false, // URL to the user profile page

    /*
    |--------------------------------------------------------------------------
    | Layout
    |--------------------------------------------------------------------------
    |
    | You can modify the layout of your admin panel here.
    | Options include boxed layout, fixed sidebar, fixed navbar, etc.
    |
    */
    'layout_topnav' => null,
    'layout_boxed' => null,
    'layout_fixed_sidebar' => null,
    'layout_fixed_navbar' => null,
    'layout_fixed_footer' => null,
    'layout_dark_mode' => null, // Set to true for dark mode

    /*
    |--------------------------------------------------------------------------
    | Authentication Views Classes
    |--------------------------------------------------------------------------
    |
    | Customize the appearance of the authentication views (login, register, etc.).
    | You can set different classes for the card, header, body, footer, and buttons.
    |
    */
    'classes_auth_card' => 'card-outline card-primary',
    'classes_auth_header' => '',
    'classes_auth_body' => '',
    'classes_auth_footer' => '',
    'classes_auth_icon' => '',
    'classes_auth_btn' => 'btn-flat btn-primary',

    /*
    |--------------------------------------------------------------------------
    | Admin Panel Classes
    |--------------------------------------------------------------------------
    |
    | Customize the look and feel of the admin panel.
    | You can change the classes for various elements such as the body, sidebar, navbar, etc.
    |
    */
    'classes_body' => '',
    'classes_brand' => '',
    'classes_brand_text' => '',
    'classes_content_wrapper' => '',
    'classes_content_header' => '',
    'classes_content' => '',

    'classes_sidebar' => 'sidebar-dark-primary elevation-4', // Sidebar color and shadow
    'classes_sidebar_nav' => '',
    'classes_topnav' => 'navbar-white navbar-light', // Top navigation bar classes
    'classes_topnav_nav' => 'navbar-expand',
    'classes_topnav_container' => 'container', // Container class for the top navbar

    /*
    |--------------------------------------------------------------------------
    | Sidebar
    |--------------------------------------------------------------------------
    |
    | Modify the sidebar's behavior and appearance.
    | You can enable/disable sidebar mini, auto-size on collapse, and scrolling features.
    |
    */
    'sidebar_mini' => 'lg', // Enable sidebar mini on large screens
    'sidebar_collapse' => false, // Start with the sidebar collapsed
    'sidebar_collapse_auto_size' => false,
    'sidebar_collapse_remember' => false, // Remember the collapse state on page reload

    'sidebar_collapse_remember_no_transition' => true,
    'sidebar_scrollbar_theme' => 'os-theme-light', // Scrollbar theme
    'sidebar_scrollbar_auto_hide' => 'l', // Auto-hide scrollbar
    'sidebar_nav_accordion' => true, // Enable accordion-style navigation
    'sidebar_nav_animation_speed' => 300, // Sidebar animation speed in milliseconds

    /*
    |--------------------------------------------------------------------------
    | Control Sidebar (Right Sidebar)
    |--------------------------------------------------------------------------
    |
    | Customize the right sidebar, often referred to as the control sidebar.
    | Options include enabling/disabling the sidebar, customizing the theme, and setting scrollbar options.
    |
    */
    'right_sidebar' => false, // Disable right sidebar by default
    'right_sidebar_icon' => 'fas fa-cogs', // Icon for the right sidebar
    'right_sidebar_theme' => 'purple', // Theme color for right sidebar
    'right_sidebar_slide' => true, // Enable sliding behavior
    'right_sidebar_push' => true,
    'right_sidebar_scrollbar_theme' => 'os-theme-light', // Scrollbar theme for right sidebar
    'right_sidebar_scrollbar_auto_hide' => 'l',

    /*
    |--------------------------------------------------------------------------
    | URLs
    |--------------------------------------------------------------------------
    |
    | Define the URLs for various actions like login, logout, password reset, etc.
    |
    */
    'use_route_url' => false,
    'dashboard_url' => 'home', // URL for the dashboard/home page
    'logout_url' => 'logout', // URL for logout action
    'login_url' => 'login', // URL for login page
    'register_url' => 'register', // URL for registration page
    'password_reset_url' => 'password/reset', // URL for password reset page
    'password_email_url' => 'password/email', // URL for password reset email page
    'profile_url' => false, // Disable user profile URL by default

    /*
    |--------------------------------------------------------------------------
    | Laravel Mix
    |--------------------------------------------------------------------------
    |
    | Enable Laravel Mix to manage your CSS and JS assets.
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
    | Define the items that will appear in the sidebar and top navigation.
    | You can set different attributes like icon color, URL, and permissions (using 'can').
    |
    */
    'menu' => [
        // Navbar items:
        [
            'type'         => 'navbar-search',
            'text'         => 'search',
            'topnav_right' => false, // Search bar on the left
        ],
        [
            'type'         => 'fullscreen-widget',
            'topnav_right' => true, // Fullscreen option on the right
        ],
        [
            'type'         => 'darkmode-widget',
            'topnav_right' => true, // Dark mode toggle on the right
        ],

        // Sidebar items:
        [
            'text' => 'blog',
            'url'  => 'admin/blog',
            'can'  => 'manage-blog', // Permission check to manage blog
        ],
        [
            'text' => 'ACCUEIL',
            'url'  => '/Prelevements', // URL to 'Prelevements' page
        ],
        ['header' => 'ESPACE MACROSCOPIQUE'],
        [
            'text'       => 'Gestion Piece Operatoires',
            'icon_color' => 'green', // Custom icon color
            'url'        => '#',
        ],
        [
            'text'       => 'Pieces Operatoires',
            'icon_color' => 'white', // Custom icon color
            'url'        => '/Po', // URL to 'Pieces Operatoires' page
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Menu Filters
    |--------------------------------------------------------------------------
    |
    | Here you can define filters that will be applied to the menu items.
    | These filters can manage permissions, links, classes, and more.
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
    | Define which plugins will be used within the admin panel and their configurations.
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
            'active' => false,
            'files' => [
                [
                    'type' => 'js',
                    'asset' => false,
                    'location' => '//cdn.jsdelivr.net/npm/sweetalert2@8',
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
    | IFrame
    |--------------------------------------------------------------------------
    |
    | Configuration for IFrame mode, allowing multiple views to be opened in tabs.
    |
    */
    'iframe' => [
        'default_tab' => [
            'url' => null, // Default tab URL
            'title' => null, // Default tab title
        ],
        'buttons' => [
            'close' => true, // Enable close button for tabs
            'close_all' => true, // Enable close all button
            'close_all_other' => true, // Enable close all other tabs button
            'scroll_left' => true, // Enable scrolling tabs to the left
            'scroll_right' => true, // Enable scrolling tabs to the right
            'fullscreen' => true, // Enable fullscreen button for tabs
        ],
        'options' => [
            'loading_screen' => 1000, // Display a loading screen (in milliseconds)
            'auto_show_new_tab' => true, // Automatically show newly opened tabs
            'use_navbar_items' => true, // Use navbar items for IFrame tabs
        ],
    ],

    /*
    |--------------------------------------------------------------------------
    | Livewire
    |--------------------------------------------------------------------------
    |
    | Enable Livewire support for the admin panel.
    |
    */
    'livewire' => false, // Disable Livewire support by default
];
