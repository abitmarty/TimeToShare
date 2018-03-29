<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\productenModel;

class profielController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function maakProfiel(){
      $idCurrentGebruiker = auth()->user()->id;

      $alleProducts = productenModel::where('id_eigenaar', $idCurrentGebruiker)->get();
      $uitgeleend = productenModel::where('id_eigenaar', $idCurrentGebruiker)->where('uitgeleend', 1)->get();
      $geleend = productenModel::where('uitgeleend_aan', $idCurrentGebruiker)->where('geacepteerd', 1)->get();

      return View('profiel', array('alleproducten'=>$alleProducts, 'uitgeleeend'=>$uitgeleend, 'geleendProd'=>$geleend));
    }
}
