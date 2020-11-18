<!DOCTYPE html>
<html>
<head>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-12">
            <div class="card">
                <div class="card-body p-0">
                    <div class="row p-5">
                        <div class="col-md-6">
                            <img src="http://www.greentelemesure.com/images/logo.png">
                            <div class="text-left">
                                <p class="mb-1">N°2, Lot. B1053, Z.I, BP.784 Agadir	Ait Melloul	86150, Maroc</p>
                                <p class="mb-1">Tel   : +212 (0) 5 28 243 543</p>
                                <p class="mb-1">Fax   : +212 (0) 5 28 308 715</p>
                                <p class="mb-1">Mobile: +212 (0) 6 61 995 434</p>
                                <p class="mb-1">http://www.greentelemesure.com</p>
                            </div>
                        </div>

                        <div class="col-md-6 text-right">
                            <h4 class="font-weight-bold mb-1">Bon De Livraison</h4>
                            <p class="font-weight-bold mb-1">REF: {{ $bl->ref_BL }}</p>
                            <p class="text-muted">{{ $bl->date_BL }}</p>
                        </div>
                    </div>

                    <hr class="my-5">

                    <div class="row pb-5 p-5">
                        <div class="col-md-6">
                            <p class="font-weight-bold mb-4">Information Du Client</p>
                            <p class="mb-1">{{ $client['0']->prenom }} {{ $client['0']->nom }}</p>
                            <p class="mb-1">{{ $client['0']->email }}</p>
                            <p class="mb-1">{{ $client['0']->tel }}</p>
                        </div>
                    </div>

                    <div class="row p-5">
                        <div class="col-md-12">
                            <table class="table">
                                <thead class="thead-dark">
                                    <tr>
                                        <td> Produit         </td>
                                        <td> Quantité        </td>
                                        <td> Prix (DH)       </td>
                                        <td> Montant HT (DH) </td>
                                        <td> TVA (%)         </td>
                                        <td> Montant TVA (DH)</td>
                                        <td> Montant TTC (DH)</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($dbls as $dbl)
                                    <tr>
                                        <td> {{ $dbl->produit     }} </td>
                                        <td> {{ $dbl->quantite    }} </td>
                                        <td> {{ $dbl->prix        }} DH</td>
                                        <td> {{ $dbl->montant_HT  }} DH</td>
                                        <td> {{ $dbl->tva         }}%</td>
                                        <td> {{ $dbl->montant_TVA }} DH</td>
                                        <td> {{ $dbl->montant_TTC }} DH</td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="d-flex flex-row-reverse bg-dark text-white p-4">
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">TOTALE TTC</div>
                            <div class="h2 font-weight-light">{{ $bl->total_TTC }} DH</div>
                        </div>
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">TOTALE TVA</div>
                            <div class="h2 font-weight-light">{{ $bl->total_TVA }} DH</div>
                        </div>
                        <div class="py-3 px-5 text-right">
                            <div class="mb-2">TOTALE HT</div>
                            <div class="h2 font-weight-light">{{ $bl->total_HT }} DH</div>
                        </div>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script>


 $(function(){
    window.print();
    window.onafterprint = function(){
        history.back();
    }
    
});

</script>
</body>
</html>