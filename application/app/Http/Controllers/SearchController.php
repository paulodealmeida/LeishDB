<?php

namespace App\Http\Controllers;

use App\Models\Crossreference;
use App\Models\Gene;
use App\Models\Ncrna;

class SearchController extends Controller
{

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $request = request('term');

        $genes = Gene::with('protein')->get();

        if ($request != null) {
            $genes->where('protein_name', 'LIKE', "%$request%")
//                    ->orWhere('protein_id', 'LIKE', "%$request%")
//                    ->orWhere('id', 'LIKE', "%$request%")
//                    ->orWhere('protein.gene_name', 'LIKE', "%$request%")
                    ->where('protein_id', '<>', '');
        }

        return view('search.index', compact('genes'));
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $_searchId
     * @return \Illuminate\Http\Response
     */
    public function show($_searchId)
    {
        $gene = Gene::with('protein')->find($_searchId);
        
        if ($gene) {
            return view('search.show', compact('gene'));
        } else {
            return redirect()->route('search.index')
                            ->with('err', 'Não encontrado!')
                            ->withInput();
        }
    }

}
