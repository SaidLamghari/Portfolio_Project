<?php

return [

    /*
    |--------------------------------------------------------------------------
    | CDN LINK
    |--------------------------------------------------------------------------
    |
    | By default, SweetAlert2 uses its local `sweetalert.all.js` file.
    | However, if you'd like to use a CDN for faster loading, you can specify
    | the CDN link here. Set it in your `.env` file.
    |
    */
    'cdn' => env('SWEET_ALERT_CDN'),

    /*
    |--------------------------------------------------------------------------
    | Always load the sweetalert.all.js
    |--------------------------------------------------------------------------
    |
    | If you use SweetAlert heavily, you may always want the JavaScript package
    | loaded by default. Set this to true if you want SweetAlert's JS file
    | to always be included in every page load.
    |
    */
    'alwaysLoadJS' => env('SWEET_ALERT_ALWAYS_LOAD_JS', false),

    /*
    |--------------------------------------------------------------------------
    | Never load the sweetalert.all.js
    |--------------------------------------------------------------------------
    |
    | If you prefer to handle loading SweetAlert's JavaScript by yourself, you
    | can disable automatic loading. This could be useful when using assets
    | bundlers like Laravel Mix. If both `alwaysLoadJS` and `neverLoadJS` are
    | set to true, `neverLoadJS` takes precedence.
    |
    */
    'neverLoadJS' => env('SWEET_ALERT_NEVER_LOAD_JS', false),

    /*
    |--------------------------------------------------------------------------
    | AutoClose Timer
    |--------------------------------------------------------------------------
    |
    | Set a default timer (in milliseconds) for automatically closing modals.
    | You can override this timer for specific modals using the `autoClose()`
    | helper method when creating the modal.
    |
    */
    'timer' => env('SWEET_ALERT_TIMER', 5000),

    /*
    |--------------------------------------------------------------------------
    | Width
    |--------------------------------------------------------------------------
    |
    | Set the default width for modal windows. You can use px or % units.
    | For example, '32rem' or '80%'. Use the `width()` helper to override
    | this for specific modals.
    |
    */
    'width' => env('SWEET_ALERT_WIDTH', '32rem'),

    /*
    |--------------------------------------------------------------------------
    | Height Auto
    |--------------------------------------------------------------------------
    |
    | By default, SweetAlert2 sets HTML and body CSS height to auto !important.
    | This behavior can be incompatible with certain layouts. If that's the
    | case for your project, set `height_auto` to false.
    |
    */
    'height_auto' => env('SWEET_ALERT_HEIGHT_AUTO', true),

    /*
    |--------------------------------------------------------------------------
    | Padding
    |--------------------------------------------------------------------------
    |
    | Set the default padding for modal windows. You can use px or % units.
    | The default padding is '1.25rem'. Use the `padding()` helper method
    | to override this for specific modals.
    |
    */
    'padding' => env('SWEET_ALERT_PADDING', '1.25rem'),

    /*
    |--------------------------------------------------------------------------
    | Animation
    |--------------------------------------------------------------------------
    |
    | Enable or disable animations for modal windows. You can use Animate.css
    | for custom animations. If disabled, SweetAlert2 will use its default CSS
    | animations. You can override animations using the `animation()` helper.
    |
    */
    'animation' => [
        'enable' => env('SWEET_ALERT_ANIMATION_ENABLE', false),
    ],

    // Specify the Animate.css CDN link
    'animatecss' => env('SWEET_ALERT_ANIMATECSS', 'https://cdnjs.cloudflare.com/ajax/libs/animate.css/4.1.1/animate.min.css'),

    /*
    |--------------------------------------------------------------------------
    | ShowConfirmButton
    |--------------------------------------------------------------------------
    |
    | By default, SweetAlert2 shows a "Confirm" button. You can disable it here.
    | This might be useful if you're using a custom HTML description in modals.
    | Use the `showConfirmButton()` helper to customize this for specific modals.
    |
    */
    'show_confirm_button' => env('SWEET_ALERT_CONFIRM_BUTTON', true),

    /*
    |--------------------------------------------------------------------------
    | ShowCloseButton
    |--------------------------------------------------------------------------
    |
    | Enable or disable the "Close" button for modals. Users can click this button
    | to dismiss the modal. You can use the `showCloseButton()` helper method to
    | modify this behavior for specific modals.
    |
    */
    'show_close_button' => env('SWEET_ALERT_CLOSE_BUTTON', false),

    /*
    |--------------------------------------------------------------------------
    | Toast Position
    |--------------------------------------------------------------------------
    |
    | Define the default position of the toast notifications. The available
    | positions are: 'top', 'top-start', 'top-end', 'center', 'center-start',
    | 'center-end', 'bottom', 'bottom-start', or 'bottom-end'. Use the `position()`
    | helper method to change the position for individual toasts.
    |
    */
    'toast_position' => env('SWEET_ALERT_TOAST_POSITION', 'top-end'),

    /*
    |--------------------------------------------------------------------------
    | Progress Bar
    |--------------------------------------------------------------------------
    |
    | If enabled, a progress bar will be shown at the bottom of a popup.
    | This is typically used with toast notifications.
    |
    */
    'timer_progress_bar' => env('SWEET_ALERT_TIMER_PROGRESS_BAR', false),

    /*
    |--------------------------------------------------------------------------
    | Middleware
    |--------------------------------------------------------------------------
    |
    | Configure SweetAlert2 middleware options for modal windows or toast notifications.
    | You can enable autoclosing, set the toast position, and other options.
    |
    */
    'middleware' => [

        'autoClose' => env('SWEET_ALERT_MIDDLEWARE_AUTO_CLOSE', false), // Auto close modals in middleware
        'toast_position' => env('SWEET_ALERT_MIDDLEWARE_TOAST_POSITION', 'top-end'), // Default toast position
        'toast_close_button' => env('SWEET_ALERT_MIDDLEWARE_TOAST_CLOSE_BUTTON', true), // Show close button on toast
        'timer' => env('SWEET_ALERT_MIDDLEWARE_ALERT_CLOSE_TIME', 6000), // Middleware alert auto close time (ms)
        'auto_display_error_messages' => env('SWEET_ALERT_AUTO_DISPLAY_ERROR_MESSAGES', false), // Auto display error messages
    ],

    /*
    |--------------------------------------------------------------------------
    | Custom Class
    |--------------------------------------------------------------------------
    |
    | Define custom CSS classes for various parts of the modal. You can customize
    | the appearance of the container, popup, header, and other elements by providing
    | your own CSS classes. These can be set via the `.env` file.
    |
    */
    'customClass' => [

        'container' => env('SWEET_ALERT_CONTAINER_CLASS'), // Custom container class
        'popup' => env('SWEET_ALERT_POPUP_CLASS'), // Custom popup class
        'header' => env('SWEET_ALERT_HEADER_CLASS'), // Custom header class
        'title' => env('SWEET_ALERT_TITLE_CLASS'), // Custom title class
        'closeButton' => env('SWEET_ALERT_CLOSE_BUTTON_CLASS'), // Custom close button class
        'icon' => env('SWEET_ALERT_ICON_CLASS'), // Custom icon class
        'image' => env('SWEET_ALERT_IMAGE_CLASS'), // Custom image class
        'content' => env('SWEET_ALERT_CONTENT_CLASS'), // Custom content class
        'input' => env('SWEET_ALERT_INPUT_CLASS'), // Custom input class
        'actions' => env('SWEET_ALERT_ACTIONS_CLASS'), // Custom actions class
        'confirmButton' => env('SWEET_ALERT_CONFIRM_BUTTON_CLASS'), // Custom confirm button class
        'cancelButton' => env('SWEET_ALERT_CANCEL_BUTTON_CLASS'), // Custom cancel button class
        'footer' => env('SWEET_ALERT_FOOTER_CLASS'), // Custom footer class
    ],

];
