<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;



class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //

        DB::table('users')->insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'role_id' => "4fc28b2d-75c1-4640-8561-93b0dea2ed76",
            'name' => "admin",
            'email' =>  "admin".'@gmail.com',
            'password' => Hash::make('password'),
        ]);

        
        DB::table('users')->insert([
            'id' => \Ramsey\Uuid\Uuid::uuid4()->toString(),
            'role_id' => "6865ce9a-45a0-449f-b389-96a2dd4ae9a1",
            'name' => "soufiane",
            'email' =>  "soufiane".'@gmail.com',
            'password' => Hash::make('password'),
        ]);

     
    }
}
