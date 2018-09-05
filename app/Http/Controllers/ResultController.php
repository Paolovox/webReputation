<?php

namespace App\Http\Controllers;


use App\Platform;
use App\Result;
use App\Search;
use Illuminate\Http\Request;

class ResultController extends Controller
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
        return view('results.index',['results' => Result::all(), 'searches' => Search::getSelect(), 'platforms' => Platform::getSelect()]);
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
            'search_id' => 'required|exists:searches,id',
            # Aggiungere gli altri parametri e salvarli nell'oggetto $result
        ]);

        $search_id = $request->input('search_id');
        $search = Search::find($search_id);

        $result = new Result;
        $result->search_id = $search_id;
        $result->link = "DA IMPLEMENTARE";
        $result->status = "DA IMPLEMENTARE";
        $result->position = "DA IMPLEMENTARE";
        $result->description = "DA IMPLEMENTARE";

        $result->save();

        return redirect()->route('results.index')
            ->with('success',"Risultato ricerca \"(platform_id=$search->platform_id, keyword_id=$search->keyword_id)\" registrato con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $result = Result::find($id);
        return view('results.show', ['result'=>$result]);
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
