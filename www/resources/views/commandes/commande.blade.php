@extends('layout.layout')
@section('content')
`<div class="container my-5">
    <div class="row">
        <div class="col-md-6"><h2>Liste des commandes</h2></div>
        <div class="col-md-6 d-flex justify-content-end">
            <button type="button" class="btn btn-warning text-white">
                <a href="{{route('commande.saveCommande')}}" class="text-white">
                    <svg xmlns="http://www.w3.org/2000/svg" width="22" height="22" fill="currentColor" class="bi bi-cart-plus text-white" viewBox="0 0 16 16">
                        <path d="M9 5.5a.5.5 0 0 0-1 0V7H6.5a.5.5 0 0 0 0 1H8v1.5a.5.5 0 0 0 1 0V8h1.5a.5.5 0 0 0 0-1H9V5.5z"/>
                        <path d="M.5 1a.5.5 0 0 0 0 1h1.11l.401 1.607 1.498 7.985A.5.5 0 0 0 4 12h1a2 2 0 1 0 0 4 2 2 0 0 0 0-4h7a2 2 0 1 0 0 4 2 2 0 0 0 0-4h1a.5.5 0 0 0 .491-.408l1.5-8A.5.5 0 0 0 14.5 3H2.89l-.405-1.621A.5.5 0 0 0 2 1H.5zm3.915 10L3.102 4h10.796l-1.313 7h-8.17zM6 14a1 1 0 1 1-2 0 1 1 0 0 1 2 0zm7 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0z"/>
                    </svg>Update Commande</a>
            </button>

        </div>
    </div>
    <table class="table" data-toggle="table" data-search="true" data-show-columns="true" data-pagination="true">
        <thead class="">
        <tr>
            <th scope="col" data-sortable="true">NumCommande</th>
            <th scope="col">Fournisseur</th>
            <th scope="col">TotalHT</th>
            <th scope="col">TotalTTC</th>
            <th scope="col">DateModif</th>
            <th scope="col">DateModif</th>
            <th scope="col">Action</th>
        </tr>
        </thead>
        <tbody>
        @foreach($commandes as $cdef)
            <tr>
                <th scope="row">{{$cdef->NumCommande}}</th>
                <th scope="row">{{$cdef->Nom}}</th>
                <th scope="row">{{$cdef->TotalHT}}</th>
                <th scope="row">{{$cdef->TotalTTC}}</th>
                <th scope="row">{{date('d/m/Y',strtotime($cdef->DateModif))}}</th>
                <th scope="row">
                    <a href="{{route('commande.show',['id'=>$cdef->NumCommande])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-eye text-info" viewBox="0 0 16 16">
                            <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                            <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                        </svg>
                    </a>
                </th>
                <th scope="row">
                    <a href="{{route('commande.show',['id'=>$cdef->NumCommande])}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-pencil-square text-warning" viewBox="0 0 16 16">
                            <path d="M15.502 1.94a.5.5 0 0 1 0 .706L14.459 3.69l-2-2L13.502.646a.5.5 0 0 1 .707 0l1.293 1.293zm-1.75 2.456-2-2L4.939 9.21a.5.5 0 0 0-.121.196l-.805 2.414a.25.25 0 0 0 .316.316l2.414-.805a.5.5 0 0 0 .196-.12l6.813-6.814z"/>
                            <path fill-rule="evenodd" d="M1 13.5A1.5 1.5 0 0 0 2.5 15h11a1.5 1.5 0 0 0 1.5-1.5v-6a.5.5 0 0 0-1 0v6a.5.5 0 0 1-.5.5h-11a.5.5 0 0 1-.5-.5v-11a.5.5 0 0 1 .5-.5H9a.5.5 0 0 0 0-1H2.5A1.5 1.5 0 0 0 1 2.5v11z"/>
                        </svg>
                    </a>
                </th>
            </tr>
        @endforeach
        </tbody>
    </table>
    <div>
@endsection
