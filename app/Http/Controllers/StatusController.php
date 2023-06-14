<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Item;

class StatusController extends Controller
{
    public function register() {

        $items = Item::all();


        return view('status.register')
                ->with('items', $items);
    }

    public function matching() {
        $request_matches = DB::table('request_match')->where('match_state', 1)->get();
        return view('status.matching')
                ->with('request_matches', $request_matches);
    }
}
