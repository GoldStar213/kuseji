<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use DB;
use App\Models\Item;

class ExchangeController extends Controller
{
    static public function index() {
        $models = DB::table('request_match')->get();
        $rlt = [];
        $mapValue = [];
        foreach($models as $i => $model) {
            $firstItem = $model->first_item;
            $secondItem = $model->second_item;
            if (isset($mapValue[$firstItem][$secondItem])) {
                $id = $mapValue[$firstItem][$secondItem];
                $rlt[$id]['grade'] += $model->grade;
                $rlt[$id]['cnt'] ++;
                $rlt[$id]['date'] = $model->send_date;
            }
            else {
                $id = count($rlt);
                $mapValue[$firstItem][$secondItem] = $id;
                $mapValue[$secondItem][$firstItem] = $id;
                array_push($rlt, [
                    "firstItem" => $firstItem,
                    "secondItem" => $secondItem,
                    "grade" => $model->grade,
                    "date" => $model->send_date,
                    "cnt" => 1
                ]);
            }
        }

        $rlts = [];
        foreach($rlt as $e) {
            if ($e['cnt'] != 2) continue;
            array_push($rlts, $e);
        }

        usort($rlts, array( 'self', 'checkFun' ));

        print_r($rlts);
        exit;

        $exchangeState = [];
        foreach($rlts as $rlt) {
            if(in_array($rlt["firstItem"], $exchangeState) || in_array($rlt["secondItem"], $exchangeState)) {
                continue;
            } else {
                $firstUser = Item::find($rlt["firstItem"])->user_id;
                $secondUser = Item::find($rlt["secondItem"])->user_id;
                Item::find($rlt["firstItem"])->user_id = $secondUser;
                Item::find($rlt["secondItem"])->user_id = $firstUser;

                array_push($exchangeState, $rlt["firstItem"]);
                array_push($exchangeState, $rlt["secondItem"]);

                DB::table('request_match')->where('first_item', $rlt["firstItem"])->where('second_item', $rlt["secondItem"])->delete();
                DB::table('request_match')->where('first_item', $rlt["secondItem"])->where('second_item', $rlt["firstItem"])->delete();
            }
        }
    }

    static function checkFun($a, $b) {
        if ($a['grade'] == $b['grade']) {
            if ($a['date'] == $b['date']) return 0;
            return ($a['date'] < $b['date']) ? -1 : 1;
        } 
        return ($a['grade'] < $b['grade']) ? -1 : 1;
    }
      
}
