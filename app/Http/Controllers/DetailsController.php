<?php

namespace App\http\Controllers;

use App\Models\content;
use App\Models\user;
use App\Models\Tag_combinations;
use App\Models\Tags;
use App\Models\Upvotes;
use Illuminate\Http\Request;

class DetailsController extends Controller
{
    public
    function index($id)
    {
        //get the post information from the database
        $content = content::findOrFail($id);
        if ($content->active == 1) {
            return redirect('/');
        }

        //get the username connected to the post
        $userid = $content->user_id;
        $username = user::findOrFail($userid);

        //get the tags related to the post
        $tag_ids = Tag_combinations::all()->where('content_id', '=', $id);
        $tags = [];
        foreach ($tag_ids as $tag_id) {
            $tag_id = $tag_id->tag_id;
            $tag = Tags::findOrFail($tag_id);
            array_push($tags, $tag->name);
        }

        //get the amount of likes for this post
        $likeCount = count(Upvotes::all()->where('content_id', $content->id));

        //check if the person currently logged in has liked the post
        $likeState = Upvotes::select('*')
            ->where('content_id', $content->id)
            ->where('user_id', auth()->id())
            ->get();

        return view('Details', compact('content', 'username', 'tags', 'likeCount', 'likeState'));
    }

    public
    function toggleLike(Request $request){
        $user_id = auth()->id();
        $content_id = $request->content_id;

        //check if the person currently logged in has liked the post
        $likeState = Upvotes::select('*')
            ->where('content_id', $content_id)
            ->where('user_id', auth()->id())
            ->get();

        //change the database entry on whether or not the logged in person has liked the post
        if (count($likeState) == 0) {
            $likeCombination = new Upvotes();
            $likeCombination->content_id = $content_id;
            $likeCombination->user_id = $user_id;
            $likeCombination->save();
        }
        else{
            $likeState[0]->delete();
        }

        return redirect("/details/$content_id");
    }
}
