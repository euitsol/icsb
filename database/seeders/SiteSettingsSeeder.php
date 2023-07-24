<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\SiteSetting;

class SiteSettingsSeeder extends Seeder
{
    public function run()
    {
        SiteSetting::create([
            'key' => 'site_name',
            'value' => 'Institute Of Chartered Secretaries Of Bangladesh',
            'env_key' => 'APP_NAME'
        ]);

        SiteSetting::create([
            'key' => 'site_short_name',
            'value' => 'ICSB',
            'env_key' => 'APP_SHORT_NAME',
        ]);

        SiteSetting::create([
            'key' => 'timezone',
            'value' => 'Asia/Dhaka',
            'env_key' => 'TIMEZONE',
        ]);

        SiteSetting::create([
            'key' => 'env',
            'value' => 'production',
            'env_key' => 'APP_ENV',
        ]);

        SiteSetting::create([
            'key' => 'debug',
            'value' => '0',
            'env_key' => 'APP_DEBUG',
        ]);

        SiteSetting::create([
            'key' => 'debugbar',
            'value' => '0',
            'env_key' => 'DEBUGBAR_ENABLED',
        ]);

        SiteSetting::create([
            'key' => 'date_format',
            'value' => 'd/m/Y',
            'env_key' => 'DATE_FORMAT',
        ]);

        SiteSetting::create([
            'key' => 'time_format',
            'value' => 'H:i:s',
            'env_key' => 'TIME_FORMAT',
        ]);

        SiteSetting::create([
            'key' => 'mail_mailer',
            'value' => 'smtp',
            'env_key' => 'MAIL_MAILER',
        ]);

        SiteSetting::create([
            'key' => 'mail_host',
            'value' => '',
            'env_key' => 'MAIL_HOST',
        ]);

        SiteSetting::create([
            'key' => 'mail_port',
            'value' => '',
            'env_key' => 'MAIL_PORT',
        ]);

        SiteSetting::create([
            'key' => 'mail_username',
            'value' => '',
            'env_key' => 'MAIL_USERNAME',
        ]);

        SiteSetting::create([
            'key' => 'mail_password',
            'value' => '',
            'env_key' => 'MAIL_PASSWORD',
        ]);

        SiteSetting::create([
            'key' => 'mail_encription',
            'value' => '',
            'env_key' => 'MAIL_ENCRYPTION',
        ]);

        SiteSetting::create([
            'key' => 'mail_from',
            'value' => '',
            'env_key' => 'MAIL_FROM_ADDRESS',
        ]);

        SiteSetting::create([
            'key' => 'mail_from_name',
            'value' => '',
            'env_key' => 'MAIL_FROM_NAME',
        ]);

        SiteSetting::create([
            'key' => 'database_driver',
            'value' => 'mysql',
            'env_key' => 'DB_CONNECTION',
        ]);

        SiteSetting::create([
            'key' => 'database_host',
            'value' => '127.0.0.1',
            'env_key' => 'DB_HOST',
        ]);

        SiteSetting::create([
            'key' => 'database_port',
            'value' => '3306',
            'env_key' => 'DB_PORT',
        ]);

        SiteSetting::create([
            'key' => 'database_name',
            'value' => 'icsb',
            'env_key' => 'DB_DATABASE',
        ]);

        SiteSetting::create([
            'key' => 'database_username',
            'value' => 'root',
            'env_key' => 'DB_USERNAME',
        ]);

        SiteSetting::create([
            'key' => 'database_password',
            'value' => '',
            'env_key' => 'DB_PASSWORD',
        ]);

    }
}
