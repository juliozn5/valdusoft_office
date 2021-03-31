<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $arrayUser = [

              [
                "id"=>"1",
                "name"=>"nuevo",
                "email"=>"nuevo@gmail.com",
                "password"=>"123456789",
                "role"=>"0",
              ],
              [
                "id"=>"2",
                "name"=>"admin",
                "email"=>"admin@gmail.com",
                "password"=>"123456789",
                "role"=>"1",
              ],
              [
                "id"=>"3",
                "name"=>"client",
                "email"=>"client@gmail.com",
                "password"=>"123456789",
                "role"=>"2",
              ],
              [
                "id"=>"4",
                "name"=>"employe",
                "email"=>"employe@gmail.com",
                "password"=>"123456789",
                "role"=>"3",
              ],
        ];
        foreach ($arrayUser as $user ) {
            User::create($user);
        }
    }
}
