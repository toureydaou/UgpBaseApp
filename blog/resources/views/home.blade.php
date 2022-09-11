@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-between">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h2 ms-2 mb-0 text-gray-800">Tableau de bord</h1>
        </div>

        @if($user->actif === false)
        <div class="row justify-content-center">
            <div class="ms-5 me-5 alert-dismissible fade show alert alert-danger d-flex align-items-center" role="alert">
                <svg xmlns="http://www.w3.org/2000/svg" width="28" height="28" fill="currentColor" class="bi bi-exclamation-triangle-fill" viewBox="0 0 16 16">
                    <path d="M8.982 1.566a1.13 1.13 0 0 0-1.96 0L.165 13.233c-.457.778.091 1.767.98 1.767h13.713c.889 0 1.438-.99.98-1.767L8.982 1.566zM8 5c.535 0 .954.462.9.995l-.35 3.507a.552.552 0 0 1-1.1 0L7.1 5.995A.905.905 0 0 1 8 5zm.002 6a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                </svg>
                <div class="ms-2">
                    Désolé votre compte à été désactivé, contactez l'administrateur pour plus d'informations
                </div>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
        </div>
        @endif

        @if(Auth::user()->profil === 'Prescripteur')
        <div class="row align-items-md-stretch">
            <div class="col-md-6">
                <div
                    class="h-100 p-5 text-white bg-primary border rounded-3">
                    <h2>Bienvenue sur la plateforme du PMLS/FM</h2>
                    <p>Vous êtes enregistré en-tant que prescripteur pour contribuer à la lutte contre le SIDA, le paludisme et la tuberculose.</p>
                </div>
            </div>
            <div class="col-md-6">
                <div
                    class="h-100 p-5 bg-primary border rounded-3">
                    <h2>Add borders</h2>
                    <p>Or, keep it light and add a border for some added definition to the boundaries of your content. Be sure
                        to look under the hood at the source HTML here as we've adjusted the alignment and sizing of both
                        column's content for equal-height.</p>
                    <button class="btn Swap the background-color utility and add a `.text-*` color utility to mix up the jumbotron look. Then,
                        mix and match with additional component themes and more." type="button">Example button</button>
                </div>
            </div>
        </div>

        @endif



        
        @if(Auth::user()->profil === 'Admin')
        <!-- Content Row -->
        <div class="row m-2">
    
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card bg-primary border-3 shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-white text-uppercase mb-1">
                                    <p class="fw-bold h6">Nombre total de prescripteurs</p></div>
                                <div class="h4 mb-0 fw-bold mt-3 text-white">{{$nbreTotal ?? ''}} prescripteurs</div>
                            </div>
                            <div class="col-auto">
                                <p class="h1 mt-3"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card bg-danger border-3 shadow h-100 py-2">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-white text-uppercase mb-1">
                                    <p class="fw-bold h6">Nombre de prescripteurs actifs</p></div>
                                <div class="h4 mb-0 fw-bold mt-3 text-white">{{$nbreActifs ?? ''}} prescripteurs</div>
                            </div>
                            <div class="col-auto">
                                <p class="h1"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    
            <!-- Earnings (Monthly) Card Example -->
            <div class="col-xl-4 col-md-6 mb-4">
                <div class="card border-3 border-3 shadow h-100 py-2" style="background-color: blueviolet">
                    <div class="card-body">
                        <div class="row no-gutters align-items-center">
                            <div class="col mr-2">
                                <div class="text-white text-uppercase mb-1">
                                    <p class="fw-bold h6">Nombre de prescripteurs en inactivitée</p></div>
                                <div class="h4 mb-0 fw-bold mt-3 text-white">{{$nbreInactifs ?? ''}} prescripteurs</div>
                            </div>
                            <div class="col-auto">
                                <p class="h1 mt-4"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @endif

    </div>
</div>
@endsection
