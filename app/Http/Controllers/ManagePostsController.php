<?php

namespace App\http\Controllers;
use App\Models\Content;
use Illuminate\Http\Request;

class ManagePostsController extends Controller
{
    public function index(){
        $id = auth()->id();
        $posts = Content::all()->where('user_id', $id);

        return view('ManagePosts', compact('posts'));
    }

    public function visibility(Request $request){
        $id = $request->id;
        $checkStatus = Content::findOrFail($id);

        $post = Content::findOrFail($id);
        if($checkStatus->active == 1){
            $post->active = 0;
        }
        else{
            $post->active = 1;
        }
        $post->save();

        return redirect('/manage_posts');
    }


}
