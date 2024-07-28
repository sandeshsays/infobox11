<?php

namespace App\Http\Controllers;

use App\Models\AppClient;
use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
        $data['page_title'] = getLan() == 'np' ? 'ड्यासबोर्ड' : 'Dashboard';


        return view('layouts.dashboard', $data);
    }
}
