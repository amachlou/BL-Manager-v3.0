<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\DetailBL as DetailBL;
use App\Client as Client;
use App\Bl as Bl;

class DetailBLController extends Controller
{
    public function __construct(DetailBL $dbl, Bl $bl, Client $client){
        $this->bl     = $bl;
        $this->dbl    = $dbl;
        $this->client = $client;
    }

    public function details($id_BL, Bl $bl){
        
        $data           = [];
        $data['bls']    = $bl->find( $id_BL ); 
        $data['dbls']   = $this->dbl->getOneBlDetails( $id_BL );
        $data['client'] = $this->client->getBlClient( $id_BL ); 
        
        return view('dbl/detailBL', $data);
    }

    public function imprimer( $id_BL ){

        $data           = [];
        $data['bl']     = $this->bl->find( $id_BL ); 
        $data['dbls']   = $this->dbl->getOneBlDetails( $id_BL ); 
        $data['client'] = $this->client->getBlClient( $id_BL ); 
        
        return view('dbl/imprimer', $data);
    }
}
