<?php

namespace App\http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class UpdateController extends Controller{

    public function index($id){
        $post = Content::findOrFail($id);

        return view('update', compact('post'));
    }

    public function update(Request $request, $id){
        $post = Content::find($id);

        echo "new: $request->title";
        echo "original:  $post->title";
        $post->title = $request->title;
        $post->description = $request->description;
        $post-> save();

        return redirect("/details/$id");
    }
}
