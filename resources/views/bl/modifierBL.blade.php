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
 
<!-- End Nav Bar-->

<form action="/bl/modifier/{{ $bl->id }}" id="form" method="POST">
@csrf
    <div class="container">
        <br>
        <div class="card">
            <div class="card-header">
                <h4>Gestion Des Bons De Livraison</h4>
                <h6>Modification du bon de livraison</h6>
            </div>
            <div class="card-body"> 
                <div class="col-md-12">
                    <div class="form-row mb-4">
                        <div class="col">
                            <label>Date </label>
                            <input type="date" id="date_bl" name="Date" class="form-control" value="{{ $bl->date_BL }}" required />
                            <small class="error">{{ $errors->first('Date') }}</small>
                        </div>
                        <div class="col">
                            <label>Client</label> 
                            <select class="custom-select" name="Id_client" required > 
                                <option value="{{ $client['0']->id }}" selected>{{ $client['0']->prenom }} {{ $client['0']->nom }} (Original)</option> 
                            @foreach($clients as $client)
                                <option value="{{ $client->id }}">{{ $client->prenom }} {{ $client->nom }}</option>
                            @endforeach
                            </select>
                        </div>
                        <div class="col">
                            <label>REF BL</label>
                            <input type="text" class="form-control" name="Ref" placeholder="REF" value="{{ $bl->ref_BL }}" required />
                            <small class="error">{{ $errors->first('Red') }}</small>
                        </div>
                    </div>
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
                                <th>Produit         </th>
                                <th>Quantité        </th>
                                <th>Prix (DH)       </th>
                                <th>Montant HT (DH) </th>
                                <th>TVA (%)         </th>
                                <th>Montant TVA (DH)</th>
                                <th>Montant TTC (DH)</th>
                            </thead>
                            <tbody id="dynamic_row">
                                <!-- Dynamic rows -->
                                @foreach($dbls as $dbl) 
                                <tr>
                                    <td> 
                                        <button class="btn btn-danger btn-sm delete" id="supp_ligne"> 
                                            <span class="fa fa-trash-o"> </span> 
                                        </button> 
                                        <input type="number" id="idBL" name="Id_DBL[]" value="{{ $dbl->id }}" hidden/> 
                                    </td> 
                                    <td><input type="text"   class="form-control"              name="Produit[]"     placeholder="Produit"     value="{{ $dbl->produit }}"                        required /></td>  
                                    <td><input type="number" class="form-control quantite"     name="Quantite[]"    placeholder="Quantité"    value="{{ $dbl->quantite }}"   min="1" max="99999" required /></td> 
                                    <td><input type="number" class="form-control prix"         name="Prix[]"        placeholder="Prix"        value="{{ $dbl->prix }}"       min="0" max="99999" required /></td>  
                                    <td> 
                                        <input type="number" class="montant_HT form-control"                       placeholder="Montant HT"  value="{{ $dbl->montant_HT }}"                     disabled/> 
                                        <input type="hidden" class="montant_HT"               name="Montant_HT[]"                            value="{{ $dbl->montant_HT }}"                      /> 
                                    </td>  
                                    <td><input type="number" class="form-control tva"          name="Tva[]"         placeholder="TVA"        value="{{ $dbl->tva }}"         min="0" max="100"   required /></td> 
                                    <td>  
                                        <input type="number" class="montant_TVA form-control"                      placeholder="Montant TVA" value="{{ $dbl->montant_TVA }}"                    disabled/> 
                                        <input type="hidden" class="montant_TVA"              name="Montant_TVA[]"                           value="{{ $dbl->montant_TVA }}"                     /> 
                                    </td>  
                                    <td> 
                                        <input type="number" class="montant_TTC form-control"                      placeholder="Montant TTC" value="{{ $dbl->montant_TTC }}"                    disabled/> 
                                        <input type="hidden" class="montant_TTC"              name="Montant_TTC[]"                           value="{{ $dbl->montant_TVA }}"                       /> 
                                    </td> 
                                </tr>
                                @endforeach
                            </tbody>
                            <tfoot class="table-secondary">
                                <th> </th>
                                <th>-</th>
                                <th>-</th>
                                <th>-</th>
                                <th><span class="somme_montant_HT" ></span> DH</th>
                                <th>-</th> 
                                <th><span class="somme_montant_TVA"></span> DH</th>
                                <th><span class="somme_montant_TTC">-</span> DH</th>
                            </tfoot>
                        </table>
                        <div id="more-things">
                            <input type="hidden" class="somme_montant_HT_input"  name="Total_HT" />
                            <input type="hidden" class="somme_montant_TVA_input" name="Total_TVA"/>
                            <input type="hidden" class="somme_montant_TTC_input" name="Total_TTC"/>
                        </div>
                    </div>
                </div>
            </div>
            <div class="card-header">
                <div class="text-right">
                    <a href="/bls" class="btn btn-warning btn">
                        <i class="fa fa-bars"></i> Toutes les BL
                    </a>
                    <button type="submit" value="Enregister" class="btn btn-success btn">
                        <i class="fa fa-save" ></i> Enregister
                    </button> 
                </div>
            </div>
        </div> 
    </div>
</form>

</body>
</html>