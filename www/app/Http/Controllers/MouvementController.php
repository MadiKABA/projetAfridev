<?php

namespace App\Http\Controllers;

use App\Models\Mouvement;
use Illuminate\Http\Request;
use DB;
class MouvementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $mouvements=Mouvement::getALL();
        return view('mouvements.list',compact('mouvements'));
    }

    public function getByReference()
    {
        $ref="ref1";
        dd($ref);
        $mouvements=Mouvement::getByReference($ref);
        //dd($mouvements);
        return view('welcome',compact('mouvements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function show(Mouvement $mouvement)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Mouvement $mouvement)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Mouvement  $mouvement
     * @return \Illuminate\Http\Response
     */
    public function destroy(Mouvement $mouvement)
    {
        //
    }
}
