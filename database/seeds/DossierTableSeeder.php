<?php

use Illuminate\Database\Seeder;

class DossierTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $dossier = new \App\Dossier();
        $dossier->number = 1000;
        $dossier->lawyer_id = 2;
        $dossier->client_id = 1;
        $dossier->save();
    }
}
