<?php

namespace App\Http\Controllers;

use Auth;
use Session;
use App\User;
use App\Albums;
use App\Singles;
use App\Artist;
use App\Friendship;
use App\addSong;
use DB;
use Illuminate\Http\Request;

class MusicController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $singls = Singles::all()->shuffle();
        $nesingls = Singles::all()->sortByDesc("created_at");
        $albums = Albums::all()->shuffle();
        $mysongs = addSong::where('user_id', Auth::user()->id)->get();
        return view('music', [
            'singls' => $singls,
            'newsingls' => $nesingls,
            'albums' => $albums,
            'mysong' => $mysongs
        ]);
    }

    public function add($id)    
    {   
        $song = new addSong();
        $song->user_id = Auth::user()->id;
        $song->singl_id = $id;
        $song->save();

        return redirect()->back();
    }

    public function userMusic($id) 
    {
        $mysongs = addSong::where('user_id', Auth::user()->id)->get();
        $test = [];
        for($i = 0; $i < count($mysongs); $i++) {
            array_push($test, Singles::find($mysongs[$i])->first());
        }
        return view('usermusic', [
            'mysong' => $test
        ]);
    }
}
