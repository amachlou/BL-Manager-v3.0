<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Bl extends Model
{
    protected $fillable = ['date_BL','Date','ref_BL','id_client','total_HT','total_TVA', 'total_TTC'];

    public function detailBL(){
        return $this->hasMany('App\DetailBL','id_BL');
    } 

    public function getClientBls(){
        $bls = DB::table('bls')
                    ->join('clients','clients.id','=','bls.id_client')
                    ->select('clients.*','bls.*')
                    ->orderBy('bls.id','DESC')
                    ->get();
        return $bls;
    }
}
