<?php

use Illuminate\Database\Seeder;
use App\User;
use App\Role;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $admin_role = Role::where('name', 'admin')->first();
        $lawyer_role = Role::where('name','lawyer')->first();
        $client_role = Role::where('name', 'client')->first();

        $admin = new User();
        $admin->name = 'George Admin';
        $admin->email = 'george@syrus.it';
        $admin->password = bcrypt('12345678');
        $admin->save();
        $admin->roles()->attach($admin_role);

        $lawyer = new User();
        $lawyer->name = 'George Laywer';
        $lawyer->email = 'george1@syrus.it';
        $lawyer->password = bcrypt('12345678');
        $lawyer->save();
        $lawyer->roles()->attach($lawyer_role);

        $client = new User();
        $client->name = 'George Client';
        $client->email = 'george2@syrus.it';
        $client->password = bcrypt('12345678');
        $client->save();
        $client->roles()->attach($client_role);

    }
}
