<?php

namespace App\Http\Controllers;


use App\Platform;
use App\Search;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        return view('searches.index',['searches' => Search::all(), 'platforms' => Platform::getSelect()]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'platform_id' => 'required|exists:platforms,id',
            'keyword_id' => 'required|exists:keywords,id'
        ]);

        $platform_id = $request->input('platform_id');
        $keyword_id = $request->input('keyword_id');
        if (Search::exists($platform_id, $keyword_id)) {
            return redirect()->route('searches.index')
                ->with('error',"Ricerca \"(platform_id=$platform_id, keyword_id=$keyword_id)\" già esistente");
        }

        $search = new Search;
        $search->platform_id = $platform_id;
        $search->keyword_id = $keyword_id;
        $search->save();

        return redirect()->route('searches.index')
            ->with('success',"Ricerca \"(platform_id=$platform_id, keyword_id=$keyword_id)\" registrata con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $search = Search::find($id);
        return view('searches.show', ['search'=>$search]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
