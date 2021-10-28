<?php

namespace App\http\Controllers;
use App\Models\Tags;
use App\Models\Tag_combinations;
use App\Models\Content;

class FilterController extends Controller{
    public function index(){
        $content = Content::all();
        $tags = Tags::all();

        return view('')
    }
}
