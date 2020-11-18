<!DOCTYPE html>
<html>
<head>
    @include('components.libraries')
</head>
<body>
<!-- Nav Bar-->
    @include('components.navbar')
<!-- End Nav Bar-->
<br>
@if (session('status'))
    <div class="alert-success container alert">
        <div class=" col-md-12">
            {{ session('status') }}
        </div>
    </div>
@endif
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <div>
                <h4>Gestion des clients</h4>
                <h5>Liste Des Clients</h5> 
                <div class="text-right">
                    <a class="btn btn-info btn-ms" href="/client/ajouter">
                    <i class="fa fa-plus"></i> Ajouter un nouveau client</a>
                </div>
            </div>
        </div>
        <div class="card-body"> 
            <div class="col-md-12">
                <div class="table-responsive">
                        <table class="table table-bordred table-striped">
                        <thead class="thead-dark">
                            <th>Nom</th>
                            <th>Prenom</th>
                            <th>Tel</th>
                            <th>Email</th>
                            <th>Action</th>
                        </thead>
                        <tbody>
                            @foreach($clients as $client)
                                <tr>
                                <td>{{ $client->nom }}</td>
                                <td>{{ $client->prenom }}</td>
                                <td>{{ $client->tel }}</td>
                                <td>{{ $client->email }}</td>
                                <td>
                                    <a class="btn btn-primary btn-sm" href="/bl/ajouter">
                                        <i class="fa fa-folder-plus"></i> Ajouter BL
                                    </a>
                                    <a class="btn btn-success btn-sm" href="/client/modifier/{{ $client->id }}">
                                        <i class="fa fa-pencil-square-o"></i> Modifier
                                    </a>
                                    <a class="btn btn-danger btn-sm" href="/client/supprimer/{{ $client->id }}">
                                        <i class="fa fa-trash-o delete"></i> 
                                    </a>
                                </td>
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div> 
        </div>
    </div> 
</div>

</body>
</html>