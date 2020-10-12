<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Artist;
use App\Singles;
use App\Albums;
use Auth;

class ArtistsController extends Controller
{

    public function index($id) {
        $album = Albums::where('artist_id', $id)->get();
        $singls = Singles::where('artist_id', $id)->get();
        $artists = Artist::where('id', $id)->first();
        $count = Singles::where('artist_id', $id)->count();
        return view('artists',[
            'album' => $album,
            'singls' => $singls,
            'artists' => $artists,
            'count' => $count
        ]);
    }

    public function get() {
        $artists = Artist::all();

        return response()->json($artists);

    }

    public function getArtist($id) {
        $idartist = Artist::where('id', $id);
    }
}
