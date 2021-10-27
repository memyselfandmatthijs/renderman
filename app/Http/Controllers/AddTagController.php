<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use Illuminate\Http\Request;


class AddTagController extends Controller{
    public function index(){
        $tags = Tags::all();
        $status = "";

        return view('add_tags', compact('tags', 'status'));
    }

    public function saveTag(Request $request){
        $tags = Tags::all();

        $checkTag = Tags::where('name', $request->tag)->get();
        if (count($checkTag) == 0){
            $tag = new Tags;
            $tag->name = $request->tag;
            $tag->save();
            $status = "";

            $tags = Tags::all();

            return view('add_tags', compact('tags', 'status'));
        }
        else{
            $status = "This tag already exists";
            return view('add_tags', compact('status', 'tags'));
        }





    }
}
