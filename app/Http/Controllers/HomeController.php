<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\facades\Auth;

class HomeController extends Controller
{
    public function index(){

                return view('dashboard');
        
    }
}
