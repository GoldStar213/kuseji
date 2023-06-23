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
            "Content-Encoding" => "UTF-8",
            "Content-type" => "text/csv; charset=UTF-8",
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
            mb_convert_encoding("番号", 'UTF-8', 'auto'),
            mb_convert_encoding("作品名", 'UTF-8', 'auto'),
            mb_convert_encoding("作品説明", 'UTF-8', 'auto'),
            mb_convert_encoding("ペンネーム", 'UTF-8', 'auto'),
            mb_convert_encoding("ツイッター", 'UTF-8', 'auto'),
            mb_convert_encoding("インスタ", 'UTF-8', 'auto'),
            mb_convert_encoding("TikTok", 'UTF-8', 'auto'),
            mb_convert_encoding("登録日", 'UTF-8', 'auto'),
        ]);

        //adding the data from the array
        $i = 1;
        foreach ($items as $item) {
            $user = User::find($item->user_id);
            fputcsv($handle, [
                $i ++,
                mb_convert_encoding($item->title, 'UTF-8', 'auto'),
                mb_convert_encoding($item->description, 'UTF-8', 'auto'),
                mb_convert_encoding($user->nickname, 'UTF-8', 'auto'),
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
            "Content-Encoding" => "UTF-8",
            "Content-type" => "text/csv; charset=UTF-8",
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
            mb_convert_encoding("番号", 'UTF-8', 'auto'),
            mb_convert_encoding("リクエスト作品", 'UTF-8', 'auto'),
            mb_convert_encoding("作品所有者", 'UTF-8', 'auto'),
            mb_convert_encoding("リクエスト転送時間", 'UTF-8', 'auto'),
            mb_convert_encoding("マッチング希望", 'UTF-8', 'auto'),
            mb_convert_encoding("応答作品", 'UTF-8', 'auto'),
            mb_convert_encoding("作品所有者", 'UTF-8', 'auto'),
            mb_convert_encoding("応答時間", 'UTF-8', 'auto'),
            mb_convert_encoding("マッチング希望", 'UTF-8', 'auto'),
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
                mb_convert_encoding($first_user->nickname, 'UTF-8', 'auto'),
                $request_match->send_date,
                $request_match->grade,
                url('/') . $second_item->front_img,
                mb_convert_encoding($second_user->nickname, 'UTF-8', 'auto'),
                $request_match->receive_date,
                $request_match->receive_grade,
            ]);

        }

        fclose($handle);

        //download command
        return url('/') . "/" . $filename;
    }
}
