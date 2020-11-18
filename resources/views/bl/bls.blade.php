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
            <h4>Gestion Des Bons De Livraison</h4>
            <h5>Listes des bons</h5>
        </div>
        <div class="card-body"> 
            <div class="col-md-12"> 
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-striped" id="table">
                        <thead class="thead-dark">
                            <th> Date BL   </th>
                            <th> REF BL    </th>
                            <th> Client    </th>  
                            <th> TOTAL HT (DH)</th>  
                            <th> TOTAL TVA (DH)</th>  
                            <th> TOTAL TTC (DH)</th> 
                            <th> Action    </th> 
                        </thead>
                        <tbody>
                            @foreach($bls as $bl)
                            <tr>
                                <td> {{ $bl->date_BL    }}                </td>
                                <td> {{ $bl->ref_BL     }}                </td>   
                                <td> {{ $bl->prenom  }} {{ $bl->nom  }}   </td> 
                                <td> {{ $bl->total_HT   }}              DH</td> 
                                <td> {{ $bl->total_TVA  }}              DH</td> 
                                <td> {{ $bl->total_TTC  }}              DH</td>  
                                <td> 
                                    <a href="/dbl/imprimer/{{$bl->id}}" class="btn btn-secondary btn-sm">
                                    <i class="fa fa-print" data-toggle="tooltip" title="Imprimer"></i></a>
                                    <a href="/dbl/details/{{$bl->id}}" class="btn btn-info btn-sm">
                                    <i class="fa fa-info-circle"> </i> Details</a>
                                    <a href="/bl/modifier/{{$bl->id}}" class="btn btn-success btn-sm">
                                    <i class="fa fa-pencil-square-o"></i> Modifier</a>
                                    <a href="/bl/supprimer/{{$bl->id}}" class="btn btn-danger btn-sm">
                                    <i class="fa fa-trash-o delete"></i></a>
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