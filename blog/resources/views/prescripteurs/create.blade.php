@extends('layouts.app')

@section('content')

<div class="container shadow-lg mb-5 p-0 mt-5">
    <div class="row m-0">
        <div class="card p-0">
            <div class="card-header text-center h4 p-3">
                Mes informations
            </div>
            <form action="{{route('enregistrementPrescripteur')}}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="card-body">
                    <div class="row justify-content-between mt-5 mb-5">
                        <div class="col-xxl-2 col-lg-2 col-md-2 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Dénomination</label>
                            <select class="form-select" name="sexe" aria-label="Default select example" required>
                                <option value="Mr">Mr</option>
                                <option value="Mme">Mme</option>
                                <option value="Mlle">Mlle</option>
                            </select>
                        </div>
                        <div class="col-xxl-5 col-lg-5 col-md-5 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Nom du prescripteur</label>
                            <input type="text" name="nom" class="form-control" value="{{$prescripteur->nom}}" required>
                            @error('nom')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class="col-xxl-5 col-lg-5 col-md-5 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Prenom du prescripteur</label>
                            <input type="text" name="prenom" class="form-control" value="{{$prescripteur->prenom}}" required>
                            @error('prenom')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
                        </div>
                    </div>

                    <div class="row justify-content-between mb-5">

                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Email</label>
                            <div class="input-group">
                                <div class="input-group-text">@</div>
                                <input type="read" class="form-control" name="email" id="" placeholder="exemple@xxxx.com" value="{{ Auth::user()->email }}" disabled="true" required>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xxl-5 col-lg-5 col-md-4 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Adresse</label>
                            <input type="text" name="adresse" class="form-control" value="{{$prescripteur->adresse}}">
                            <div>
                                @error('adresse')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="col-xxl-3 col-lg-3 col-md-4 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Téléphone</label>
                            <div class="input-group">
                                <div class="input-group-text">+228</div>
                                <input type="text" class="form-control" name="telephone" id="" placeholder="ex : 91234567" value="{{$prescripteur->telephone}}" required pattern="((9[0-36-9])|(7[019])|(2[1-7]))[0-9]{6}">
                            </div>
                        </div>

                    </div>

                    <div class="row mt-3 mb-5">

                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Site de prescription</label>
                            <select class="form-select" name="numSite" aria-label="Default select example" required>
                                @if($prescripteur->site === null)
                                    <option value="">Choisissez votre site de prescription</option>
                                @else
                                    <option value="{{$prescripteur->site->id}}">{{$prescripteur->site->nom}}</option>
                                @endif
                                @foreach ($sites as $site)
                                    @if ($site != $prescripteur->site)
                                    <option value={{$site->id}}>{{$site->nom}}</option>
                                    @endif
                                @endforeach
                            </select>
                        </div>

                        <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                            <label for="exampleInputEmail1" class="form-label">Date de prise de fonction</label>
                            <div class="input-group">
                                <div class="input-group-text">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-calendar3" viewBox="0 0 16 16">
                                        <path d="M14 0H2a2 2 0 0 0-2 2v12a2 2 0 0 0 2 2h12a2 2 0 0 0 2-2V2a2 2 0 0 0-2-2zM1 3.857C1 3.384 1.448 3 2 3h12c.552 0 1 .384 1 .857v10.286c0 .473-.448.857-1 .857H2c-.552 0-1-.384-1-.857V3.857z"/>
                                        <path d="M6.5 7a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm-9 3a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2zm3 0a1 1 0 1 0 0-2 1 1 0 0 0 0 2z"/>
                                    </svg>
                                </div>
                                <input type="date" class="form-control" name="dateDebut" id="" value="{{$prescripteur->dateDebut}}" required><br>
                            </div>
                            @error('dateDebut')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
                        </div>

                    </div>

                    <div class="row justify-content-between mt-3 mb-5">
                        <div class="col-xxl-6 col-lg-4 col-md-6 col-sm-12">
                            <label class="mb-2">Photo du prescripteur</label>
                            <input type="file" value="{{ old('avatar') }}" name="avatar" accept=".jpg, .jpeg, .png" onchange="previewPicture(this)"/>
                            <p>Format acceptés : .jpg, .jpeg, .png</p>
                            @error('image')
                                <span class="text-danger" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @endif
                        </div>
                        <div class=" col-xxl-6 col-lg-8 col-md-6 col-sm-12">
                            <img src="#" alt="" id="image" class="img-thumbnail float-end" style="max-width: 200px;"/>
                        </div>
                    </div>

                </div>

                <div class="card-footer ">
                    <div class="row m-0 justify-content-center">
                        <button class="btn bg-primary text-white col-md-4" type="submit">{{__('Enregistrer')}}</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    var image = document.getElementById("image");
    var types = ["image/jpg", "image/jpeg", "image/png"];
    var previewPicture = function (e) {
        const [picture] = e.files
        if (types.includes(picture.type)){
            image.src = URL.createObjectURL(picture);
        }
    }
</script>

@endsection
