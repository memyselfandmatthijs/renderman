<?php

namespace App\Http\Controllers;

use App\Models\Content;
use App\Models\Tag_combinations;
use App\Models\Tags;
use App\Models\Upvotes;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\storage;
class PostController extends Controller{

    public function index(){
        $user_id = auth()->id();

        $deep_validation = count(Upvotes::all()->where('user_id', $user_id));

        $tags = Tags::all();

        return view('newPost', compact('tags', 'deep_validation'));
    }

    public function savePost(Request $request){
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'image' => 'required',
            'tags' => 'required',
        ]);

        $user_id = auth()->id();
        $post = new Content;
        $post->title = $request->title;
        $post->description = $request->description;
        $post->user_id = $user_id;
        $post->image_name = $request->title;

        $post->save();
        storage::disk('images')->putFileAs("", "$request->image", "$request->title");

        $id = Content::where('user_id', 1)->max('id');

        foreach ($request->tags as $tag){
            echo "$tag";
            $tag_combination = new Tag_combinations();
            $tag_combination->content_id = $id;
            $tag_combination->tag_id = $tag;
            $tag_combination-> save();
        }

        return redirect("/details/$id");
    }
}
