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
 
<form id="form" action="/bl/ajouter" method="POST">
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h4>Gestion des bons de livraison</h4>
                <h6>Ajouter un nouveau bon de livraison</h6>
            </div>
            <div class="card-body"> 
                @csrf
                <div class="col-md-12">
                    <div class="form-row mb-4">
                    <div class="col">
                        <label>Date</label>
                        <input type="date" id="date_bl" name="Date" class="form-control" value="{{ old('Date') }}" required/>
                        <small class="error">{{ $errors->first('Date') }}</small>
                    </div>
                    <div class="col">
                        <label>Client</label>
                        <select class="custom-select" name="Id_client" required>
                                <option disabled selected value> -- Sélectionner un client -- </option>
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                            @endforeach
                        </select>
                        <small class="error">{{ $errors->first('Id_client') }}</small>
                    </div>                          
                    <div class="col">
                        <label>REF BL</label>
                            <input type="text" class="form-control" name="Ref" placeholder="REF" value="{{ old('Ref') }}" required />
                            <small class="error">{{ $errors->first('Ref') }}</small>
                        </div>
                    </div>
                </div>
                <div class="col-md-12">
                    <div class="bd-example">
                        <button type="button" class="btn btn-info" id="ajt_BL">
                            <span class="fa fa-plus"></span> Ajouter Un BL
                        </button>
                    </div>
                    <br>
                    <div class="table-responsive">
                        <table class="table table-bordred table-striped" id="table">
                            <thead class="thead-dark">
                                <th></th>
                                <th>Produit</th>
                                <th>Quantité</th>
                                <th>Prix (DH)</th>
                                <th>Montant HT (DH)</th>
                                <th>TVA (%)</th>
                                <th>Montant TVA (DH)</th>
                                <th>Montant TTC (DH)</th>
                            </thead>
                            <tbody id="dynamic_row">
                            <tr>
                                <td></td> 
                                <td><input type="text"   class="form-control"             name="Produit[]"    placeholder="Produit"                       required /></td>  
                                <td><input type="number" class="form-control quantite"    name="Quantite[]"   placeholder="Quantité"  min="1" max="99999" required  /></td>  
                                <td><input type="number" class="form-control prix"        name="Prix[]"       placeholder="Prix"      min="0" max="99999" required /></td>  
                                <td> 
                                    <input type="number" class="montant_HT form-control"                     placeholder="Montant HT"                    disabled/> 
                                    <input type="hidden" class="montant_HT"               name="Montant_HT[]"                                             /> 
                                </td>  
                                <td><input type="number" class="form-control tva"         name="Tva[]"        placeholder="TVA"       min="0" max="100"   required /></td> 
                                <td>  
                                    <input type="number" class="montant_TVA form-control"                     placeholder="Montant TVA"                   disabled/> 
                                    <input type="hidden" class="montant_TVA"              name="Montant_TVA[]"                                            /> 
                                </td>  
                                <td> 
                                    <input type="number" class="montant_TTC form-control"                      placeholder="Montant TTC"                   disabled/> 
                                    <input type="hidden" class="montant_TTC"              name="Montant_TTC[]"                                              /> 
                                </td>  
                            </tr> 
                                <!-- Dynamic rows -->
                            </tbody>
                            <tfoot class="table-secondary">
                                <th></th>
                                <th>-</th>
                                <th>-</th>
                                <th>-</th>
                                <th class="somme_montant_HT" >-</th>
                                <th>-</th>
                                <th class="somme_montant_TVA">-</th>
                                <th class="somme_montant_TTC">-</th>
                            </tfoot>
                        </table>
                        <input type="hidden" class="somme_montant_HT_input"  name="Total_HT"/>
                        <input type="hidden" class="somme_montant_TVA_input" name="Total_TVA"/>
                        <input type="hidden" class="somme_montant_TTC_input" name="Total_TTC"/>
                    </div>
                </div>
            </div>
            <div class="card-footer"> 
                <div class="text-right">
                    <a href="/bls" class="btn btn-warning btn">
                    <i class="fa fa-bars" ></i> Toutes les BL</a> 
                    <button type="submit" value="Enregister" class="btn btn-success btn">
                        <i class="fa fa-save" ></i> Enregister
                    </button> 
                </div>
            </div>
        </div> 
    </div>
</form> 
 
<div class="container">
    <br>
    <div class="card">
        <div class="card-header">
            <h4>Les 5 Derniers enregistrements.</h4>
        </div>
        <div class="card-body"> 
            <div class="col-md-12"> 
                <div class="table-responsive">
                    <table class="table table-hover table-sm table-striped" id="table">
                        <thead class="thead-dark">
                            <th> Date BL       </th>
                            <th> REF BL        </th>
                            <th> Client        </th>  
                            <th> TOTAL HT (DH) </th>  
                            <th> TOTAL TVA (DH)</th>  
                            <th> TOTAL TTC (DH)</th> 
                            <th> Action        </th> 
                        </thead>
                        <tbody>
                            @foreach($bls as $bl)
                            <tr>
                                <td> {{ $bl->date_BL   }}                 </td>
                                <td> {{ $bl->ref_BL    }}                 </td>   
                                <td> {{ $bl->prenom    }} {{ $bl->nom  }} </td> 
                                <td> {{ $bl->total_HT  }}               DH</td> 
                                <td> {{ $bl->total_TVA }}               DH</td> 
                                <td> {{ $bl->total_TTC }}               DH</td>  
                                <td> 
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