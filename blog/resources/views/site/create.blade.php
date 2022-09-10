@extends('layouts.app')

@section('content')
<div class="container shadow-lg mt-5 col-9 p-0">
    <div class="row m-0">
        <form action="{{ route('file-import') }}" method="POST" enctype="multipart/form-data">
        @csrf
            <div class="col-12 text-center mb-2 h4">
                <p class="mt-3">Ajoutez un site de prescription</p>
            </div>
            <hr/>
            <div class="row m-0 justify-content-between">    
                @csrf

                
                <div class="mb-5 mt-5 col-sm-12 col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <label for="" class="form-label">Région</label>
                    <select class="form-select" name="region" id="regions" onchange='retriveDistrict(this)'>
                        @foreach ($regions as $region)
                            <option value={{$region->id}}>{{$region->nom}}</option>
                        @endforeach
                    </select>
                </div>

                <div class="mb-5 mt-5 col-sm-12 col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <label for="numDistrict" class="form-label">District</label>
                    <select class="form-select" id="districts" name="numDistrict">
                        
                    </select>
                </div>
                <div class="mb-5 mt-5 col-sm-12 col-xxl-4 col-xl-4 col-lg-4 col-md-4">
                    <label for="" class="form-label">Nouveau site</label>
                    <input type="text" class="form-control" name="nomSite" id="">
                </div>
            </div>
            <div class="row m-0 justify-content-center p-3">
                <button class="shadow-sm btn btn-primary col-5">Créer le site</button>
            </div>
        </form>
    </div>
</div>

@endsection
