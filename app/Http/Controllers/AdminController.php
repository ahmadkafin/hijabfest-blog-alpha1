<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Stevebauman\Location\Facades\Location as Location;

class AdminController extends Controller
{

    public function __construct()
    {
    }

    public function index()
    {
        // $ip = '36.71.227.20';
        // $data = Location::get($ip);
        // dd($data);
        return view('admin.dashboard');
    }
}
