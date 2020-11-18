
$(function() { 
      
    $(document).on('click', '.delete', function() {
        return confirm("Vouler vous vraiment supprimer?");
    });
});

$(document).ready(function(){
    $("#submitBtn").click(function(){        
        $("[type='submit']").submit(); 
    });
});

$(function() { 
      
    $(document).on('load', '.imprimer', function() {
        return confirm("Vouler vous vraiment IMPRIMER?");
    });
});

$(function() { 
    $(".alert").toggle(4000); 
});


var html = ' <tr> '+
            ' <td> '+
            '     <button class="btn btn-danger btn-sm delete" id="supp_ligne"> '+
            '         <span class="fa fa-trash-o"> </span> '+
            '     </button> '+
            '     <input type="number" name="Id_DBL[]" value="0" hidden/> '+
            ' </td> '+
            ' <td><input type="text"   class="form-control"              name="Produit[]"     placeholder="Produit"                        required /></td>  '+
            ' <td><input type="number" class="form-control quantite"     name="Quantite[]"    placeholder="Quantité"   min="1" max="99999" required /></td> '+
            ' <td><input type="number" class="form-control prix"         name="Prix[]"        placeholder="Prix"       min="0" max="99999" required /></td>  '+
            ' <td> '+
            '     <input type="number"  class="montant_HT form-control"                       placeholder="Montant HT"                     disabled/> '+
            '     <input type="hidden"  class="montant_HT"               name="Montant_HT[]"                                               /> '+
            ' </td>  '+
            ' <td><input type="number" class="form-control tva"          name="Tva[]"         placeholder="TVA"        min="0" max="100"    required /></td> '+
            ' <td>  '+
            '     <input type="number"  class="montant_TVA form-control"                      placeholder="Montant TVA"                 disabled/> '+
            '     <input type="hidden"  class="montant_TVA"              name="Montant_TVA[]"                                           /> '+
            ' </td>  '+
            ' <td> '+
            '     <input type="number"  class="montant_TTC form-control"                      placeholder="Montant TTC" disabled/> '+
            '     <input type="hidden"  class="montant_TTC"              name="Montant_TTC[]"                                   /> '+
            ' </td> '+
           ' </tr>';


$(function(){
    table_update();
});

$(function() { 
    $(document).on('click', '#ajt_BL', function() {
        $('#dynamic_row').append(html);
        table_update();
    });
});
  
$(function() { 
    $(document).on('click', '#supp_ligne', function() {
        $(this).parents('tr').remove();

        var idBL  = $(this).parents().find("input").val(); 
        var text1 = "<input type=\"number\" hidden value=\"";
        var text2 = "\" class=\"toDelete\" name=\"delete[]\"  />";
        
        $('#more-things').append(text1+""+idBL+""+text2); 

        somme_montantHT();
        somme_montantTVA();
        somme_montantTTC();
    });
});

function montantHT(){

var quantite = 0;
var prix     = 0;

    $("#table tbody tr").each(function(){
        
            prix     = $(this).find("td").find(".prix").val();
            quantite = $(this).find("td").find(".quantite").val();
            if(!isNaN(quantite) && quantite.length!=0 && !isNaN(prix) && prix.length!=0) {
                $(this).find("td").find(".montant_HT").val((prix*quantite).toFixed(2));
            }     
    });
}

function montantTVA(){

var montant_ht = 0;
var tva        = 0;

    $("#table tbody tr").each(function(){
        
            montant_ht = $(this).find("td").find(".montant_HT").val();
            tva        = $(this).find("td").find(".tva").val();

            if(!isNaN(montant_ht) && montant_ht.length!=0 && !isNaN(tva) && tva.length!=0) {
                $(this).find("td").find(".montant_TVA").val(((montant_ht*tva)/100).toFixed(2));
            }     
    });
}

function montantTTC(){
    var montant_ht  = 0;
    var montant_tva = 0;
    var montant_ttc = 20; 

    $("#table tbody tr").each(function(){
            
                montant_ht  = $(this).find("td").find(".montant_HT").val();
                montant_tva = $(this).find("td").find(".montant_TVA").val();

                if(!isNaN(montant_ht) && montant_ht.length!=0 && !isNaN(montant_tva) && montant_tva.length!=0) {
                    montant_ttc = parseFloat(montant_ht)+parseFloat(montant_tva);
                    $(this).find("td").find(".montant_TTC").val((montant_ttc).toFixed(2)); 
                }     
        });
}

function somme_montantHT() {

    var sum = 0;
    $(".montant_HT").each(function() {

        if(!isNaN(this.value) && this.value.length!=0) {
            sum += parseFloat(this.value);
        }
    });
    $(".somme_montant_HT").html((sum.toFixed(2))/2);
    $(".somme_montant_HT_input").val((sum.toFixed(2))/2);
}

function somme_montantTVA() {

    var sum = 0;
    $(".montant_TVA").each(function() {

        if(!isNaN(this.value) && this.value.length!=0) {
            sum += parseFloat(this.value);
        }
    });
    $(".somme_montant_TVA").html((sum.toFixed(2))/2);
    $(".somme_montant_TVA_input").val((sum.toFixed(2))/2);
}

function somme_montantTTC(){
    
    var sum = 0;
    $(".montant_TTC").each(function() {
        
        if(!isNaN(this.value) && this.value.length!=0) {
            sum += parseFloat(this.value);
        }
    });
    $(".somme_montant_TTC").html((sum.toFixed(2))/2);
    $(".somme_montant_TTC_input").val((sum.toFixed(2))/2);
}

function table_update() { 

    $("#table tbody tr td input").keyup(function(){
        montantHT();
        montantTVA();
        montantTTC();
        somme_montantHT();
        somme_montantTVA();
        somme_montantTTC();
    });

    $("#table tbody tr td input").change("change", function(){
        montantHT();
        montantTVA();
        montantTTC();
        somme_montantHT();
        somme_montantTVA();
        somme_montantTTC();
    });
}

$(function () { 
        montantHT();
        montantTVA();
        montantTTC();
        somme_montantHT();
        somme_montantTVA();
        somme_montantTTC();
});

 