<?php

namespace App\http\Controllers;
use App\Models\Content;

class deleteController extends Controller{

    public function index($id){
        Content::findOrfail($id)->delete();

        return redirect('/manage_posts');
    }
}
