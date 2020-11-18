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
 
<br>
<div class="container">
    <div class="card">
        <h6 class="card-header">Details de bon de livraison, REF :: {{ $bls->ref_BL }} pour {{ $client['0']->prenom }} {{ $client['0']->nom }}</h6>
        <div class="card-body">
            <div class="table-responsive">
                <table class="table table-striped table-bordred" id="table">
                    <thead class="table-dark">
                        <td> Date BL         </td>
                        <td> Produit         </td>
                        <td> Quantité        </td>
                        <td> Prix            </td>
                        <td> Montant HT (DH) </td>
                        <td> TVA (%)         </td>
                        <td> Montant TVA (DH)</td>
                        <td> Montant TTC (DH)</td>  
                    </thead>
                    <tbody>
                        @foreach($dbls as $dbl)
                        <tr>
                            <td> {{ $dbl->date_BL     }} </td>
                            <td> {{ $dbl->produit     }} </td>
                            <td> {{ $dbl->quantite    }} </td>
                            <td> {{ $dbl->prix        }} DH</td>
                            <td> {{ $dbl->montant_HT  }} DH</td>
                            <td> {{ $dbl->tva         }}%</td>
                            <td> {{ $dbl->montant_TVA }} DH</td>
                            <td> {{ $dbl->montant_TTC }} DH</td>
                        </tr>
                        @endforeach
                        <tr class="table-info">
                            <td></td>
                            <td></td>
                            <td class="text-right" colspan="2"><b>Totale:</b></td>
                            <td> {{ $bls->total_HT }} DH </td>
                            <td></td> 
                            <td> {{ $bls->total_TVA }} DH</td>
                            <td> {{ $bls->total_TTC }} DH</td>
                        </tr>
                    </tbody>
                </table>
            </div>    
        </div> 
        <div class="card-footer">
            <a href="/dbl/imprimer/{{ $bls->id }}" class="btn btn-secondary btn-sm">
            <i class="fa fa-print"></i> Imprimer</a>

            <a href="/bls" class="btn btn-warning btn-sm">
            <i class="fa fa-bars" ></i> Toutes les BL</a> 

            <a href="/bl/modifier/{{ $bls->id }}" class="btn btn-success btn-sm">
            <i class="fa fa-edit"></i> Modifier</a>

            <a href="/bl/supprimer/{{ $bls->id }}" class="btn btn-danger btn-sm delete">
            <i class="fa fa-trash-o delete"></i> Supprimer</a> 
        </div>
    </div> 
</div>
 
</body>
</html>