<?php

namespace ProgrammingBlog\Http\Controllers\Admin;

use Illuminate\Http\Request;
use ProgrammingBlog\Http\Controllers\Controller;

class DashboardController extends Controller
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
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return $this->reply('dashboard.index');
    }
}
