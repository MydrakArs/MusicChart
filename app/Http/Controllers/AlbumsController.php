<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Singles;
use App\Albums;
use Auth;

class AlbumsController extends Controller
{
    public function index($id) {
        $album = Albums::where('id', $id)->first();
        $singls = Singles::where('album_id', $id)->get();
        $count = Singles::where('album_id', $id)->count();
        return view('album',[
            'album' => $album,
            'singls' => $singls,
            'count' => $count
        ]);
    }

    public function get() {
        $albums = Albums::all();

        return response()->json($albums);
    }

    public function store(Request $request) {
        $album = new Albums();

        $album->artist_id = Auth::user();
        $album->name = $request->name;
        $album->cover = $request->cover;
        $album->save();

        return response()->json($album);
    }
}
