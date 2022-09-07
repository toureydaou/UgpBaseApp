@extends('layouts.app')



@section('content')

<div class="container mt-5 border shadow-lg">
    <div class="row justify-content-center h2 mt-5 mb-5">
        Liste des sites de prescriptions
    </div>
    <hr/>
    <div class="row table-responsive p-3">
        <table id="example" class="table table-hover" style="width:100%">
            <thead class="mt-5">
                <tr>
                    <th class="text-center">Region</th>
                    <th class="text-center">District</th>
                    <th class="text-center">Nom du site</th>
                    <th class="text-center">Nombre total de prescripteurs</th>
                    <th class="text-center">Nombre total de prescripteurs actifs</th>
                    <th class="text-center">Nombre total de prescripteurs inactifs</th>
                </tr>
            </thead>
            <tbody>
                @foreach($sites as $site)
                <tr class="table-secondary">
                    <td class="text-center">{{$site->district->region->nom}}</td>
                    <td class="text-center">{{$site->district->nom}}</td>
                    <td class="text-center">{{$site->nom}}</td>
                    <td class="text-center">
                        @php
                            $nbre=nbrePrescripteursSite($site->id);
                            echo $nbre
                        @endphp
                    </td>
                    <td class="text-center">
                        @php
                            $nbre=nbrePrescripteursActifsSite($site->id);
                            echo $nbre
                        @endphp
                    </td>
                    <td class="text-center">
                        @php
                            $nbre= nbrePrescripteursSite($site->id) - nbrePrescripteursActifsSite($site->id);
                            echo $nbre
                        @endphp
                    </td>
                </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <th class="text-center">Region</th>
                    <th class="text-center">District</th>
                    <th class="text-center">Nom du site</th>
                    <th class="text-center">Nombre total de prescripteurs</th>
                    <th class="text-center">Nombre de prescripteurs actifs</th>
                    <th class="text-center">Nombre de prescripteurs inactifs</th>
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

@endsection