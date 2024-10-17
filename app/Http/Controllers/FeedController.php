<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Facades\Log;

class FeedController extends Controller
{
    public function index(){

        //$feeds = Feed::all(); 
        $feeds = Feed::paginate(3);
        return view('pages.feed.index', compact('feeds'));
    }

    public function show(Feed $feed){

        //dd($feed);
        //Log::debug("Show feed", [ 'feed' =>$feed ]);
        Gate::authorize('update', $feed);
        return view('pages.feed.show', compact('feed'));
    }

    public function create(){
        return view('pages.feed.create');
    }

    public function store(Request $request){
        $validated_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

        //ORM
        // add a user id to the $validated_request
        $user = Auth::user();
        $validated_request['user_id'] = $user->id;
        //$validated_request['user_id'] = 1;
        Feed::create($validated_request);
        return redirect()->route('feeds')->with('success','Feed created successfully!');
    }

    public function update(Request $request, Feed $feed){
        $validated_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
        ]);

        $feed->update($validated_request);
        return redirect()->route('feeds');
    }

}
