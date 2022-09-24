@extends('layout.layout')
@section('content')
<div class="container my-5">
    <h2>Historique des Entrees Stock</h2>
    <table class="table" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true">
        <thead class="">
        <tr>
            <th scope="col" data-sortable="true">ID</th>
            <th scope="col" data-field="libelleProduit">Libelle Produit</th>
            <th scope="col" data-field="dateMvt">Date Mvt</th>
            <th scope="col" data-field="quantite">Quantite</th>
            <th scope="col" data-field="observation">Observations</th>
            <th scope="col" data-field="entree">Entree</th>
            <th scope="col" data-field="typeMvt">type_mvt</th>
            <th scope="col" data-field="montant">montant</th>
            <th scope="col" data-field="prixVente">PrixVente</th>
            <th scope="col" data-field="prixAchat">PrixAchat</th>
        </tr>
        </thead>
        <tbody>
        @foreach($mouvements as $mvt)
            <tr>
                <th scope="row">{{$mvt->MVTCLEUNIK}}</th>
                <th scope="row">{{$mvt->LibProd}}</th>
                <th scope="row">{{date('d/m/Y',strtotime($mvt->date_mvt))}}</th>
                <th scope="row">{{$mvt->Quantite}}</th>
                <th scope="row">{{$mvt->Observations}}</th>
                <th scope="row">{{$mvt->entree}}</th>
                <th scope="row">{{$mvt->type_mvt}}</th>
                <th scope="row">{{$mvt->montant}}</th>
                <th scope="row">{{$mvt->PrixVente}}</th>
                <th scope="row">{{$mvt->PrixAchat}}</th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
@endsection

