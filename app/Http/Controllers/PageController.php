<?php

namespace App\Http\Controllers;

use Illuminate\View\View;

class PageController extends Controller
{
    public function home(): View
    {
        return view('home', [
            'customerCount' => count(CustomerController::$customers),
            'userCount' => count(UserController::$users),
        ]);
    }

    public function about(): View
    {
        return view('about');
    }
}
