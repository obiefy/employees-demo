<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employee;
use App\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('home')->with([
            'companies' => Company::count(),
            'employees' => Employee::count(),
            'admins' => User::count(),
        ]);
    }
}
