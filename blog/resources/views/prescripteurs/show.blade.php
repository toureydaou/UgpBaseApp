@extends('layouts.app')


@section('content')
    
<div class="container mt-5 col-xxl-4 col-xl-4 col-lg-5 col-md-6 col-sm-12 p-0">
    <div class="card shadow-lg mb-3">
        <img src="{{asset($prescripteur->avatar)}}" class="card-img-top" alt="photo de profil" style="height: 300px">
        <div class="card-body">

            <div class="row text-center mb-4 mt-2">
                <h4 class="card-title">{{$prescripteur->sexe}} {{$prescripteur->nom}} {{$prescripteur->prenom}}</h5>
            </div>

            <div class="row text-center m-0">

                <div class="col-6 p-2 border-end border-top border-bottom bg-secondary bg-opacity-10">
                    <p class="h6 fw-bold text-decoration-underline">Email</p>
                    {{$prescripteur->email}}
                </div>

                <div class="col-6 p-2 border-bottom border-top ">
                    <p class="h6 fw-bold">Téléphone</p>
                    +228 {{$prescripteur->telephone}}
                </div>

                <div class="col-6 p-2 border-end border-bottom ">
                    <p class="h6 fw-bold text-decoration-underline">Adresse</p>
                    {{$prescripteur->adresse}}
                </div>

                <div class="col-6 p-2 border-bottom bg-secondary bg-opacity-10">
                    <p class="h6 fw-bold text-decoration-underline">En activité</p>
                    @if($prescripteur->actif === true)
                        Oui
                    @else 
                        Non
                    @endif
                </div>

                <div class="col-6 p-2 border-bottom border-end bg-secondary bg-opacity-10">
                    <p class="h6 fw-bold text-decoration-underline">Date de prise de fonction</p>
                    {{$prescripteur->dateDebut}}
                </div>

                <div class="col-6 p-2 border-bottom">
                    <p class="h6 fw-bold text-decoration-underline">Date de cessation d'activités</p>
                    @if($prescripteur->dateFin === null)
                        Indéterminée
                    @else 
                        {{$prescripteur->dateFin}}
                    @endif
                </div>

                <div class="col-12 p-2 border-start border-end border-bottom ">
                    <p class="h6 fw-bold text-decoration-underline">Site de travail</p>
                    {{$prescripteur->site->nom}}
                </div>
            </div>
        </div>
    </div>
</div>





























@endsection