<?php 

namespace Database\Seeders;
use App\Models\AppSetting;
use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    public function run()
    {
        AppSetting::create([
            'site_title' => 'Hotel Booking',
            'time_zone' => 'Asia/Kolkata',
            'force_ssl' => 0,
            'currency' => 'USD',
            'currency_symbol' => '$',
            'theme' => 'hotel',
            'fraction_number' => 2,
            'paginate' => 10,
            'error_log' => 1,
            'strong_password' => 1,
            'registration' => 0,
            'sender_email' => 'info@hotelbooking.com',
            'sender_email_name' => 'Support Hotel Booking',
        ]);
    }
}

