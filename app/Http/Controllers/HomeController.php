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

    public function confirmPage(Request $request)
    {
        $pass = md5('Sup3rm4n02');
        $password = md5($request->this_pass);
        if($password && $password === $pass)
        {
            session(['password_enter' => true]);
            return redirect('admin/users');
        }
        return redirect()->back()->withInput()->withErrors(['password' => 'Password yang anda masukan salah, coba lagi.']);
    }
}
