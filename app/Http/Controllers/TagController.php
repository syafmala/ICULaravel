<?php

namespace App\Http\Controllers;

use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class TagController extends Controller
{
    public function index(){
        $tags = Tag::paginate(3);
        return view('pages.tags.index', compact('tags'));
    }

    public function create(){
        return view('pages.tags.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:20',
        ]);

        Tag::create($request->all());
        return redirect()->route('tags')->with('success', 'Tag created successfully');
    }
    

    // public function store(Request $request){
    //     $validated_request = $request->validate([
    //         'title' => 'required | string | max:100',
    //     ]);

    //     //ORM
    //     // add a user id to the $validated_request
    //     $user = Auth::user();
    //     $validated_request['user_id'] = $user->id;
    //     //$validated_request['user_id'] = 1;
    //     Tag::create($validated_request);
    //     return redirect()->route('feeds')->with('success','Feed created successfully!');
    // }
}
