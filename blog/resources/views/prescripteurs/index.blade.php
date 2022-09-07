@include('layouts.app')

    <div class="container border mt-5 shadow-lg">
        <div class="row justify-content-center h2 mt-5 mb-5">
            Liste des prescripteurs
        </div>
        <hr/>
        <div class="row table-responsive p-3">
            <table id="example" class="table table-hover" style="width:100%">
                <thead class="mt-5">
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Téléphone</th>
                        <th class="text-center">Région d'exercice</th>
                        <th class="text-center">District</th>
                        <th class="text-center">Site de travail</th>
                        <th class="text-center">Date de début de fonction</th>
                        <th class="text-center">Date de fin de fonction</th>
                        <th class="text-center">Actif</th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescripteurs as $prescripteur)
                    @if($prescripteur->nom != null)
                    <tr @if ($prescripteur->actif === true) class="table-light" @else class="table-secondary" @endif >
                        <td class="text-center">{{$prescripteur->nom}}</td>
                        <td class="text-center">{{$prescripteur->prenom}}</td>
                        <td class="text-center">{{$prescripteur->telephone}}</td>
                        <td class="text-center">@if($prescripteur->site === null) Non affecté @else {{$prescripteur->site->district->region->nom}} @endif</td>
                        <td class="text-center">@if($prescripteur->site === null) Non affecté @else {{$prescripteur->site->district->nom}} @endif</td>
                        <td class="text-center">@if($prescripteur->site === null) Non affecté @else {{$prescripteur->site->nom}} @endif</td>
                        <td class="text-center">{{$prescripteur->dateDebut}}</td>
                        <td class="text-center">
                            @if($prescripteur->dateFin === null)
                                Indéterminée
                            @else 
                            {{$prescripteur->dateFin}}
                            @endif
                        </td>
                        <td class="text-center">
                            @if ($prescripteur->actif === true)
                                Oui
                            @else
                                Non
                            @endif
                        </td>

                        <td class="text-center">
                            <form action="{{route('prescripteur.show', $prescripteur->id)}}" method="get">
                                @csrf
                                <button type="submit" class="btn btn-primary" value="">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-eye" viewBox="0 0 16 16">
                                        <path d="M16 8s-3-5.5-8-5.5S0 8 0 8s3 5.5 8 5.5S16 8 16 8zM1.173 8a13.133 13.133 0 0 1 1.66-2.043C4.12 4.668 5.88 3.5 8 3.5c2.12 0 3.879 1.168 5.168 2.457A13.133 13.133 0 0 1 14.828 8c-.058.087-.122.183-.195.288-.335.48-.83 1.12-1.465 1.755C11.879 11.332 10.119 12.5 8 12.5c-2.12 0-3.879-1.168-5.168-2.457A13.134 13.134 0 0 1 1.172 8z"/>
                                        <path d="M8 5.5a2.5 2.5 0 1 0 0 5 2.5 2.5 0 0 0 0-5zM4.5 8a3.5 3.5 0 1 1 7 0 3.5 3.5 0 0 1-7 0z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>

                        @if ($prescripteur->actif === true)
                        <td class="text-center">
                            <form action="{{route('prescripteur.destroy', $prescripteur->id)}}" method="post" onsubmit="return Confirmation()" >
                                @csrf
                                <button type="submit" class="btn btn-danger" name="activation" value="false">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-x" viewBox="0 0 16 16">
                                        <path d="M4.646 4.646a.5.5 0 0 1 .708 0L8 7.293l2.646-2.647a.5.5 0 0 1 .708.708L8.707 8l2.647 2.646a.5.5 0 0 1-.708.708L8 8.707l-2.646 2.647a.5.5 0 0 1-.708-.708L7.293 8 4.646 5.354a.5.5 0 0 1 0-.708z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        @else
                        <td class="text-center">
                            <form action="{{route('prescripteur.destroy', $prescripteur->id)}}" method="post" onsubmit="return Confirmation2()" >
                                @csrf
                                <button type="submit" class="btn btn-success" name="activation" value="true">
                                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-check" viewBox="0 0 16 16">
                                        <path d="M10.97 4.97a.75.75 0 0 1 1.07 1.05l-3.99 4.99a.75.75 0 0 1-1.08.02L4.324 8.384a.75.75 0 1 1 1.06-1.06l2.094 2.093 3.473-4.425a.267.267 0 0 1 .02-.022z"/>
                                    </svg>
                                </button>
                            </form>
                        </td>
                        @endif

                        
                    </tr>
                    @endif
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th class="text-center">Nom</th>
                        <th class="text-center">Prénom</th>
                        <th class="text-center">Téléphone</th>
                        <th class="text-center">Région d'exercice</th>
                        <th class="text-center">District</th>
                        <th class="text-center">Site de travail</th>
                        <th class="text-center">Date de début de fonction</th>
                        <th class="text-center">Date de fin de fonction</th>
                        <th class="text-center">Actif</th>
                        <th></th>
                        <th></th>
                    </tr>
                </tfoot>
            </table> 
        </div>
    </div>
      

    <script>
        function Confirmation() {
            return  confirm("Déactiver le prescripteur ?")
        }

        function Confirmation2() {
            return  confirm("Activer le prescripteur ?")
        }

        $(document).ready(function(){
            var table = $('#example').DataTable({
                buttons:['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        })
    </script>