<?php

namespace App\Http\Controllers;

use DB;
use Auth;
use App\User;
use App\Friendship;

use Illuminate\Http\Request;

class FriendshipsController extends Controller
{
    public function index($id) {
        $user = User::where('id', $id)->first();
        $friends = DB::table('users')
                     ->join('friendships', function($join) {
                        $join->on('users.id', '=', 'friendships.requester')
                             ->where('friendships.status', '=', 1);
                     })->get();
        $incoming = DB::table('users')
                      ->join('friendships', function($join) {
                        $join->on('users.id', '=', 'friendships.requester')
                             ->where('friendships.status', '=', 0);
                    })->get();
        $outgo = DB::table('users')
                    ->join('friendships', function($join) {
                        $join->on('users.id', '=', 'friendships.user_requested')
                             ->where('friendships.status', '=', 0);
                    })->get();
        return view('friends', [
                'user' => $user,
                'friends' => $friends,
                'outgoes' => $outgo,
                'incoming' => $incoming
        ]); 
    }

    public function check($id)
    {
        if(Auth::user()->is_friends_with($id) === 1)
        {
            return [ "status" => "friends" ];
        }
        
        if(Auth::user()->has_pending_friend_request_from($id))
        {
            return [ "status" => "pending" ];
        }

        if(Auth::user()->has_pending_friend_request_sent_to($id))
        {
            return [ "status" => "waiting" ];
        }

        return [ "status" => 0 ];
    }

    public function add_friend($id)
    {
        //sending notifications, emails, broadcasting.
       $resp = Auth::user()->add_friend($id);

       User::find($id)->notify(new \App\Notifications\NewFriendRequest(Auth::user()) );

       return $resp;
    }

    public function accept_friend($id) {

        $resp = Auth::user()->accept_friend($id);

        User::find($id)->notify(new \App\Notifications\FriendRequestAccepted(Auth::user()) );

        return $resp;
    }
}
