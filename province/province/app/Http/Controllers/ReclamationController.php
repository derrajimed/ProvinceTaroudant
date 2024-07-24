<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Reclamation;
use  Illuminate\Support\Facades\DB;

class ReclamationController extends Controller
{
    
    public function Reclame(Request $request)
    {
        $idus = Str::random(8); // Generate random ID
        $request->validate([
            'nom' => 'required|string|max:255',
            'prenom' => 'required|string|max:255',
            'tel' => 'required|string|max:20',
            'type' => 'required',
            'dateR' => 'required|date',
            'time' => 'required',
            'reclamation' => 'required|string|unique:reclamations,reclamation'
        ]);
    
        
        
        Reclamation::create([
            'iduser' => $idus,
            'nom' => $request->nom,
            'prenom' => $request->prenom,
            'tel' => $request->tel,
            'type' => $request->type,
            'dateR' => $request->dateR,
            'time' => $request->time,
            'reclamation' => $request->reclamation,
        ]);
        
        return view('acceuil',['iduser' => $idus]); 
    }
    public function reclamations(){
      $reclamations =DB::table("reclamations")->get(); 
      return view('reclamation',['reclamations' => $reclamations ]);
    }
}
?>