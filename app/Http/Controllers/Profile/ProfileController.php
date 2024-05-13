<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Models\Notification;
use App\Models\Post;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function home()
    {
        $posts = Post::withCount('users')->where('user_id', auth()->user()->id)->with(['images', 'category', 'user'])->get();
        $notifications = Notification::where('data->notifiable_id', auth::user()->id)->get();
        return view('Profile.home', compact('posts', 'notifications'));
    }

    public function profile()
    {
        $user = User::where('id', auth()->user()->id)->with('profileimg')->first();
        return view('Profile.profile', compact('user'));
    }

    public function userupdate(Request $request)
    {
        $user = User::findorfail(auth()->user()->id);

        $user->update([
            'name' => $request->name,
            'email' => $request->email,

        ]);

        if ($request->hasfile('image')) {

            $path = public_path() . "/images/ProfilePicture";

            $image = $request->file('image');
            $imagename = date('now()') . $image->getClientOriginalName();

            $image->move($path, $imagename);
            $user->profileimg()->updateOrcreate(
                ['user_id' => $user->id],
                ['user_id' => $user->id, 'image' => $imagename]
            );

        }

        return redirect()->back()->with('message', 'Updated Profile');

    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
