<?php

namespace App\Http\Controllers;

use App\Services\AccountServices;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.login');
    }

    public function login(Request $request, AccountServices $services)
    {
        $init = $services->auth($request->input('username'), $request->input('password'));
        
        if ($init['error'])
        {
            return back()->with('system-error', $init['error']);
        }

        return redirect()->route('login');
    }

    public function logout()
    {
        Session::flush();
        return redirect()->route('/')
        ->with('system-success', 'Successfully logged out!');
    } 
    
    public function register(Request $request, AccountServices $services)
    {
        $init = $services->register($request->post());

        if (@$init['error'])
        {
            return back()
            ->with('system-error', $init['error']);
        }

        return redirect()->route('/')
        ->with('system-success', $init['success']);
    }



}
