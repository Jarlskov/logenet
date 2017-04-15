<?php

namespace App\Http\Controllers;

class AccountController extends Controller
{
    /**
     * Index function renders home view
     * @return \Illuminate\Contracts\View\Factory|\Illuminate\View\View
     */
    public function index()
    {
        return view('home');
    }
}
