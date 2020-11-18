<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class DetailBL extends Model
{
    protected $fillable = ['id_BL','produit','quantite','prix','montant_HT','tva','montant_TVA','montant_TTC'];
    
    protected $touches = ['bl'];

    public function bl(){
        return $this->belongsTo('App\Bl');
    } 

    public function getBlDetails(){
        $dbl = DB::table('bls')
                        ->join('detail_b_l_s','bls.id','=','detail_b_l_s.id_bl')
                        ->select('bls.id','detail_b_l_s.*')
                        ->get();
        return $dbl;
    }

    public function getOneBlDetails( $id_BL ){
        $dbl = DB::table('detail_b_l_s')
                        ->join('bls','detail_b_l_s.id_bl','=','bls.id')
                        ->where('detail_b_l_s.id_bl','=', $id_BL)
                        ->select('detail_b_l_s.*','bls.date_BL')
                        ->get();
        return $dbl;
    }
}
