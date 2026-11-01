<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class UserController extends Controller
{
    // These fictional account records demonstrate listing, not authentication.
    public static array $users = [
        ['id' => 'U-001', 'name' => 'Morgan Reyes', 'username' => 'morgan.reyes', 'email' => 'morgan@example.com', 'role' => 'Administrator', 'status' => 'Active'],
        ['id' => 'U-002', 'name' => 'Jamie Santos', 'username' => 'jamie.santos', 'email' => 'jamie@example.com', 'role' => 'Manager', 'status' => 'Active'],
        ['id' => 'U-003', 'name' => 'Sam Mendoza', 'username' => 'sam.mendoza', 'email' => 'sam@example.com', 'role' => 'Cashier', 'status' => 'Active'],
        ['id' => 'U-004', 'name' => 'Taylor Cruz', 'username' => 'taylor.cruz', 'email' => 'taylor@example.com', 'role' => 'Cashier', 'status' => 'Inactive'],
        ['id' => 'U-005', 'name' => 'Riley Garcia', 'username' => 'riley.garcia', 'email' => 'riley@example.com', 'role' => 'Inventory Staff', 'status' => 'Active'],
    ];

    public function index(): View
    {
        return view('users', ['users' => self::$users]);
    }
}
