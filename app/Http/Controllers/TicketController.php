<?php

namespace App\Http\Controllers;

use App\Dossier;
use App\Ticket;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Auth;

class TicketController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'messaggio' => 'required|string|max:255',
            'oggetto' => 'required|string',
        ]);
        $dossier = Dossier::findByNumber(Crypt::decrypt($request->input('dossier')));
        $data['dossier_id'] = $dossier->id;
        $data['oggetto'] = $request->input('oggetto');
        $data['messaggio'] = $request->input('messaggio');
        $data['parent_id'] = $request->input('parent');
        $data['status'] = 'open';

        Ticket::create($data);
        return redirect()->route('clients.show', [$dossier->client_id])->with('success','Segnalazione registrata con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        try {
            $ticket = Ticket::findOrFail($id);
            $dossier = $ticket->dossier;
            if (!$dossier->isOwner(Auth::user()) && !Auth::user()->isAdmin())
                return redirect()->route('clients.show', [$dossier->client_id])->with('error', 'Ticket non presente');
            return view('tickets.show', ['ticket' => $ticket]);
        }
        catch (ModelNotFoundException $exception){
            return redirect()->action('ClientController@index')->with('error','Cliente mancante');
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

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
