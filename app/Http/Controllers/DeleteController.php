<?php

namespace App\http\Controllers;
use App\Models\Content;
use App\Models\Tag_combinations;
use Illuminate\Support\Facades\Storage;

class deleteController extends Controller{

    public function index($id){
        $post = Content::findOrfail($id);
        Tag_combinations::where('content_id', '=' ,  $id)->delete();
        $post->delete();

        return redirect('/manage_posts');
    }
}
