<?php

namespace App\http\Controllers;
use App\Models\Tags;
use App\Models\Tag_combinations;
use App\Models\Content;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\DocBlock\Tag;

class FilterController extends Controller{
    public function index(){
        $posts = Content::all();
        $tags = Tags::all();

        return view('filter', compact('posts', 'tags'));
    }

    public function getResults(Request $request){
        $post_ids = [];
        $posts = [];
        $usedTags = [];
        $tag_ids = [];


        foreach ($request->tags as $tag) {
            $tag_combinations = Tag_combinations::all()->where('tag_id', '=', $tag);


            foreach ($tag_combinations as $tag_combination){
                if((in_array("$tag_combination->tag_id", $tag_ids)) == false){
                    array_push($tag_ids, $tag_combination->tag_id);
                }
                if((in_array($tag_combination->content_id, $post_ids)) == 0){
                    array_push($post_ids, $tag_combination->content_id);
                }
            }
            }

        foreach ($post_ids as $post_id){
            $post = Content::findOrFail($post_id);
            array_push($posts, $post);
        }

        foreach ($tag_ids as $tag_id){
            $tagName = Tags::findOrFail($tag_id);
            array_push($usedTags, $tagName->name);
        }

        $tags = Tags::all();

        return view('filter', compact('posts', 'tags', 'usedTags'));
    }

}
