<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Notification Channel
    |--------------------------------------------------------------------------
    |
    | This option defines the default notification channel that will be used
    | for sending notifications. You can define multiple channels here and
    | choose one while sending notifications.
    |
    */

    'default' => 'whatsapp',

    /*
    |--------------------------------------------------------------------------
    | Notification Channels
    |--------------------------------------------------------------------------
    |
    | Here you can define the notification channels along with their drivers.
    | Each channel corresponds to a notification method. Add the WhatsApp
    | channel here and set its driver to "custom".
    |
    */

    'channels' => [
        'whatsapp' => [
            'driver' => 'custom',
            'api_url' => 'https://api.twilio.com/2010-04-01/Accounts/AC65f2cc5528ac8bb3385923c229f0fb43/Messages.json',
            'api_params' => [
                'from' => env('TWILIO_WHATSAPP_NUMBER'),
            ],
        ],
        // Add other channels here if needed.
    ],

    // Other configurations...

];
