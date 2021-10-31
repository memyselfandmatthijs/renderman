<?php

namespace App\http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;

class updateProfileController extends Controller{
    public function index(){
        $id = auth()->id();

        $user = User::findOrFail($id);

        return view('updateProfile', compact('user'));
    }

    public function save(Request $request){
        $request->validate([
            'name' => 'required',
            'email' => 'required'
        ]);

        $id = auth()->id();

        $user = User::findOrFail($id);

        $user->name = $request->name;
        $user->email = $request->email;

        $user->save();

        $feedback = "Changes saved";

        $user = User::findOrFail($id);

        return view('updateProfile', compact('feedback', 'user'));
    }

}
