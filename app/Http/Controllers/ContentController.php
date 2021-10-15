<?php

namespace App\Http\Controllers;

use App\Models\Content;
use Illuminate\Http\Request;

class ContentController extends Controller
{
    //
    public function index(){
        $contents = Content::all();

        return view('contents.index', compact('contents') );
    }
}
