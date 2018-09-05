<?php

namespace App\Http\Controllers;

use App\Document;
use App\Dossier;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Crypt;

class DocumentController extends Controller
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
            'title' => 'required|string|max:255',
            'dossier' => 'required',
            'file'       => 'required|mimes:png,pdf,jpeg,doc,docx,xls'
        ]);

        $file = $request->file('file');

        $dossier = Dossier::findByNumber(Crypt::decrypt($request->input('dossier')));
        $data['dossier_id'] = $dossier->id;

        $data['title'] = $request->input('title');
        $data['original_filename'] = $file->getClientOriginalName();
        $data['filename'] = md5($data['original_filename'] . time()) . '.' . $file->getClientOriginalExtension();

        Storage::disk('documents')->put($data['filename'], \File::get($file));

        $document = Document::create($data);
        return redirect()->route('clients.show', [$dossier->client_id])->with('success','Documento registrato con successo');
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
        $doc = Document::findOrFail($id);
        $dossier = $doc->dossier;
        $doc->delete();
        return redirect()->route('clients.show', [$dossier->client_id])->with('message', 'Link eliminato con successo!');
    }

    public function getFile($filename)
    {
        $storagePath  = Storage::disk('documents')->getDriver()->getAdapter()->getPathPrefix().'/';
        return response()->download($storagePath.$filename, null, [], null);
    }
}
