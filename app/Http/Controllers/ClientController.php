<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Client as Client;

class ClientController extends Controller
{   
    public function __construct(Client $client){
        $this->client = $client;
    }

    public function listClient(){
        
        $data = [];
        $data['clients'] = $this->client->all();
        
        return view('client/clients',$data);
    }

    public function ajouter(Request $request, Client $client){

        if( $request->isMethod('post') ){
            
            $client = new Client([
                'nom'    => $request->input('nom'),
                'prenom' => $request->input('prenom'),
                'tel'    => $request->input('tel'),
                'email'  => $request->input('email')
            ]);
            $client->save();
            
            return redirect('/clients')->with('status', 'Le client est bien ajouter!'); 
        }
        return view('client/ajouterClient');
    }

    public function modifier(Request $request, Client $client, $id_client){
        
        if( $request->isMethod('POST') ){ 

            $client = $this->client->find($id_client);
                $client->nom    = $request->input('nom');
                $client->prenom = $request->input('prenom');
                $client->tel    = $request->input('tel');
                $client->email  = $request->input('email');            
            $client->save();

            return redirect('/clients')->with('status', 'Le client est bien modifier!');
        }
        $data    = $this->client->find($id_client);
        return view('client/modifierClient',$data);
    }

    public function supprimer(Client $client, $id_client){
        $client_data = $this->client->find($id_client);
        $client_data->delete();
        return redirect('/clients')->with('status', 'Le client est bien supprimer!');
    }
}
