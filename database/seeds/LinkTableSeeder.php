<?php

use Illuminate\Database\Seeder;

class LinkTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $link = new \App\Link();
        $link->url = 'https://laravel.com';
        $link->title = 'Laravel website';
        $link->status = 'online';
        $link->google_position = 1;
        $link->google_page = 1;
        $link->dossier_id = 1;
        $link->save();
    }
}
