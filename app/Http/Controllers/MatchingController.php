<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Models\Matching;

class MatchingController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('matching.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('matching.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $matching = Matching::create([
            'title' => $request->title,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date
        ]);

        return redirect()->route('matching.create')->with('success', '資料が成果的に保管されました。');
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
        $matching = Matching::find($id);
        return view('matching.edit', compact('matching'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $matching = Matching::find($id);

        $matching->title = $request->title;
        $matching->start_date = $request->start_date;
        $matching->end_date = $request->end_date;

        $matching->save();
        return redirect()->route('matching.edit', ['matching' => $id])->with('success', '資料が成果的に保管されました。');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $matching = Matching::find($id);
        $matching->delete();

        return redirect()->route('matching.index')->with('success', '資料が成果的に削除されました。');
    }

    public function list() {
        $matchings = Matching::all();

        return view('matching.list', compact('matchings'));
    }
}
