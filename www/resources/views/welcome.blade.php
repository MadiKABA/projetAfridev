@extends('layout.layout')
@section('content')
    <h1>Bonjour </h1>
    <div class="container my-2">
        <div class="d-flex justify-content-center">
            <a style="color:#4ecdc4" class="btn fw-bold fs-4" href="http://127.0.0.1:8000/">All</a>
            <a style="color:#4ecdc4" class="btn fw-bold fs-4" href="{{route('Mouvement.add')}}}" >Add</a>
            @foreach($references as $reference)
                <a style="color:#4ecdc4" class="btn fw-bold fs-4" href="{{route('historique.getByReference',['ref'=>$reference->ref_mvt])}}">{{$reference->ref_mvt}}</a>
            @endforeach
        </div>
        <table class="table">
            <thead class="">
            <tr>
                <th scope="col">Libelle Produit</th>
                <th scope="col">Date Mvt</th>
                <th scope="col">Quantite</th>
                <th scope="col">Observations</th>
                <th scope="col">Entree</th>
                <th scope="col">type_mvt</th>
                <th scope="col">montant</th>
                <th scope="col">pmp</th>
                <th scope="col">PrixVente</th>
                <th scope="col">PrixAchat</th>
            </tr>
            </thead>
            <tbody>
            @foreach($mouvements as $mvt)
                <tr>
                    <th scope="row">{{$mvt->LibProd}}</th>
                    <th scope="row">{{date('d/m/Y',strtotime($mvt->date_mvt))}}</th>
                    <th scope="row">{{$mvt->Quantite}}</th>
                    <th scope="row">{{$mvt->Observations}}</th>
                    <th scope="row">{{$mvt->entree}}</th>
                    <th scope="row">{{$mvt->type_mvt}}</th>
                    <th scope="row">{{$mvt->montant}}</th>
                    <th scope="row">{{$mvt->pmp}}</th>
                    <th scope="row">{{$mvt->PrixVente}}</th>
                    <th scope="row">{{$mvt->PrixAchat}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
