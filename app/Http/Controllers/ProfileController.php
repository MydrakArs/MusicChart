<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Albums;
use App\Singles;
use App\Artist;
use App\Friendship;
use Illuminate\Support\Facades\Input;
use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function index($id) {

        $user = User::where('id', $id)->first();
        $countFriend = Friendship::where('user_requested' , $id)->where('status', 1)->count();;
        $nesingls = Singles::where('artist_id', $id)->get();
        return view('profile', [
                'user' => $user,
                'countf' => $countFriend,
                'singls' => $nesingls
        ]);
    }

    public function edit() {

        return view('profile.edit')->with('info', Auth::user()->profile);
    }

    public function update(Request $r)
    {

        $this->validate($r, [
            'location' => 'required',
            'about' => 'required|max:255'
        ]);

        Auth::user()->profile()->update([
            'location' => $r->location,
            'about' => $r->about
        ]);

        if($r->hasFile('avatar')) {
            Auth::user()->update([
                'profile_image' => $r->avatar->store('public/avatars')
            ]);
        }

        Session::flash('success', 'Profile updated.');
        return redirect()->back();

    }

    public function edit_album() {
        // Albums::where('artist_id', Auth::user()->artist->id)
        return view('profile.add')->with('album', Albums::all());  
    }

    public function edit_song() {
        return view('profile.addsong')->with('singls', Singles::all());
    }

    public function add_album(Request $r) {
        $album = new Albums();
        $album->artist_id = Auth::user()->id;
        $album->name = $r->name;
        $album->cover = $r->cover;
        $album->album_image = $r->avatar->store('public/albumfoto');
        // $album->album_image = $r->album_image->store('public/albumfoto');
        $album->save();

        $files = $r->file('album_image');
        if($r->hasFile('album_image')) {
            foreach ($files as $file) {
                $song = new Singles();
                $song->album_id = $album->id;
                $song->artist_id = Auth::user()->id;
                $fullfilename = $file->getClientOriginalName();
                $filename = pathinfo($fullfilename)['filename'];
                $song->title = $filename;
                $song->path = $file->store('public/song');
                $song->lyrics = $r->avatar->store('public/songphoto');
                $song->save();
            }
        }

        return redirect()->back(); 
    }

    public function add_song(Request $r) {

        $files = $r->file('album_image');
        if($r->hasFile('album_image')) {
            foreach ($files as $file) {
                $song = new Singles();
                $song->artist_id = Auth::user()->id;
                $song->title = $r->name;
                $song->path = $file->store('public/song');
                $song->lyrics = $r->avatar->store('public/songphoto');
                $song->save();
            }
        }

        return redirect()->back();  
    }
}
