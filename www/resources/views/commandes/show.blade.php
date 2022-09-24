@extends('layout.layout')
@section('content')
    `<div class="container my-5">
        <h2 class="text-center">Detail commandes</h2>
        <table class="table" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true">
            <thead class="">
            <tr>
                <th scope="col" data-sortable="true">Produit</th>
                <th scope="col">Quantite</th>
                <th scope="col">Remise</th>
                <th scope="col">QuantiteLivree</th>
                <th scope="col">PrixAchat</th>
                <th scope="col">Quantite Stock</th>
            </tr>
            </thead>
            <tbody>
            @foreach($ligneCommandes as $produit)
                <tr>
                    <th scope="row">{{$produit->LibProd}}</th>
                    <th scope="row">{{$produit->Quantite}}</th>
                    <th scope="row">{{$produit->Remise}}</th>
                    <th scope="row">{{$produit->Qte_Livree}}</th>
                    <th scope="row">{{$produit->prix_achat}}</th>
                    <th scope="row">{{$produit->QTE_STOCK}}</th>
                </tr>
            @endforeach
            </tbody>
        </table>
        <div>
@endsection
