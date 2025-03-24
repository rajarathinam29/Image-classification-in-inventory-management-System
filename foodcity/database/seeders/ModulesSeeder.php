<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Modules;


class ModulesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modules::insert([
            [
                // 1
                'module_name' => 'Admins',
                'access_by' => 'Admins',
                'status' => 1
            ],
            [
                // 2
                'module_name' => 'Users',
                'access_by' => 'All',
                'status' => 1
            ],
            [
                // 3
                'module_name' => 'Companies',
                'access_by' => 'Admins',
                'status' => 1
            ],
            [
                // 4
                'module_name' => 'Suppliers',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                //5
                'module_name' => 'Customers',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 6
                'module_name' => 'Products',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 7
                'module_name' => 'Purchases',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 8
                'module_name' => 'Purchase Payment',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 9
                'module_name' => 'Sales',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 10
                'module_name' => 'Sales Payment',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 11
                'module_name' => 'Expenses',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 12
                'module_name' => 'Revenues',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 13
                'module_name' => 'Vouchers',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 14
                'module_name' => 'Cheques',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 15
                'module_name' => 'Reports',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 16
                'module_name' => 'Logs',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 17
                'module_name' => 'Stock Count',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 18
                'module_name' => 'Imports',
                'access_by' => 'Users',
                'status' => 1
            ],
            [
                // 19
                'module_name' => 'Wip',
                'access_by' => 'Users',
                'status' => 1
            ],
        ]);
    }
}
