<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\ModulesSub;
class ModuleSupSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        ModulesSub::insert([
            // Admins
            [
                'module_id' => 1,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 1,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 1,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            [
                'module_id' => 1,
                'sub_module_name' => 'SetPermission',
                'status' => 1
            ],
            // Users
            [
                'module_id' => 2,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 2,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 2,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            [
                'module_id' => 2,
                'sub_module_name' => 'SetPermission',
                'status' => 1
            ],
            // Companies
            [
                'module_id' => 3,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 3,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 3,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Suppliers
            [
                'module_id' => 4,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 4,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 4,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Customers
            [
                'module_id' => 5,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 5,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 5,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Products
            [
                'module_id' => 6,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 6,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 6,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Purchase
            [
                'module_id' => 7,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 7,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 7,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Purchase Payment
            [
                'module_id' => 8,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 8,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 8,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Sales
            [
                'module_id' => 9,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 9,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 9,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Sales Payment
            [
                'module_id' => 10,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 10,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 10,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Expenses
            [
                'module_id' => 11,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 11,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 11,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Revenues
            [
                'module_id' => 12,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 12,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 12,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Vouchers
            [
                'module_id' => 13,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 13,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 13,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Cheques
            [
                'module_id' => 14,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 14,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 14,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Reports
            [
                'module_id' => 15,
                'sub_module_name' => 'StockReport',
                'status' => 1
            ],
            [
                'module_id' => 15,
                'sub_module_name' => 'FrequentlySales',
                'status' => 1
            ],
            [
                'module_id' => 15,
                'sub_module_name' => 'FrequentlyPurchase',
                'status' => 1
            ],
            [
                'module_id' => 15,
                'sub_module_name' => 'SalesSummaryReport',
                'status' => 1
            ],
            // Logs
            [
                'module_id' => 16,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            // Stock Count
            [
                'module_id' => 17,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 17,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 17,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
            // Imports
            [
                'module_id' => 18,
                'sub_module_name' => 'Products',
                'status' => 1
            ],
            [
                'module_id' => 18,
                'sub_module_name' => 'Customers',
                'status' => 1
            ],
            [
                'module_id' => 18,
                'sub_module_name' => 'Suppliers',
                'status' => 1
            ],
            // WIP
            [
                'module_id' => 19,
                'sub_module_name' => 'View',
                'status' => 1
            ],
            [
                'module_id' => 19,
                'sub_module_name' => 'Write',
                'status' => 1
            ],
            [
                'module_id' => 19,
                'sub_module_name' => 'Delete',
                'status' => 1
            ],
        ]);
    }
}
