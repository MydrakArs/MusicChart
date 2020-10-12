<?php

namespace App\Providers;

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
use Illuminate\Support\Facades\View;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layouts.header'], function ($view) {
            $mysongs = addSong::where('user_id', Auth::user()->id)->get();
            $test = [];
            for($i = 0; $i < count($mysongs); $i++) {
                array_push($test, Singles::find($mysongs[$i])->first());
            }
            return view::share('mysongs', $test);
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
