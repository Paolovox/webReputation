<?php

namespace App\Http\Controllers;

use App\Document;
use App\Dossier;
use App\Link;
use App\Ticket;
use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Client;
use Illuminate\Support\Facades\Auth;

class PlatformController extends Controller
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
    public function index(Request $request){

        return view('platforms.index');
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
    public function store(Request $request){
        $request->validate([]);
        $name = $request->input('name');

        $lawyer = Auth::user()->id;
        if(Auth::user()->hasRole('admin'))
            $lawyer = $request->input('lawyer');

        $client = new Client;
        $client->name = $name;
        $client->save();

        $dossier = new Dossier;
        $dossier->number = Dossier::getNumber();
        $dossier->lawyer_id = $lawyer;
        $dossier->client_id = $client->id;

        $dossier->save();
        return redirect()->route('clients.show', [$dossier->client_id])
            ->with('success','Cliente registrato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {


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

    public function search(Request $request)
    {
        if(Auth::user()->isAdmin())
            return Client::where('name', 'like','%'.$request->get('q').'%')->get(['clients.id','clients.name']);
        else
            return Client::search($request->get('q'), Auth::user());
    }
}
