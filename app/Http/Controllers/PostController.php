<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Tags;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;

class PostController extends Controller{

    public function index(Request $request){
        $user_id = auth()->id();
        $post = new Content;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user_id;
        $post->image_name = $request->title;

        //$post->save();
        //storage::disk('images')->putFileAs("", "$request->image", "$request->title");

        $id = Content::where('user_id', 1)->max('id');

        //return redirect("/details/$id");
    }
}
