<?php

namespace App\http\Controllers;
use App\Models\Content;

class ManagePostsController extends Controller
{
    public function index(){
        $id = auth()->id();
        $posts = Content::all()->where('user_id', $id);

        return view('ManagePosts', compact('posts'));
    }


}
