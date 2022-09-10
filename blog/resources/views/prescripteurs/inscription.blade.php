@extends('layouts.app')

@section('content')

    <div class="container shadow-lg col-6 p-0 mt-5">
        <div class="row m-0">
            <div class="card p-0">
                <div class="card-header text-center h4 p-3">
                    Inscription d'un prescripteur
                </div>
                <form action="{{route('inscrirePrescripteur')}}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="card-body">
                        <div class="row justify-content-center mb-5">

                            <div class="col-xxl-8 col-lg-8 col-md-8 col-sm-12">
                                <label for="exampleInputEmail1" class="form-label">Email</label>
                                <div class="input-group">
                                    <div class="input-group-text">@</div>
                                    <input type="text" class="form-control" name="email" id="" placeholder="exemple@xxxx.com" value="{{ old('email') }}" required>
                                </div>
                                @error('email')
                                    <span class="text-danger" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @endif
                            </div>

                            <div class="col-xxl-4 col-lg-4 col-md-4 col-sm-12">
                                <label for="exampleInputEmail1" class="form-label">Rôle</label>
                                <select class="form-select" name="profil" aria-label="Default select example" required>
                                    <option value="Admin">Administrateur</option>
                                    <option value="Prescripteur">Prescription</option>
                                </select>
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
