<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\View;
use App\Models\Abonne;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AbonneController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
 
 


    public function index()
    {
        $abonnes = Abonne::paginate(10);

        // load the view and pass the sharks
      
        return View::make('crud.listeabonne')
        ->with('abonnes', $abonnes);;
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
        $this->validate($request, [
            'nom' => 'required',
            'prenom' => 'required',
            'tel' => 'required',
            'email' => 'required',
            'sex' => 'required',
            ]);

        $abonnes = new Abonne;

        $abonnes->nom = $request->input('nom');
        $abonnes->prenom = $request->input('prenom');
        $abonnes->numcarte = $request->input('numcarte');
        $abonnes->tel = $request->input('tel');
        $abonnes->email = $request->input('email');
        $abonnes->sex = $request->input('sex');

        $abonnes->save();
        
        return redirect('/listeabonne')->with('success','Data Saved');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function show(Abonne $abonne)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function edit(Abonne $abonne)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Abonne $abonne)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Abonne  $abonne
     * @return \Illuminate\Http\Response
     */
    public function destroy(int $id)
    {
        DB::table("abonnes")->delete($id);
    	Session::put('success', 'Your Record Deleted Successfully.');
        return redirect()->route('crud.listeabonne');
    }
    
}
