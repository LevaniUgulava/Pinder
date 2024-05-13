<?php

namespace App\Http\Controllers\System;

use App\Http\Controllers\Controller;
use App\Models\Post;
use App\Models\User;
use App\Notifications\LikeNotification;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\App;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Notification;

class LikeController extends Controller
{

    public function accept()
    {

    }
    public function like(Request $request)
    {
        $user = auth()->user();
        $postid = $request->id;

        $postuser = Post::with('user')->findorfail($postid);
        $follower = $postuser->user;
        $post = Post::findorfail($postid);
        $id = $post->user_id;
        $user->postss()->attach($postid);

        $user->followers()->attach($follower->id);
        $this->notify($user, $id, $follower);
        return redirect()->back();
    }

    protected function notify($user, $id, $follower)
    {
        $url = route('accept', ['user' => $user, 'follower' => $follower]);
        Notification::send($user, new LikeNotification($id, $url));
    }

    public function add($user, $follower)
    {

        $i = User::findorfail($user);
        $k = User::findOrFail($follower);

        $i->followers()->updateExistingPivot($k->id, ['accept' => true]);

        return redirect()->back()->with('success', 'Successfully updated accept status.');

    }

    public function unlike(Request $request)
    {
        $user = auth()->user();
        $postid = $request->id;
        $postuser = Post::with('user')->findorfail($postid);
        $follower = $postuser->user;
        $user->postss()->detach($postid);
        $user->followers()->attach($follower->id);
        return redirect()->back();
    }

    public function likedpost()
    {
        $posts = Post::orderbydesc('id')->get();
        return view('Post.likedpost', compact('posts'));
    }

    public function wholike($id)
    {
        $post = Post::with('users')->findorfail($id);
        return view('System.like', compact('post'));
    }

    public function Followers()
    {
        $id = Auth::user()->id;
        $user = User::whereHas('followers', function ($query) use ($id) {
            $query->where('user_id', $id)->where('accept', true);
        })->first();
        if ($user) {
            $followerIds = $user->followers->pluck('pivot.follower_id')->toarray();
            foreach ($followerIds as $id) {
                $users = User::where('id', $id)->get();

            }
            return view('System.follower', compact('users'));
        } else {
            return view('System.follower');

        }

    }
}
