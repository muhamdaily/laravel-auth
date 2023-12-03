<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        if (Auth::id()) {
            $user = Auth::user();
            if ($user->role === 'admin') {
                return view('dashboard');
            } elseif ($user->role === 'user') {
                return view('dashboard');
            }
        }
    }
}
