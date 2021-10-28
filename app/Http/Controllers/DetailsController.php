<?php

namespace App\http\Controllers;

use App\Models\content;
use App\Models\user;
use App\Models\Tag_combinations;
use App\Models\Tags;


class DetailsController extends Controller
{
    public function index($id){

        $content = content::findOrFail($id);
        $userid = $content->user_id;
        $username = user::findOrFail($userid);
        $tag_ids = Tag_combinations::all()->where('content_id', '=', $id);

        $tags = [];
        foreach ($tag_ids as $tag_id){
            $tag_id = $tag_id->tag_id;
            $tag = Tags::findOrFail($tag_id);
            array_push($tags, $tag->name);
        }

        return view('Details', compact('content', 'username', 'tags'));
    }
}
