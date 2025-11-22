<?php

namespace App\Helpers;

use App\Models\SysSetting;

class Settings
{
    protected static array $defaults = [

        // ==========================
        // COMPANY
        // ==========================
        ['group' => 'company', 'key' => 'name',     'value' => 'Autohaus Kauder', 'type' => 'string'],
        ['group' => 'company', 'key' => 'address',  'value' => 'Wilhelm-Rausch-Str. 11', 'type' => 'string'],
        ['group' => 'company', 'key' => 'zip_city', 'value' => '31224 Peine', 'type' => 'string'],
        ['group' => 'company', 'key' => 'email',    'value' => 'info@autohaus-kauder.de', 'type' => 'string'],
        ['group' => 'company', 'key' => 'phone',    'value' => '+49 5171 123456', 'type' => 'string'],
        ['group' => 'company', 'key' => 'map_lat',  'value' => '52.319', 'type' => 'string'],
        ['group' => 'company', 'key' => 'map_lng',  'value' => '10.235', 'type' => 'string'],

        // ==========================
        // CONTACT
        // ==========================
        //['group' => 'contact', 'key' => 'opening_hours', 'value' =>
       //     "Mo–Fr: 09:00–18:00\nSa: 10:00–14:00", 'type' => 'text'
       // ],

        // ==========================
        // SOCIAL
        // ==========================
        ['group' => 'social', 'key' => 'instagram', 'value' => '', 'type' => 'string'],
        ['group' => 'social', 'key' => 'facebook',  'value' => '', 'type' => 'string'],
        ['group' => 'social', 'key' => 'youtube',    'value' => '', 'type' => 'string'],

        // ==========================
        // BRANDING
        // ==========================
        ['group' => 'branding', 'key' => 'primary_color',    'value' => '#B91C1C', 'type' => 'string'],
        ['group' => 'branding', 'key' => 'secondary_color',  'value' => '#8B0000', 'type' => 'string'],
        ['group' => 'branding', 'key' => 'gradient_from',    'value' => '#1a1a1a', 'type' => 'string'],
        ['group' => 'branding', 'key' => 'gradient_to',      'value' => '#2d2d2d', 'type' => 'string'],

        // ==========================
        // LEGAL
        // ==========================
        ['group' => 'legal', 'key' => 'impressum_url',     'value' => '/impressum', 'type' => 'string'],
        ['group' => 'legal', 'key' => 'datenschutz_url',   'value' => '/datenschutz', 'type' => 'string'],

        // ==========================
        // FOOTER
        // ==========================
        ['group' => 'footer', 'key' => 'copyright',
            'value' => '© {YEAR} Autohaus Kauder. Alle Rechte vorbehalten.',
            'type' => 'string'
        ],
    ];

    // Default-Werte booten
    public static function bootDefaults(): void
    {
        foreach (self::$defaults as $setting) {
            $value = $setting['value'];
            if (is_string($value) && str_contains($value, '{YEAR}')) {
                $value = str_replace('{YEAR}', date('Y'), $value);
            }

            SysSetting::firstOrCreate(
                ['group' => $setting['group'], 'key' => $setting['key']],
                ['value' => $value, 'type' => $setting['type']]
            );
        }
    }

    // Wert holen
    public static function get(string $groupKey, $default = null)
    {
        if (!str_contains($groupKey, '.')) return $default;

        [$group, $key] = explode('.', $groupKey);

        $value = SysSetting::where('group', $group)->where('key', $key)->value('value');

        if ($value === null) {
            $envKey = strtoupper($group . '_' . $key);
            return env($envKey, $default);
        }

        return $value;
    }

    // Wert setzen
    public static function set(string $groupKey, $value): void
    {
        [$group, $key] = explode('.', $groupKey);

        SysSetting::updateOrCreate(
            ['group' => $group, 'key' => $key],
            ['value' => $value]
        );
    }
}
