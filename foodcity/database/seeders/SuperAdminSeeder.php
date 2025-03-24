<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Admins;
use Illuminate\Support\Facades\Hash;

class SuperAdminSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Admins::create([
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
            'status' => 1
        ]);
    }
}
