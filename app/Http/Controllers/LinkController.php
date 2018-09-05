<?php

namespace App\Http\Controllers;

use App\Link;
use App\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Redirect;

class LinkController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $links = Link::all();
        //$links = array();
        return view('links.index', ['links' => $links]);
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
            'url' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'status' => 'required',
            'dossier' => 'required',
        ]);

        $dossier = Dossier::findByNumber(Crypt::decrypt($request->input('dossier')));
        $data['dossier_id'] = $dossier->id;

        $data['url'] = $request->input('url');
        $data['title'] = $request->input('title');
        $data['status'] = $request->input('status');
        $data['google_position'] = $request->input('google_position');
        $data['google_page'] = $request->input('google_page');

        Link::create($data);
        return redirect()->route('clients.show', [$dossier->client_id])->with('success','Link registrato con successo');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
        $link = Link::find($id);
        $dossier = $link->dossier;
        $link->delete();
        return redirect()->route('clients.show', [$dossier->client_id])->with('message', 'Link eliminato con successo!');
    }

    public function remove(Request $request){

        $data =  (array)$request->input('data')['links'];
        $status = Link::remove($data);
        return response()->json(['success' => $status]);
    }
}
