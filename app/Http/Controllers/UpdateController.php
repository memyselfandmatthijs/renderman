<?php

namespace App\http\Controllers;
use App\Models\Content;
use App\Models\Tags;
use App\Models\Tag_combinations;
use Illuminate\Http\Request;

class UpdateController extends Controller{

    public function index($id){
        $post = Content::findOrFail($id);
        $tags = Tags::all();

        return view('update', compact('post', 'tags'));
    }

    public function update(Request $request, $id){
        $request->validate([
            'title' => 'required|max:50',
            'description' => 'required',
            'tags' => 'required',
        ]);

        $post = Content::find($id);

        echo "new: $request->title";
        echo "original:  $post->title";
        $post->title = $request->title;
        $post->description = $request->description;
        $post-> save();

        Tag_combinations::where('content_id', '=' ,  $id)->delete();

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
