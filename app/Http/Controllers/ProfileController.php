<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('profile.index');
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
        return view('profile.show');
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
    public function update(Request $request, string $id)
    {
        $request->validate([
            'firstname' => ['required', 'string', 'max:255'],
            'lastname' => ['required', 'string', 'max:255'],
            'nickname' => ['required', 'string', 'max:255', 'unique:users'],
            'postal_code' => ['required', 'regex:/^\d{7}$/'],
            'prefectures' => ['required', 'in:北海道,青森県,岩手県,宮城県,秋田県,山形県,福島県,茨城県,栃木県,群馬県,埼玉県,千葉県,東京都,神奈川県,新潟県,富山県,石川県,福井県,山梨県,長野県,岐阜県,静岡県,愛知県,三重県,滋賀県,京都府,大阪府,兵庫県,奈良県,和歌山県,鳥取県,島根県,岡山県,広島県,山口県,徳島県,香川県,愛媛県,高知県,福岡県,佐賀県,長崎県,熊本県,大分県,宮崎県,鹿児島県,沖縄県'],
            'house_number' => ['required'],
            'building_name' => ['required'],
            'phone_number' => ['required', 'regex:/^0\d{1,3}-\d{1,4}-\d{4}$/'],
        ],
        $messages = [
            'firstname.required' => '姓は必須項目です。',
            'lastname.required' => '名は必須項目です。',
            'nickname.required' => '表示用の名前は必須項目です。',
            'nickname.unique' => 'この表示用の名前は既に使用されています。',
            'postal_code.required' => '郵便番号は必須項目です。',
            'postal_code.regex' => '郵便番号は「0000000」の形式で入力してください。',
            'prefectures.required' => '都道府県は必須項目です。',
            'prefectures.in' => '都道府県が正確ではありません。',
            'house_number.required' => '住所（番地まで）は必須項目です。',
            'building_name.required' => '住所（ビル名等）は必須項目です。',
            'phone_number.required' => '電話番号は必須項目です。',
            'phone_number.regex' => '電話番号は「000-0000-0000」の形式で入力してください。',
        ]);

        $imageData = $request->avatar_img;
        if(strlen($imageData) > 100) {
            $img = $imageData;
            $folderPath = "./assets/img/avatar/"; //path location
            
            $image_parts = explode(";base64,", $img);

            // return $image_parts[0];
            $image_type_aux = explode("image/", $image_parts[0]);
            $image_type = $image_type_aux[1];
            $image_base64 = base64_decode($image_parts[1]);
            $uniqid = uniqid();
            $file = $folderPath . Auth::user()->id . '.'.$image_type;
            file_put_contents($file, $image_base64);

            $avatar_url = $file;

            Auth::user()->avatar_url = $avatar_url;
        }

        Auth::user()->firstname = $request->firstname;
        Auth::user()->lastname = $request->lastname;
        Auth::user()->nickname = $request->nickname;
        Auth::user()->postal_code = $request->postal_code;
        Auth::user()->prefectures = $request->prefectures;
        Auth::user()->house_number = $request->house_number;
        Auth::user()->building_name = $request->building_name;
        Auth::user()->phone_number = $request->phone_number;
        if($request->twitter != null && $request->twitter != "") {
            Auth::user()->twitter = "https://twitter.com/" . $request->twitter;
        } else {
            Auth::user()->twitter = $request->twitter;
        }

        if($request->instagram != null && $request->instagram != "") {
            Auth::user()->instagram = "https://www.instagram.com/" . $request->instagram;
        } else {
            Auth::user()->instagram = $request->instagram;
        }

        if($request->tiktok != null && $request->tiktok != "") {
            Auth::user()->tiktok = "https://www.tiktok.com/@" . $request->tiktok;
        } else {
            Auth::user()->tiktok = $request->tiktok;
        }

        Auth::user()->profile_complete_state = 1;
        Auth::user()->save();
        
        return redirect()->route('myItem.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }


    public function confirm() {
        return view('profile.confirm');
    }
}
