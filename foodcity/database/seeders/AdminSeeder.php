<?php

namespace Database\Seeders;

use App\Models\Users;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;

class AdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Users::create([
            'title' => 'Mr',
            'first_name' => 'Admin',
            'last_name' => '',
            'phone_no' => '+94 755555555',
            'email' => 'admin@mail.com',
            'user_name' => 'admin',
            'password' => Hash::make('123456'),
            'street' => 'xyz',
            'city' => 'xyz',
            'state' => 'xyz',
            'country' => 'xyz',
            'role_id' => 1,
            'status' => 1
        ]);
    }
}
