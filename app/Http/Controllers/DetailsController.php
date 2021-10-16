<?php

namespace App\http\Controllers;

use App\Models\content;
use App\Models\user;

class DetailsController extends Controller
{
    public function index($id){

        $content = content::findOrFail($id);
        $userid = $content->user_id;
        $username = user::findOrFail($userid);

        return view('Details', compact('content', 'username'));
    }
}
