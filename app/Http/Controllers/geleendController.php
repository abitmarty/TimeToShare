<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\productenModel;

class geleendController extends Controller
{
  public function __construct()
  {
      $this->middleware('auth');
  }
  public function makeView(){
    $idCurrentGebruiker = auth()->user()->id;

    $productenVanGb = productenModel::where('uitgeleend_aan', $idCurrentGebruiker)->where('uitgeleend', true)->get();

    return View('geleend', array('geleendProd'=>$productenVanGb));
  }

  public function accOfWei(Request $request){
    $deid = $request->input('prodId');
    $alleProducten = productenModel::where('id', $deid)->first();

    if (isset($_POST['accept_button'])) {
      $alleProducten->geacepteerd = true;
      $alleProducten->save();

      //return 'accept';

    } else if (isset($_POST['weiger_button'])) {
      $alleProducten->uitgeleend = false;
      $alleProducten->uitgeleend_aan = '';
      $alleProducten->save();

      //return 'weiger';
    } else if (isset($_POST['return_button'])){
      $deid = $request->input('prodId');
      $alleProducten = productenModel::where('id', $deid)->first();

      $alleProducten->geacepteerd = false;
      $alleProducten->save();
    } else {
      //no button pressed
    }
    header('Location: ' . 'geleend', true, 303);
    die();
  }
}
