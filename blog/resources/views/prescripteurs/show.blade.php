@extends('layouts.app')


@section('content')
    
<div class="container col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-12 p-0">
    <div class="card shadow-lg mb-3">
        <img src="{{asset('storage/profils/malikpernon.png')}}" class="card-img-top" alt="..." style="height: 300px">
        <div class="card-body">
            <div class="row text-center mb-4 mt-2">
                <h4 class="card-title">Nom du prescripteur</h5>
            </div>
            <div class="row text-center m-0">
                <div class="col-6 p-2 border-end border-top border-bottom bg-secondary bg-opacity-10">
                    <p class="h6 fw-bold text-decoration-underline">Email</p>
                    ttoureydaou@gmail.com
                </div>
                <div class="col-6 p-2 border-bottom border-top ">
                    <p class="h6 fw-bold">Téléphone</p>
                    +228 93958475
                </div>
                <div class="col-6 p-2 border-end border-bottom ">
                    <p class="h6 fw-bold text-decoration-underline">Adresse</p>
                    Lomé devant la boulangerie Akpan City
                </div>
                <div class="col-6 p-2 border-bottom bg-secondary bg-opacity-10">
                    <p class="h6 fw-bold text-decoration-underline">Rôle</p>
                    Administrateur
                </div>
                <div class="col-6 p-2 border-end border-bottom bg-secondary bg-opacity-10 ">
                    <p class="h6 fw-bold text-decoration-underline">Statut</p>
                    Actif
                </div>
                <div class="col-6 p-2 border-bottom">
                    <p class="h6 fw-bold text-decoration-underline">Formation</p>
                    Agent de santé
                </div>
                <div class="col-6 p-2 border-end border-bottom ">
                    <p class="h6 fw-bold text-decoration-underline">Date de prise de fonction</p>
                    10/05/2022
                </div>
                <div class="col-6 p-2 border-bottom bg-secondary bg-opacity-10">
                    <p class="h6 fw-bold text-decoration-underline">Date de cessation d'activités</p>
                    11/06/2024
                </div>
                <div class="col-12 p-2 border-end border-start border-bottom ">
                    <p class="h6 fw-bold text-decoration-underline">Site de travail</p>
                    Lomé Agbalpedo
                </div>
            </div>
        </div>
    </div>
</div>





























@endsection