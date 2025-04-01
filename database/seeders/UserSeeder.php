<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run()
    {
        DB::table('users')->insert([
            [
                'company_id' => 1,
                'name' => 'Admin User',
                'email' => 'admin@company.com',
                'password' => Hash::make('password'),
                'role' => 'admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 1,
                'name' => 'Warehouse Manager',
                'email' => 'warehouse@company.com',
                'password' => Hash::make('password'),
                'role' => 'warehouse_manager',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'name' => 'Vendor User',
                'email' => 'vendor@company.com',
                'password' => Hash::make('password'),
                'role' => 'vendor',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'company_id' => 2,
                'name' => 'Branch User',
                'email' => 'branch@company.com',
                'password' => Hash::make('password'),
                'role' => 'branch_user',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}

