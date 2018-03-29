<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\productenModel;

class uitleenController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
    public function makeView(){
      $idCurrentGebruiker = auth()->user()->id;

      $productenVanGb = productenModel::where('id_eigenaar', $idCurrentGebruiker)->where('uitgeleend', true)->get();

      return View('uitgeleend', array('uitGelProd'=>$productenVanGb));
    }
    public function productVanMij(Request $request){
      $deid = $request->input('prodId');
      $alleProducten = productenModel::where('id', $deid)->first();

      if (isset($_POST['accept_button'])) {
        $alleProducten->uitgeleend = false;
        $alleProducten->uitgeleend_aan = false;
        $alleProducten->save();
      } else {
        //no button pressed
      }
      header('Location: ' . 'uitgeleend', true, 303);
      die();
    }
}
