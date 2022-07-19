<?php

namespace App\Http\Controllers\Dashboard;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index() {
        $user = User::all('id','name','email','mobile','country','state','address');
        return view('dashboard.home',[
            'users' => $user
        ]);
    }
}
