<?php

use Illuminate\Database\Seeder;

class SettingsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Setting::create([
            'siteName' => "Laravel's Blog", 
            'contactNumber' => '07063543872', 
            'contactEmail' => 'info@laravelblog.com', 
            'address' => 'ikeja, Lagos State.'
        ]);
    }
}
