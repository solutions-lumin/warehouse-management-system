<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('companies')->insert([
            [
                'name' => 'ABC Corp',
                'email' => 'contact@abccorp.com',
                'phone' => '1234567890',
                'address' => '123 Main Street, City A',
                'logo' => 'logos/abc.png',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'XYZ Industries',
                'email' => 'info@xyzindustries.com',
                'phone' => '9876543210',
                'address' => '456 Market Road, City B',
                'logo' => 'logos/xyz.png',
                'status' => 'pending',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Tech Solutions',
                'email' => 'support@techsolutions.com',
                'phone' => '5556677889',
                'address' => '789 Tech Park, City C',
                'logo' => 'logos/tech.png',
                'status' => 'approved',
                'created_at' => now(),
                'updated_at' => now(),
            ]
        ]);
    }
}
