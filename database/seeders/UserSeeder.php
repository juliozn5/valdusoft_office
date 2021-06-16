<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

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

              // [
              //   "id"=>"1",
              //   "name"=>"nuevo",
              //   "email"=>"nuevo@gmail.com",
              //   "password"=>"123456789",
              //   "role"=>"0",
              // ]
        ];
        foreach ($arrayUser as $user ) {
            User::create($user);
        }
    }
}
