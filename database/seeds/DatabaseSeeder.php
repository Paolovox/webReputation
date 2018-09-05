<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $this->call(RoleTableSeeder::class);
        $this->call(UserTableSeeder::class);
        $this->call(ClientTableSeeder::class);
        $this->call(DossierTableSeeder::class);
        $this->call(LinkTableSeeder::class);
        $this->call(DocumentTableSeer::class);
        $this->call(TicketTableSeeder::class);
    }
}
