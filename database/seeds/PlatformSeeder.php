<?php

use App\Platform;
use Illuminate\Database\Seeder;

class PlatformSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $platforms = ['Windows', 'Mac OS X', 'Linux', 'Steam OS'];

        foreach ($platforms as $platform) {
            Platform::create([
                'name' => $platform
            ]);
        }
    }
}
