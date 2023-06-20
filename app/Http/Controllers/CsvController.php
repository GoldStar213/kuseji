<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Models\User;
use App\Models\Item;

use DB;
use File;

class CsvController extends Controller
{
    public function register_csv() {
        $items = Item::get();

        // these are the headers for the csv file. Not required but good to have one incase of system didn't recongize it properly
        $headers = array(
            'Content-Type' => 'text/csv'
        );


        //I am storing the csv file in public >> files folder. So that why I am creating files folder
        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        //creating the download file
        $filename = "files/登録状況_" . now()->format('Y-m-d-H-i-s') . ".csv";
        // dd($filename);
        $filename1 =  public_path($filename);
        $handle = fopen($filename1, 'w');

        //adding the first row
        fputcsv($handle, [
            "番号",
            "作品名",
            "作品説明",
            "登録者名",
            "ペンネーム",
            "都道府県",
            "市区町村",
            "ツイッター",
            "インスタ",
            "TikTok",
            "登録日",
        ]);

        //adding the data from the array
        $i = 1;
        foreach ($items as $item) {
            $user = User::find($item->user_id);
            fputcsv($handle, [
                $i ++,
                $item->title,
                $item->description,
                $user->firstname . " " . $user->lastname,
                $user->nickname,
                $user->prefectures,
                $user->house_number,
                $user->twitter,
                $user->instagram,
                $user->tiktok,
                $item->created_at->format('Y-m-d H-i'),
            ]);

        }

        fclose($handle);

        //download command
        return url('/') . "/" . $filename;
    }

    public function matching_csv() {
        $request_matches = DB::table('request_match')->where('match_state', 1)->get();

        $headers = array(
            'Content-Type' => 'text/csv'
        );


        if (!File::exists(public_path()."/files")) {
            File::makeDirectory(public_path() . "/files");
        }

        //creating the download file
        $filename = "files/マッチング状況_" . now()->format('Y-m-d-H-i-s') . ".csv";
        // dd($filename);
        $filename1 =  public_path($filename);
        $handle = fopen($filename1, 'w');

        //adding the first row
        fputcsv($handle, [
            "番号",
            "リクエスト作品",
            "作品所有者",
            "リクエスト転送時間",
            "マッチング希望",
            "応答作品",
            "作品所有者",
            "応答時間",
            "マッチング希望",
        ]);

        //adding the data from the array
        $i = 1;
        foreach ($request_matches as $request_match) {
            $first_item = Item::find($request_match->first_item);
            $first_user = User::find($first_item->user_id);
            $second_item = Item::find($request_match->second_item);
            $second_user = User::find($second_item->user_id);
            fputcsv($handle, [
                $i ++,
                url('/') . $first_item->front_img,
                $first_user->firstname . " " . $first_user->lastname,
                $request_match->send_date,
                $request_match->grade,
                url('/') . $second_item->front_img,
                $second_user->firstname . " " . $second_user->lastname,
                $request_match->receive_date,
                $request_match->receive_grade,
            ]);

        }

        fclose($handle);

        //download command
        return url('/') . "/" . $filename;
    }
}
