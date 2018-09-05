<?php

namespace App\Http\Controllers;


use App\User;
use Illuminate\Database\Eloquent\ModelNotFoundException;
use Illuminate\Http\Request;
use App\Platform;
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

        return view('platforms.index',['platforms' => Platform::all()]);
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
            'platform' => 'required|string|max:100'
        ]);

        $platform_name = $request->input('platform');
        if (Platform::exists($platform_name)) {
            return redirect()->route('platforms.index')
                ->with('error',"Piattaforma \"$platform_name\" già esistente");
        }

        $platform = new Platform();
        $platform->platform = $platform_name;
        $platform->save();

        return redirect()->route('platforms.index')
            ->with('success',"Piattaforma \"$platform_name\" registrata con successo");
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $platform = Platform::find($id);
        return view('platforms.show', ['platform'=>$platform]);
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
