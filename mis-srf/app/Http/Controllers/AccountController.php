<?php

namespace App\Http\Controllers;

use App\Services\AccountServices;
use Illuminate\Http\Request;

class AccountController extends Controller
{
    public function index()
    {
        return view('account.login');
    }

    public function login(Request $request, AccountServices $services)
    {
        $init = $services->auth($request->input('username'), $request->input('password'));
        dd($init);
        if ($init['error'])
        {
            return back()->with('system-error', $init['error']);
        }

        // return redirect()->route('login');
    }



}
