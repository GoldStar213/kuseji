<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;

use App\Models\ItemUser;

use DB;
use Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
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
        $item = Item::find($id);
        return view('item.show', compact('item'));
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
    public function update(Request $request)
    {
        $item_id = $request->item_id;
        $user_id = $request->user_id;
        $result = ItemUser::where('item_id', $item_id)->where('user_id', $user_id)->where('like_state', 1)->get()->count();
        if ($result !=0 ) return "failed";

        $result = ItemUser::where('item_id', $item_id)->where('user_id', $user_id)->get()->count();
        if ( $result == 0 ) {
            $res = ItemUser::create([
                'item_id' => $item_id,
                'user_id' => $user_id,
                'comment' => '',
                'like_state' => 1
            ]);
        } else {
            $res = ItemUser::where('item_id', $item_id)->where('user_id', $user_id) -> update(['like_state' => 1]);
        }
        $cnt = ItemUser::where('item_id', $item_id)-> where('like_state', 1)->get()->count();
        return $cnt;
    }
    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function list(Request $request) {
        $items = Item::whereNot('user_id', Auth::user()->id);

        if($request->item_name != null) {
            $items = $items->where('title', $request->item_name);
        }

        if($request->frontal_color_id != "0") {
            $items = $items->where('frontal_color_id', $request->frontal_color_id);
        }
        
        if($request->category_id != null) {
            $items = $items->whereIn('category_id', $request->category_id);
        }

        $items = $items->get();

        return view('requestMatch.itemlist', compact('items'));
    }

    public function getAllItem(Request $request) {
        return 1;
    }
}
