<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Client extends Model
{
    protected $fillable = ['nom','prenom','email','tel'];
    
    public function bl(){
        return $this->hasMany('App\Bl', 'id_client');
    } 

    public function getBlClient($id_BL){
        $client = DB::table('clients')
                    ->join('bls','clients.id','=','bls.id_client')
                    ->where('bls.id','=', $id_BL)
                    ->select('clients.*')
                    ->get();
        return $client;
    }

    public function getBlClientId($id_BL){
        $clientId = DB::table('clients')
                    ->join('bls','clients.id','=','bls.id_client')
                    ->where('bls.id','=', $id_BL)
                    ->select('clients.id')
                    ->get();
        return $clientId;
    }
}
