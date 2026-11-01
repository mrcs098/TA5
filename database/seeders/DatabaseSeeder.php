<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        // Optional database examples. Web pages continue to use static arrays.
        $customers = [
            ['C-001', 'Alex Reyes', 'alex.reyes@example.com', '09XX-XXX-1001', 'Quezon City', 'Active'],
            ['C-002', 'Bea Santos', 'bea.santos@example.com', '09XX-XXX-1002', 'Manila', 'Active'],
            ['C-003', 'Carlo Mendoza', 'carlo.mendoza@example.com', '09XX-XXX-1003', 'Makati', 'Inactive'],
            ['C-004', 'Dani Cruz', 'dani.cruz@example.com', '09XX-XXX-1004', 'Pasig', 'Active'],
            ['C-005', 'Eli Garcia', 'eli.garcia@example.com', '09XX-XXX-1005', 'Taguig', 'Active'],
        ];

        foreach ($customers as [$code, $name, $email, $phone, $address, $status]) {
            DB::table('customers')->updateOrInsert(['account_code' => $code], [
                'name' => $name, 'email' => $email, 'phone' => $phone,
                'address' => $address, 'status' => $status,
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }

        $users = [
            ['U-001', 'Morgan Reyes', 'morgan.reyes', 'morgan@example.com', 'Administrator', 'Active'],
            ['U-002', 'Jamie Santos', 'jamie.santos', 'jamie@example.com', 'Manager', 'Active'],
            ['U-003', 'Sam Mendoza', 'sam.mendoza', 'sam@example.com', 'Cashier', 'Active'],
            ['U-004', 'Taylor Cruz', 'taylor.cruz', 'taylor@example.com', 'Cashier', 'Inactive'],
            ['U-005', 'Riley Garcia', 'riley.garcia', 'riley@example.com', 'Inventory Staff', 'Active'],
        ];

        foreach ($users as [$code, $name, $username, $email, $role, $status]) {
            DB::table('users')->updateOrInsert(['account_code' => $code], [
                'name' => $name, 'username' => $username, 'email' => $email,
                'role' => $role, 'status' => $status,
                'password' => Hash::make(Str::random(48)),
                'created_at' => now(), 'updated_at' => now(),
            ]);
        }
    }
}
