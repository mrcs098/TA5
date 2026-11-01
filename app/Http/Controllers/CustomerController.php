<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class CustomerController extends Controller
{
    // Temporary static data source required by TFA5; no database query is used.
    public static array $customers = [
        ['id' => 'C-001', 'name' => 'Alex Reyes', 'email' => 'alex.reyes@example.com', 'phone' => '09XX-XXX-1001', 'address' => 'Quezon City', 'status' => 'Active'],
        ['id' => 'C-002', 'name' => 'Bea Santos', 'email' => 'bea.santos@example.com', 'phone' => '09XX-XXX-1002', 'address' => 'Manila', 'status' => 'Active'],
        ['id' => 'C-003', 'name' => 'Carlo Mendoza', 'email' => 'carlo.mendoza@example.com', 'phone' => '09XX-XXX-1003', 'address' => 'Makati', 'status' => 'Inactive'],
        ['id' => 'C-004', 'name' => 'Dani Cruz', 'email' => 'dani.cruz@example.com', 'phone' => '09XX-XXX-1004', 'address' => 'Pasig', 'status' => 'Active'],
        ['id' => 'C-005', 'name' => 'Eli Garcia', 'email' => 'eli.garcia@example.com', 'phone' => '09XX-XXX-1005', 'address' => 'Taguig', 'status' => 'Active'],
    ];

    public function index(): View
    {
        return view('customers', ['customers' => self::$customers]);
    }
}
