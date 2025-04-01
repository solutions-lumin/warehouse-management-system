<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Permission;

class PermissionSeeder extends Seeder
{
    public function run()
    {
        $permissions = [
            'manage_users',
            'manage_roles',
            'view_orders',
            'approve_orders',
            'manage_inventory',
            'create_dispatch',
            'view_reports',
        ];
        // 'manage_companies', 
        // 'manage_users', 'manage_warehouses', 'manage_vendors','manage_branches', 'manage_orders', 'approve_orders', 'track_orders','update_inventory', 'access_reports', 'view_order_logs','receive_orders', 'update_inventory', 'upload_challan', 'view_dispatch_status','browse_products', 'request_order', 'track_order_status','view_assigned_orders', 'upload_invoice', 'update_tracking_status',

        $permissions = [
            'manage_users', 'manage_warehouses', 'manage_vendors','manage_branches', 'manage_orders', 'approve_orders', 'track_orders','update_inventory', 'access_reports', 'view_order_logs','receive_orders', 'update_inventory', 'upload_challan', 'view_dispatch_status','browse_products', 'request_order', 'track_order_status','view_assigned_orders', 'upload_invoice', 'update_tracking_status',
        ];

        foreach ($permissions as $permission) {
            Permission::firstOrCreate(['name' => $permission]);
        }
    }
}

