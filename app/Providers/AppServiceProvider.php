<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
// use DB;
// use Auth;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        // $req_match_cnt = DB::table('request_match')
        //     ->join('items', 'request_match.first_item', '=', 'items.id')
        //     // ->where('items.user_id', Auth::user()->id)
        //     -> where('receive_date', null)
        //     ->get()
        //     ->count();
        // config(['req_match_cnt' => $req_match_cnt]);
    }
}
