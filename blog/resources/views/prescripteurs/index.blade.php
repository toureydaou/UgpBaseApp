@include('layouts.app')

    <div class="container border rounded shadow-lg bg-secondary bg-opacity-10">
        <div class="row justify-content-center h2 mt-5 mb-5">
            Liste des prescripteurs
        </div>
        <hr/>
        <div class="row p-3">
            <table id="example" class="table table-hover" style="width:100%">
                <thead class="mt-2">
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Site de travail</th>
                        <th>Date de début de fonction</th>
                        <th>Date de fin de fonction</th>
                        <th>Actif</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($prescripteurs as $prescripteur)
                    <tr @if ($prescripteur->actif === true)
                            class="table-secondary"
                        @else
                            class="table-light"
                        @endif
                    >
                        <td>{{$prescripteur->nom}}</td>
                        <td>{{$prescripteur->prenom}}</td>
                        <td>{{$prescripteur->telephone}}</td>
                        <td>{{$prescripteur->site}}</td>
                        <td>{{$prescripteur->dateDebut}}</td>
                        <td>{{$prescripteur->dateFin}}</td>
                        <td>
                            @if ($prescripteur->actif === true)
                                Oui
                            @else
                                Non
                            @endif
                        </td>
                        <td>
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
                    </tr>
                    @endforeach
                </tbody>
                <tfoot>
                    <tr>
                        <th>Nom</th>
                        <th>Prénom</th>
                        <th>Téléphone</th>
                        <th>Site de travail</th>
                        <th>Date de début de fonction</th>
                        <th>Date de fin de fonction</th>
                        <th>Actif</th>
                        <th></th>
                    </tr>
                </tfoot>
            </table> 
        </div>
    </div>
      


    <script>
        $(document).ready(function(){
            var table = $('#example').DataTable({
                buttons:['copy', 'csv', 'excel', 'pdf', 'print', 'colvis']
            });

            table.buttons().container().appendTo('#example_wrapper .col-md-6:eq(0)');
        })
    </script>
