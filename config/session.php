<?php

declare(strict_types=1);

/*|--------------------------------------------------------------------------
 | Session Engine Configuration
 |--------------------------------------------------------------------------
 |
 | پیکربندی موتور session — همهٔ کلیدهای مستندشده در `docs/03-engines/session.md` بخش «پیکربندی».
 |
 |@see https://github.com/Derogaramin/Tavaan-Doc/blob/main/docs/03-engines/session.md
 */

return [
    /*| پیش‌فرض موتور (driver/store یا حالت فعال) */
    'default' => env('SESSION_DEFAULT', 'array'),

    /*| لیست درایورها */
    'drivers' => [
        'array' => [
            // پیکربندی درایور array
            'enabled' => true,
        ],
        'file' => [
            // پیکربندی درایور file
            'enabled' => true,
        ],
        'cookie' => [
            // پیکربندی درایور cookie
            'enabled' => true,
        ],
        'database' => [
            // پیکربندی درایور database
            'enabled' => true,
        ],
        'redis' => [
            // پیکربندی درایور redis
            'enabled' => true,
        ],
    ],

    /*| کلید کش (در صورت استفاده) */
    'prefix' => env('SESSION_PREFIX', 'session:'),

    /*| تنظیمات لاگ */
    'log' => [
        'channel' => env('SESSION_LOG_CHANNEL', 'session'),
    ],

    /*| Facade */
    'facade' => [
        'name' => 'Session',
        'accessor' => 'session',
    ],

    /*| سایر کلیدها (طبق مستندات) */
    'options' => [
        // TODO: کلیدهای اضافی طبق سند §۶ (پیکربندی)
    ],
];