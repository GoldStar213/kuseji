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
use App\Models\ItemUser;

use Srmklive\PayPal\Services\ExpressCheckout;
use Srmklive\PayPal\Services\PayPal as PayPalClient;

use DB;
use Session;

class MyItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        return view('itemMana.myself.index', compact('frontal_colors', 'categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        $matchings = Matching::all();

        return view('itemMana.myself.create')
                ->with('frontal_colors', $frontal_colors)
                ->with('categories', $categories)
                ->with('matchings', $matchings);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        // return $request->register_type;
        $request->validate(
            [
            'title' => ['required', 'string'],
            'frontal_color' => ['required'],
            'category' => ['required', 'max:3'],
        ],
            $messages = [
            'title.required' => 'タイトルは必須項目です。',
            'frontal_color.required' => '額色は必須項目です。',
            'category.required' => 'カテゴリーは必須項目です。',
            'category.max' => 'カテゴリーは最大3つまで選択可能です。',
        ]
        );

        $front_img = $request->front_img;
        $back_img = $request->back_img;
        $side_img = $request->side_img;
        $title = $request->title;
        $description = $request->description;
        $frontal_color = $request->frontal_color;
        $categories = $request->category;

        if($request->register_type == 'pay') {
            
            Session::put("front_img", $front_img);
            Session::put("back_img", $back_img);
            Session::put("side_img", $side_img);
            Session::put("title", $title);
            Session::put("description", $description);
            Session::put("frontal_color", $frontal_color);
            Session::put("categories", $categories);
            Session::put("join_type", $request->join_type);
            Session::put("register_type", $request->register_type);

            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransaction'),
                    "cancel_url" => route('cancelTransaction'),
                    "LANDINGPAGE" => "Billing",
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "JPY",
                            "value" => "3000"
                        ]
                    ]
                ]
            ]);
            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()
                    ->route('myItem.index')
                    ->with('error', 'Something went wrong.');
            } else {
                return redirect()
                    ->route('myItem.index')
                    ->with('error', 'Something went wrong.');
            }
        } 
        if($request->register_type == 'nopay') {

            $item = new Item();

            $item->title = $title;
            $item->description = $description;

            if($front_img != null) {
                $item->front_img = $this->saveImage('front', $front_img);
            }

            if($back_img != null) {
                $item->back_img = $this->saveImage('back', $back_img);
            }

            if($side_img != null) {
                $item->side_img = $this->saveImage('side', $side_img);
            }

            $item->frontal_color_id = $frontal_color;
            $item->user_id = Auth::user()->id;
            $item->join_type = $request->join_type;

            $item->save();

            $max_item_id = DB::table('items')->max('id');

            foreach($request->category as $category) {
                DB::table('category_item')->insert([
                    'item_id' => $max_item_id,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }
        }

        return redirect()->route('myItem.create')->with('myItem_Register_Success', 'データは正常に保存されました。 引き続き新しい作品を登録できます。');
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
        return view('itemMana.myself.show', compact('myItem', 'comment_users', 'recently_items'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $frontal_colors = FrontalColor::all();
        $categories = Category::all();
        $matchings = Matching::all();
        $myItem = Item::find($id);
        return view('itemMana.myself.edit', compact('frontal_colors', 'categories', 'matchings', 'myItem'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate(
            [
            'title' => ['required', 'string'],
            'frontal_color' => ['required'],
            'category' => ['required'],
        ],
            $messages = [
            'title.required' => 'タイトルは必須項目です。',
            'frontal_color.required' => '額色は必須項目です。',
            'category.required' => 'カテゴリーは必須項目です。',
        ]
        );

        if($request->register_type == 'nopay') {
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
            $myItem->frontal_color_id = $request->frontal_color;

            $myItem->save();

            DB::table('category_item')->where('item_id', $id)->delete();

            foreach($request->category as $category) {
                DB::table('category_item')->insert([
                    'item_id' => $myItem->id,
                    'category_id' => $category,
                    'updated_at' => now(),
                ]);
            }

            return redirect()->route('myItem.edit', ['myItem' => $id])->with('myItem_Update_Success', 'データは正常に保存されました。');
        }

        if($request->register_type == 'pay') {

            Session::put("id", $id);
            Session::put("front_img", $request->front_img);
            Session::put("back_img", $request->back_img);
            Session::put("side_img", $request->side_img);
            Session::put("title", $request->title);
            Session::put("description", $request->description);
            Session::put("frontal_color", $request->frontal_color);
            Session::put("categories", $request->category);
            Session::put("join_type", $request->join_type);
            Session::put("register_type", $request->register_type);

            $provider = new PayPalClient();
            $provider->setApiCredentials(config('paypal'));
            $paypalToken = $provider->getAccessToken();
            $response = $provider->createOrder([
                "intent" => "CAPTURE",
                "application_context" => [
                    "return_url" => route('successTransactionUpdate'),
                    "cancel_url" => route('cancelTransactionUpdate'),
                ],
                "purchase_units" => [
                    0 => [
                        "amount" => [
                            "currency_code" => "JPY",
                            "value" => "3000"
                        ]
                    ]
                ]
            ]);

            if (isset($response['id']) && $response['id'] != null) {
                // redirect to approve href
                foreach ($response['links'] as $links) {
                    if ($links['rel'] == 'approve') {
                        return redirect()->away($links['href']);
                    }
                }
                return redirect()
                    ->route('myItem.edit', ['myItem' => $id])
                    ->with('error', 'Something went wrong.');
            } else {
                return redirect()
                    ->route('myItem.edit', ['myItem' => $id])
                    ->with('error', $response['message'] ?? 'Something went wrong.');
            }
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }

    public function list(Request $request)
    {
        $myItems = Item::where('user_id', Auth::user()->id);

        if($request->item_name != null) {
            $myItems = $myItems->where('title', $request->item_name);
        }

        if($request->frontal_color_id != "0") {
            $myItems = $myItems->where('frontal_color_id', $request->frontal_color_id);
        }

        if($request->category_id != null) {
            $myItems = $myItems->whereIn('id', DB::table('category_item')->whereIn('category_id', $request->category_id)->select('item_id')->pluck('item_id')->toArray());
            // $myItems = $myItems->whereIn('category_id', $request->category_id);
        }

        // if($request->join_type == 2) {
        //     $item_id = DB::table('match_item')->select('item_id')->pluck('item_id')->toArray();
        //     $myItems = $myItems->whereNotIn('id', $item_id);
        // }

        $myItems = $myItems->get();

        return view('itemMana.myself.list', compact('myItems'));
    }

    public function saveImage($pos, $imgData)
    {
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
    public function set_comment(Request $request)
    {

        $comment=ItemUser::where('user_id', Auth::user()->id);

        $comment=  ItemUser::create([
            'user_id' => Auth::user()->id,
            'item_id' =>  $request->item_id,
            'comment' => $request->comment,
        ]);

        return redirect()->route('item.show', ['item' => $request->item_id])->with('success', 'コメントが追加されました');
    }

    /**
     * process transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function processTransaction()
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1000.00"
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransaction(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $item = new Item();

            $item->title = Session::get('title');
            $item->description = Session::get('description');

            if(Session::get('front_img') != null) {
                $item->front_img = $this->saveImage('front', Session::get('front_img'));
            }

            if(Session::get('back_img') != null) {
                $item->back_img = $this->saveImage('back', Session::get('back_img'));
            }

            if(Session::get('side_img') != null) {
                $item->side_img = $this->saveImage('side', Session::get('side_img'));
            }

            $item->frontal_color_id = Session::get('frontal_color');
            $item->user_id = Auth::user()->id;
            $item->join_type = Session::get('join_type');
            $item->register_type = Session::get('register_type');

            $item->save();

            $item_id = Item::max('id');
            $categories = Session::get('categories');

            foreach($categories as $category) {
                DB::table('category_item')->insert([
                    'item_id' => $item_id,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return redirect()->route('myItem.create')->with('myItem_Register_Success', 'データは正常に保存されました。 引き続き新しいアイテムを登録できます。');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransaction(Request $request)
    {
        return redirect()
            ->route('createTransaction')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }


    public function processTransactionUpdate()
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $paypalToken = $provider->getAccessToken();
        $response = $provider->createOrder([
            "intent" => "CAPTURE",
            "application_context" => [
                "return_url" => route('successTransaction'),
                "cancel_url" => route('cancelTransaction'),
            ],
            "purchase_units" => [
                0 => [
                    "amount" => [
                        "currency_code" => "USD",
                        "value" => "1000.00"
                    ]
                ]
            ]
        ]);
        if (isset($response['id']) && $response['id'] != null) {
            // redirect to approve href
            foreach ($response['links'] as $links) {
                if ($links['rel'] == 'approve') {
                    return redirect()->away($links['href']);
                }
            }
            return redirect()
                ->route('createTransaction')
                ->with('error', 'Something went wrong.');
        } else {
            return redirect()
                ->route('createTransaction')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * success transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function successTransactionUpdate(Request $request)
    {
        $provider = new PayPalClient();
        $provider->setApiCredentials(config('paypal'));
        $provider->getAccessToken();
        $response = $provider->capturePaymentOrder($request['token']);
        if (isset($response['status']) && $response['status'] == 'COMPLETED') {

            $item = Item::find(Session::get('id'));

            $item->title = Session::get('title');
            $item->description = Session::get('description');

            if(Session::get('front_img') != null) {
                $item->front_img = $this->saveImage('front', Session::get('front_img'));
            }

            if(Session::get('back_img') != null) {
                $item->back_img = $this->saveImage('back', Session::get('back_img'));
            }

            if(Session::get('side_img') != null) {
                $item->side_img = $this->saveImage('side', Session::get('side_img'));
            }

            $item->frontal_color_id = Session::get('frontal_color');
            $item->user_id = Auth::user()->id;
            $item->join_type = Session::get('join_type');
            $item->register_type = 'pay';

            $item->save();

            $item_id = Item::max('id');
            $categories = Session::get('categories');

            foreach($categories as $category) {
                DB::table('category_item')->insert([
                    'item_id' => $item_id,
                    'category_id' => $category,
                    'created_at' => now(),
                    'updated_at' => now(),
                ]);
            }

            return redirect()->route('myItem.edit', ['myItem' => Session::get('id')])->with('myItem_Update_Success', '成果的に決済されました。');
        } else {
            return redirect()
                ->route('createTransactionUpdate')
                ->with('error', $response['message'] ?? 'Something went wrong.');
        }
    }
    /**
     * cancel transaction.
     *
     * @return \Illuminate\Http\Response
     */
    public function cancelTransactionUpdate(Request $request)
    {
        return redirect()
            ->route('createTransactionUpdate')
            ->with('error', $response['message'] ?? 'You have canceled the transaction.');
    }
}
