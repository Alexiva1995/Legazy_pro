<?php

use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {


        $arrayUsers = [
            
            [
                'id' => '1',
                'name' => 'Admin',
                'last_name' => 'BFX',
                'fullname' => 'Admin BFX',
                'username' => 'AdminBFX',
                'email' => 'admin@bfx.com',
                'password' => Hash::make('123456789'),
                'whatsapp' => '123456789',
                'admin' => '1',
                'referred_id' => 0,
            ],
            
            [
                'id' => '2',
                'name' => 'Test',
                'last_name' => 'BFX',
                'fullname' => 'Test BFX',
                'username' => 'TestBFX',
                'email' => 'test@bfx.com',
                'password' => Hash::make('123456789'),
                'whatsapp' => '123456789',
                'referred_id' => 1,
            ],

          
    ];
    foreach ($arrayUsers as $users ) {
        User::create($users);
    }

    }
}
