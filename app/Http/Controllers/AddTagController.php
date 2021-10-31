<?php

namespace App\Http\Controllers;

use App\Models\Tags;
use App\Models\User;
use Illuminate\Http\Request;


class AddTagController extends Controller{
    public function index(){
        $id = auth()->id();

        $checkAdmin = User::findOrFail($id);
        $admin = $checkAdmin->admin;

        if($admin < 1){
            return redirect('/');
        }

        $tags = Tags::all();
        $status = "";

        return view('add_tags', compact('tags', 'status'));
    }

    public function saveTag(Request $request){
        $request->validate([
            'tag' => 'required|max:50'
        ]);

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
