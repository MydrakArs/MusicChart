<?php 
namespace App\Http\Controllers;

use Illuminate\Http\Request;

class StartController extends Controller
{
    public function sendMessage(\Illuminate\Http\Request $request) {
        event(new \App\Events\NewMessage($request->input('message')));
        
    }
}