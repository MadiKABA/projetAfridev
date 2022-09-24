<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use App\Models\Mouvement;
class HistoriqueController extends Controller
{
    public function index()
    {
        $references=Mouvement::getReferemce();
        $mouvements=Mouvement::getALL();
        return view('welcome',compact('references','mouvements'));
    }
    public function add(){
        $response = Http::get(env('URL_API_ECOMMANDE').'/getNewStock/20.json');
        $valeur=$response->object();
        /*var_dump($valeur);
        dd($valeur);
        /*foreach ($valeur[0] as $value)
        {
            dd($value['produit']['id']);
        }*/
        $date_mvt = date('YmdHms',strtotime(NOW()));
        //dd($date_mvt);
        Mouvement::add($valeur[0]);



    }
    public function getByReference($ref){

        $mouvements=Mouvement::getByReference($ref);
        $references=Mouvement::getReferemce();
        return view('welcome',compact('mouvements','references'));
    }
}
