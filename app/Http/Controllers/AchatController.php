<?php

namespace App\Http\Controllers;

use App\Models\Achat;
use Illuminate\Http\Request;
use App\Http\Requests\StoreAchatRequest;
use App\Http\Requests\UpdateAchatRequest;

class AchatController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $achats = Achat::orderBy("created_at", "asc")->paginate(5);
        return view('liste', compact('achats'));
    }

    public function admin()
    {
        $achats = Achat::all();
        return view('admin', compact('achats'));
    }

    public function stats()
    {
        
        $nombre = Achat::sum("quantite");
        $achats = Achat::all();
        return view('stats', compact(array('nombre'), ('achats')));
    }

    public function search()
    {
        $search_text = $_GET['query'];
        // $search_text = Request::get('query');
        $achats = Achat::where('cathegory', 'like', '%'.$search_text.'%')->orderBy('id')->paginate(6);

        return view('search', compact('achats'));
    }

    public function searchdate()
    {
        $date_deb = $_GET['date1'];
        $date_fin = $_GET['date2'];

        $nombre = Achat::sum("quantite");

        // $search_text = $_GET['query'];
        $achats = Achat::whereBetween('created_at', [$date_deb, $date_fin])->get();

        return view('searchadmin', compact('achats'));
    }

    public function searchadmin()
    {
        $date_deb = $_GET['date1'];
        $date_fin = $_GET['date2'];

        $nombre = Achat::sum("quantite");

        // $search_text = $_GET['query'];
        $achats = Achat::whereBetween('created_at', [$date_deb, $date_fin])->get();

        return view('search_administrateur', compact(array('nombre'), ('achats')));
    }

   

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('creer');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreAchatRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request-> validate([
            'montant' => ['required'],
            'quantite' => ['required'],
            'cathegory' => ['required']
        ]);

        Achat::create([
            "montant"=>$request->montant,
            "quantite"=>$request->quantite,
            "cathegory"=>$request->cathegory
        ]);


        return redirect(route("station.creer"));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function show(Achat $achat)
    {
        $nombre = Achat::sum("id");

        return view("details", compact(array('achat', 'nombre')));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function edit(Achat $achat)
    {
        return view("editer", compact("achat"));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateAchatRequest  $request
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Achat $achat)
    {
        $validatedData = $request->validate([
            'montant' => 'required',
            'quantite' => 'required',
            
        ]);
        Achat::whereId($achat)->update($validatedData);

        return redirect('/liste');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Achat  $achat
     * @return \Illuminate\Http\Response
     */
    public function destroy($achat)
    {
        $achats = Achat::findOrFail($achat);
        $achats->delete();

        return redirect('/liste');
    }
}
