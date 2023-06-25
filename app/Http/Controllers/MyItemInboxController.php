<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Pagination\LengthAwarePaginator;

use App\Models\FrontalColor;
use App\Models\Category;
use App\Models\Matching;
use App\Models\Item;
use App\Models\User;

use DB;

class MyItemInboxController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request) {
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        $matchings = Matching::all();
        return view('itemMana.inbox.index', compact('frontal_colors', 'categories', 'matchings'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        $matchings = Matching::all();

        return view('itemMana.inbox.create')
                ->with('frontal_colors', $frontal_colors)
                ->with('categories', $categories)
                ->with('matchings', $matchings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'front_img' => ['required'],
            'back_img' => ['required'],
            'side_img' => ['required'],
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'frontal_color' => ['required'],
            'category' => ['required'],
        ],
        $messages = [
            'front_img.required' => '前面画像が選択されていません。',
            'back_img.required' => '背面画像が選択されていません。',
            'side_img.required' => '側面画像が選択されていません。',
            'title.required' => 'タイトルは必須項目です。',
            'description.required' => '説明は必須項目です。',
            'frontal_color.required' => '額色は必須項目です。',
            'category.required' => 'カテゴリーは必須項目です。',
        ]);

        // return strlen($request->matching);
        if($request->join_type == 1 && $request->matching == "") {
            return redirect()->back()->withErrors(['matching' => '参加の可否が 「はい」の場合、「マッチング」フィールドが必要です。']);
        }

        $item = Item::create([
            'title' => $request->title,
            'description' => $request->description,
            'front_img' => $this->saveImage('front', $request->front_img),
            'back_img' => $this->saveImage('back', $request->back_img),
            'side_img' => $this->saveImage('side', $request->side_img),
            'category_id' => $request->category,
            'frontal_color_id' => $request->frontal_color,
            'user_id' => Auth::user()->id,
        ]);

        if($request->join_type == 1 && strlen($request->matching) > 0) {

            if(Item::all()->count() == 0) {
                $max_id = 1;
            } else {
                $max_id = Item::max('id');
            }

            DB::table('match_item')->insert([
                'item_id' => $max_id,
                'match_id' => $request->matching,
                'join_date' => now(),
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }

        return redirect()->route('myItem.create')->with('myItem_Register_Success', 'データは正常に保存されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $myItem = Item::where('user_id', Auth::user()->id)->where('id', $id)->first();
        $item_id = $myItem->id;
        $user_id = DB::table('item_user')->where('item_id', $item_id)->where('comment', '!=', '')->pluck('user_id')->toArray();
        $comment_users = User::whereIn('id', $user_id)->get();
        $recently_items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->limit(10)->get();
        return view('itemMana.inbox.show', compact('myItem', 'comment_users', 'recently_items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id, $data)
    {
        // $id = $data->myItem_inbox;
        // $receive_grade = $data->receive_grade;
        dd($data);
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        $matchings = Matching::all();
        $myItem = Item::find($id);
        // return view('itemMana.inbox.edit', compact('frontal_colors', 'categories', 'matchings', 'myItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'frontal_color' => ['required'],
            'category' => ['required'],
        ],
        $messages = [
            'title.required' => 'タイトルは必須項目です。',
            'description.required' => '説明は必須項目です。',
            'frontal_color.required' => '額色は必須項目です。',
            'category.required' => 'カテゴリーは必須項目です。',
        ]);

        // return strlen($request->matching);
        if($request->join_type == 1 && $request->matching == "") {
            return redirect()->back()->withErrors(['matching' => '参加の可否が 「はい」の場合、「マッチング」フィールドが必要です。']);
        }

        $myItem = Item::find($id);

        if($request->front_img != null) {
            $myItem->front_img = $this->saveImage('front', $request->front_img);
        }

        if($request->back_img != null) {
            $myItem->back_img = $this->saveImage('back', $request->back_img);
        }

        if($request->side_img != null) {
            $myItem->side_img = $this->saveImage('side', $request->side_img);
        }

        $myItem->title = $request->title;
        $myItem->description = $request->description;
        $myItem->category_id = $request->category;
        $myItem->frontal_color_id = $request->frontal_color;

        $myItem->save();

        return redirect()->route('myItem.edit', ['myItem' => $id])->with('myItem_Register_Success', 'データは正常に保存されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function list(Request $request) {
        $myItems = Item::where('user_id', Auth::user()->id);

        if($request->item_name != null) {
            $myItems = $myItems->where('title', $request->item_name);
        }

        if($request->frontal_color_id != "0") {
            $myItems = $myItems->where('frontal_color_id', $request->frontal_color_id);
        }
        
        if($request->category_id != null) {
            $myItems = $myItems->whereIn('id', DB::table('category_item')->whereIn('category_id', $request->category_id)->select('item_id')->pluck('item_id')->toArray());
        }

        if($request->matching_id != 0) {
            $item_id = DB::table('match_item')->select('item_id')->where('match_id', $request->matching_id)->pluck('item_id')->toArray();
            $myItems = $myItems->whereIn('id', $item_id);
        }

        if($request->join_type == 1) {
            $item_id = DB::table('match_item')->select('item_id')->pluck('item_id')->toArray();
            $myItems = $myItems->whereIn('id', $item_id);
        }

        if($request->join_type == 2) {
            $item_id = DB::table('match_item')->select('item_id')->pluck('item_id')->toArray();
            $myItems = $myItems->whereNotIn('id', $item_id);
        }

        $myItems = $myItems->get();

        return view('itemMana.inbox.list', compact('myItems'));
    }

    public function saveImage($pos, $imgData) {
        if(strlen($imgData) > 100) {
            $img = $imgData;
            $folderPath = "./assets/img/items/" . $pos . "/"; //path location
            
            $image_parts = explode(";base64,", $img);

            // return $image_parts[0];
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            
            if(Item::all()->count() == 0) {
                $max_id = 1;
            } else {
                $max_id = Item::max('id') + 1;
            }

            $file = $folderPath . $max_id . '.'.$image_type;
            file_put_contents($file, $image_base64);

            $image_url = $file;

            return $image_url;
        }
    }
 
}
