<?php

use Joaopaulolndev\FilamentGeneralSettings\Enums\TypeFieldEnum;

return [
    'show_application_tab' => false,
    'show_logo_and_favicon' => false,
    'show_analytics_tab' => false,
    'show_seo_tab' => false,
    'show_email_tab' => false,
    'show_social_networks_tab' => true,
    'expiration_cache_config_time' => 60,
    'show_custom_tabs' => true,
    'custom_tabs' => [
        'more_configs' => [
            'label' => 'Basic Information',
            'icon' => 'heroicon-m-information-circle',
            'columns' => 2,
            'fields' => [
                'phone' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'Phone',
                    'placeholder' => 'Enter the Phone',
                    'required' => false,
                    'rules' => 'string',
                ],
                'email' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'Email',
                    'placeholder' => 'Enter the Email',
                    'required' => false,
                    'rules' => 'email',
                ],
                'county' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'Country',
                    'placeholder' => 'Enter the Country',
                    'required' => false,
                    'rules' => 'string',
                ],
                'city' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'City',
                    'placeholder' => 'Enter the City',
                    'required' => false,
                    'rules' => 'string',
                ],
                'address' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'Address',
                    'placeholder' => 'Enter the Address',
                    'required' => false,
                    'rules' => 'string',
                ],
                'map_url' => [
                    'type' => TypeFieldEnum::Text->value,
                    'label' => 'Google Map Embed URL',
                    'placeholder' => 'Paste your Google Map embed URL here (e.g., iframe
                src="https://www.googl... )',
                    'required' => false,
                    'rules' => 'string',
                ],

            ]
        ],
    ],
];
