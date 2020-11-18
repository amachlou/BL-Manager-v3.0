<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bl as Bl;
use App\Client as Client;
use App\DetailBL as DetailBL;

class BlController extends Controller
{
    public function __construct(Client $client,Bl $bl, DetailBL $dbl){
        $this->client = $client;
        $this->bl     = $bl;
        $this->dbl    = $dbl;
    }

    public function listBL(){ 
        $data['bls'] = $this->bl->getClientBls();
        return view('bl/bls', $data);
    }

    public function ajouter(Request $request, Bl $bl, DetailBL $dbl){
       
        $data['bls']     = $this->bl->getClientBls()->take(5);
        $data['clients'] = $this->client->all(); 

        if( $request->isMethod('post') ){

            $this->validate(
                $request,
                [     
                    'Date'      => 'required', 
                    'Id_client' => 'required', 
                    'Ref'       => 'required'
                ]
            );

            if( $request->input('Date') != null && $request->input('Ref') != null && $request->input('Id_client') != null ){
                
                $bl = new Bl([
                    'date_BL'   => $request->input('Date'), 
                    'ref_BL'    => $request->input('Ref'),
                    'id_client' => $request->input('Id_client'),  
                    'total_HT'  => $request->input('Total_HT'),
                    'total_TVA' => $request->input('Total_TVA'),   
                    'total_TTC' => $request->input('Total_TTC')
                ]);
                $bl->save();
     
                if(!empty($request->Produit)){
                    foreach($request->Produit as $item=>$value){
                        $dbl = new DetailBL([
                            'produit'     => $request->Produit[$item],
                            'quantite'    => $request->Quantite[$item],
                            'prix'        => $request->Prix[$item],  
                            'montant_HT'  => $request->Montant_HT[$item],
                            'tva'         => $request->Tva[$item],
                            'montant_TVA' => $request->Montant_TVA[$item],   
                            'montant_TTC' => $request->Montant_TTC[$item]
                        ]);
                        $bl->detailBL()->saveMany([$dbl]); 
                    }
                }
                $data['bls']       = $this->bl->all();
                $data['data_dbls'] = $this->dbl->all();
                return back()->with('status', 'Bon de livraison est bien ajouter!'); 
            }
        }
        return view('bl/ajouterBL', $data);
    }
    
    public function modifier(Request $request, Client $client, DetailBL $dbl, Bl $bl, $id_BL){
        
        $blToEdit            = [];
        $blToEdit['bl']      = Bl::find($id_BL);
        $blToEdit['dbls']    = $dbl->getOneBlDetails($id_BL); 
        $blToEdit['clients'] = $this->client->all(); 
        $blToEdit['client']  = $client->getBlClient($id_BL); 

        if( $request->isMethod('post') ){
            
            $this->validate(
                $request,
                [     
                    'Date'      => 'required', 
                    'Id_client' => 'required', 
                    'Ref'       => 'required'
                ]
            ); 
            
            if( $request->input('Date') != null && $request->input('Ref') != null && $request->input('Id_client') != null ){
                
                $bl = $this->bl->find($id_BL);

                $bl->date_BL   = $request->input('Date'); 
                $bl->ref_BL    = $request->input('Ref');
                $bl->id_client = $request->input('Id_client');  
                $bl->total_HT  = $request->input('Total_HT');
                $bl->total_TVA = $request->input('Total_TVA');   
                $bl->total_TTC = $request->input('Total_TTC');

                $bl->save();
                
                if(!empty($request->Produit)){
                    foreach($request->Produit as $item=>$value){
                        $temp_data = new DetailBL([
                            'produit'     => $request->Produit[$item],
                            'quantite'    => $request->Quantite[$item],
                            'prix'        => $request->Prix[$item],  
                            'montant_HT'  => $request->Montant_HT[$item],
                            'tva'         => $request->Tva[$item],
                            'montant_TVA' => $request->Montant_TVA[$item],   
                            'montant_TTC' => $request->Montant_TTC[$item]
                        ]);/* 
                        if($request->Id_DBL[$item] == 0){
                            // i deleted
                        }*/ //dd($request);
                        if($request->Id_DBL[$item] == 0){
                            $bl->detailBL()->saveMany([$temp_data]); 
                        }else if(!empty($request->delete[$item])){
                            $dbl = $this->dbl->find((int)$request->delete[$item]); 
                            $dbl->delete();
                        }else{  
                            $dbl = $this->dbl->find((int)$request->Id_DBL[$item]); 

                            $dbl->produit     = $request->Produit[$item];
                            $dbl->quantite    = $request->Quantite[$item];
                            $dbl->prix        = $request->Prix[$item];  
                            $dbl->montant_HT  = $request->Montant_HT[$item];
                            $dbl->tva         = $request->Tva[$item];
                            $dbl->montant_TVA = $request->Montant_TVA[$item];   
                            $dbl->montant_TTC = $request->Montant_TTC[$item];
                            
                            $dbl->save();
                        }
                    } 
                }  
                return redirect('/bls')->with('status', 'Bon de livraison est bien modifier!');
            }
        } 
        return view('/bl/modifierBL', $blToEdit);
    }

    public function supprimer(Bl $bl, $id_BL){

        $bl = Bl::find($id_BL);
        $bl->delete();

        return redirect('/bls')->with('status', 'Bon de livraison est bien supprimer!');
    }
}
