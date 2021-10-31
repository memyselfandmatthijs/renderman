<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\User;

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
        $contents = Content::all()->where('active', 0);

        $id = auth()->id();

        $checkAdmin = User::findOrFail($id);
        $admin = $checkAdmin->admin;

        return view('home', compact('contents', 'admin'));
    }

}
