<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Item;
use App\Models\User;
use App\Models\Matching;
use App\Models\Category;
use App\Models\FrontalColor;

use DB;
use Auth;

class RequestMatchController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        $items = Item::whereNot('user_id', Auth::user()->id)->get();
        $matchings = Matching::all();
        return view('requestMatch.index', compact('frontal_colors', 'items', 'matchings', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $item = Item::where('id', $request->requestMatch)->first();
        $myItems = Item::where('user_id', Auth::user()->id)->get();

        return view('requestMatch.create', compact('item','myItems'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'first_item' => ['unique:request_match,first_item'],
            'second_item_id' => ['required'],
            'message' => ['required'],
            'grade' => ['required'],
        ],
        $messages = [
            'second_item_id.required' => '交換したい作品を選択してください。',
            'message.required' => 'メッセージ項目は必須です。',
            'grade.required' => 'リクエスト希望作品は必須です。',
        ]);

        $first_item = Item::find($request->first_item_id);
        $first_user = User::find($first_item->user_id);

        $second_item = Item::find($request->second_item_id);
        $second_user = User::find($second_item->user_id);

        if($first_item->register_type != 'pay') {
            return redirect()->back()->withErrors(['nopay' => '決済が完了した作品に対してのみマッチングリクエストを送信することができます。']);
        }


        if(DB::table('request_match')->where('first_item', $request->first_item_id)->where('first_item', $request->first_item_id)->count() > 0) {
            return redirect()->back()->withErrors(['already' => 'この現在の作品についてはすでにリクエストを送信しています。']);
        }

        $headers = [
            'Content-Type' => 'text/html; charset=UTF-8',
            'X-Mailer' => 'PHP/' . phpversion()
        ];
        
        mail($first_user->email, 'クセ字交換会のマッチングリクエストが届いています。', $first_user->nickname . '様からクセ字交換会のマッチングリクエストが届いています。<br><br>以下のURLからご確認いただけます。<br><br>' . url('/') . '/requestMatch_inbox', $headers);

        mail($second_user->email, 'クセ字交換会のマッチングリクエストが届いています。', $first_user->nickname . '様にマッチングリクエストが送信されました。', $headers);

        DB::table('request_match')->insert([
            'first_item' => $request->first_item_id,
            'second_item' => $request->second_item_id,
            'message' => $request->message,
            'grade' => $request->grade,
            'send_date' => now(),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        return redirect()->back()->with('success', 'マッチングリクエストが成果的に送信されました。');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
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
        if (DB::table("request_match")->where('first_item', $request->first_item)-> where('second_item', $request->second_item)->get()->first()->receive_grade != null ) {
            return "Failed";
        }
        $true = DB::update('UPDATE request_match SET receive_grade = ? WHERE first_item = ? AND second_item =?', [$request->receive_grade, $request->first_item, $request->second_item,]);
        
        return $true?  "OK": "Failed";
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function inbox()
    {

        $myItem_id = Item::where('user_id', Auth::user()->id)->pluck('id')->toArray();

        $request_matches = DB::table('request_match')->whereIn('first_item', $myItem_id)->get();

        return view('requestMatch/show_req_list', compact('request_matches'));

    }
}
