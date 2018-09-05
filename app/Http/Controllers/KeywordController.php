<?php

namespace App\Http\Controllers;

use App\Mail;
use App\Keyword;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Response;
use Mockery\Exception;

class KeywordController extends Controller
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
    public function index()
    {
        return view('keywords.index',['keywords' => Keyword::all()]);
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
            'name' => 'required|string|max:255',
        ]);

        $keyword_name = $request->input('name');
        if (Keyword::exists($keyword_name)) {
            return redirect()->route('keywords.index')
                ->with('error',"Keyword \"$keyword_name\" già esistente");
        }

        $keyword = new Keyword();
        $keyword->keyword = $keyword_name;
        $keyword->save();

        return redirect()->route('keywords.index')
            ->with('success',"Keyword \"$keyword_name\" registrata con successo");
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeBackup(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
        ]);
        try{
            $lawyer = User::addLawyer($request->input('name'), $request->input('email'));
            Mail::sendWelcomeEmail($lawyer);
        } catch (Exception $exception){
            $lawyer->forceDelete();
            return redirect()->route('lawyers.index')->with('fail','Non e\' stato possibile aggiunngere l\'avvocato. Controllare i dati prima di riprovare.');
        }
        return redirect()->route('lawyers.index')->with('success','Avvocato registrato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $keyword = Keyword::find($id);
        return view('keywords.show', ['keyword'=>$keyword]);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function showBackup($id)
    {
        $lawyer = User::findLawyer($id);
        return view('keywords.show', ['lawyer'=>$lawyer]);
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

    public function autocomplete() {
        $term = Input::get('term');
        $results = array();
        $queries = Keyword::where('keyword', 'LIKE', '%'.$term.'%')->take(5)->get();
        foreach ($queries as $query) {
            $results[] = [ 'id' => $query->id, 'value' => $query->keyword ];
        }
        return Response::json($results);
    }
}
