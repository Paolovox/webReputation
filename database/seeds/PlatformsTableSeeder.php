<?php

use Illuminate\Database\Seeder;
use App\Platform;

class PlatformsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $google = new Platform();
        $google->platform = "Google";
        $google->save();

        $facebook = new Platform();
        $facebook->platform = "Facebook";
        $facebook->save();

        $linkedin = new Platform();
        $linkedin->platform = "Linkedin";
        $linkedin->save();

        $twitter = new Platform();
        $twitter->platform = "Twitter";
        $twitter->save();

        $instagram = new Platform();
        $instagram->platform = "Instagram";
        $instagram->save();
    }
}
