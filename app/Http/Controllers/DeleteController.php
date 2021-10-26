<?php

namespace App\http\Controllers;
use App\Models\Content;
use Illuminate\Support\Facades\Storage;

class deleteController extends Controller{

    public function index($id){
        $post = Content::findOrfail($id);
        $post->delete();

        return redirect('/manage_posts');
    }
}
