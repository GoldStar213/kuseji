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
use App\Models\UserMana;
use App\Models\BlockUser;

use DB;

class UserManaController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('usermana.index');
    }


    /**
     * Show the form for creating a new resource.
     */


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)

    {
        
        $block_users=DB::table('block_state')->where('second_user', $request->block_id)->where('first_user',Auth::user()->id);
       if($block_users){
             $block_users->delete();
       }
       else{
        $block_users = DB::table('block_state')::create([
            'first_user' => Auth::user()->id,
        'second_user' =>  $request->block_id,
        'created_at' => "20000",
        'updated_at' => "20000",
        ]);
       }
       return view('usermana.list', compact('block_users'));
      
    }

    public function show(string $id)
    {
        $usermana = UserMana::find($id);
        $myItems = Item::where('user_id', $id)->get();
        return view('usermana.detail', compact('usermana', 'myItems'));
    }

    public function showDetail(string $id)
    {
        $myItem = Item::where('id', $id)->first();
        $item_id = $myItem->id;
        $user_id = DB::table('item_user')->where('item_id', $item_id)->where('comment', '!=', '')->pluck('user_id')->toArray();
        $comment_users = User::whereIn('id', $user_id)->get();
        $recently_items = Item::where('user_id', Auth::user()->id)->orderBy('created_at', 'DESC')->limit(10)->get();
        return view('usermana.show', compact('myItem', 'comment_users', 'recently_items'));
    }
    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id )
    {
        $usermana = UserMana::find($id);
        return view('usermana.edit', compact('usermana'));
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $usermana = UserMana::find($id);

        $usermana->firstname = $request->firstname;
        $usermana->lastname = $request->lastname;
        $usermana->nickname = $request->nickname;

        $usermana->save();
        return redirect()->route('usermana.edit', ['usermana' => $id])->with('success', '資料が成果的に保管されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $usermana = UserMana::find($id);
        $usermana->delete();

        return redirect()->route('usermana.index')->with('success', '資料が成果的に削除されました。');
    }

    public function list() {
        $block_users=BlockUser::where('first_user',Auth::user()->id)->pluck('second_user')->toArray();
        $usermanas = UserMana::all();
        $current_id=Auth::user()->id;

        return view('usermana.list', compact('usermanas','current_id','block_users'));
    }
    
    public function set_block( Request $request) {
        $block_users=BlockUser::where('second_user', $request->block_id)->where('first_user',Auth::user()->id);
       if($block_users->count()!=0){
             $block_users->delete();
       }
       else{
            $blockUser=  BlockUser::create([
            'first_user' => Auth::user()->id,
            'second_user' =>  $request->block_id,
            'created_at' => "20000000",
            'updated_at' => "20000000",
        ]);
       }
       return "ok";
    }
}
