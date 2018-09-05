<?php

use Illuminate\Database\Seeder;

use App\Role;

class RoleTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(){

        $admin_role = new Role();
        $admin_role->name = "admin";
        $admin_role->description = "admin";
        $admin_role->save();

        $lawyer_role = new Role();
        $lawyer_role->name = "lawyer";
        $lawyer_role->description = "lawyer";
        $lawyer_role->save();

        $client_role = new Role();
        $client_role->name = "client";
        $client_role->description = "client";
        $client_role->save();

    }
}
