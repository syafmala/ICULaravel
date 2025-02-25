<?php

namespace App\Http\Controllers;

use App\Models\Feed;
use App\Models\Tag;
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

    public function show(Feed $feed)
    {
        Gate::authorize('update', $feed);
        $tags = Tag::all();
        return view('pages.feed.show', compact('feed','tags'));
    }

    public function create(){
        $tags = Tag::all();
        return view('pages.feed.create', compact('tags'));
    }
    

    public function store(Request $request){
        $validated_request = $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
            'tags' => 'required | array',
        ]);

        //ORM
        // add a user id to the $validated_request
        $user = Auth::user();
        $validated_request['user_id'] = $user->id;

        $feed=Feed::create($validated_request);
        $feed->tags()->attach($validated_request['tags']);
        return redirect()->route('feeds')->with('success', 'Feed created successfully');
    }

    public function update(Request $request, Feed $feed)
    {
        $feed->update($this->validateRequest($request));
        $feed->tags()->sync($request->tags);
        return redirect()->route('feeds')->with('success', 'Feed updated successfully!');;
    }

    private function validateRequest(Request $request)
    {
        return $request->validate([
            'title' => 'required | string | max:100',
            'description' => 'required | string | max:300',
            'tags' => 'required | array',
        ]);
    }

    public function userFeeds(){
        $user = Auth::user();
        $feeds = $user->feeds()->paginate(1);

        return view('pages.feed.user.feeds', compact('feeds'));
    }
}
