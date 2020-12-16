<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $role = Auth::user()->roles;
        if ($role == 'admin') {
            return redirect('/admin/dashboard/');
        } else {
            return view('home');
        }
    }

    public function accessToPageUsers()
    {
        return view('common.access-to-page-users');
    }
}
