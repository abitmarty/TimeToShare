<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use App\productenModel;
use Uuid;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function homeTry(){
      $idCurrentGebruiker = auth()->user()->id;


      $productenVanGb = productenModel::where('id_eigenaar', $idCurrentGebruiker)->get();

      //return $productenVanGb;
      return View('home', array('productenVanGb'=>$productenVanGb));
    }
    public function voegProd(Request $request){
      $cijfer = new productenModel;
      $idCurrentGebruiker = auth()->user()->id;

      //$cijfer->id = (string) Uuid::generate();
      $cijfer->id_eigenaar = $idCurrentGebruiker;
      $cijfer->product_naam = $request->input('productNaam');
      $cijfer->id = (string) Uuid::generate();

      $cijfer->save();

      // $idCurrentGebruiker = auth()->user()->id;
      //
      // $productenVanGb = productenModel::where('id_eigenaar', $idCurrentGebruiker)->get();
      // return View('home', array('productenVanGb'=>$productenVanGb));
      header('Location: ' . 'home', true, 303);
      die();
    }


    public function leenUit(Request $request){

      //Als ie al is uitgeleend dan niet updaten
      // if uitgeleend return home
      // else return home met request
      $uitgeleendaan = $request->input('uileenId');
      $uitgeleend = true;
      $deid = $request->input('prodId');

      //return $uitgeleendaan;

      $alleProducten = productenModel::where('id', $deid)->first();
      //return $deid;
      $alleProducten->uitgeleend_aan = $uitgeleendaan; //$uitgeleendaan
      $alleProducten->uitgeleend = $uitgeleend;

      $alleProducten->save();

      // $idCurrentGebruiker = auth()->user()->id;
      //
      // $productenVanGb = productenModel::where('id_eigenaar', $idCurrentGebruiker)->get();
      //return View('home', array('productenVanGb'=>$productenVanGb));
      header('Location: ' . 'home', true, 303);
      die();
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('home');
    }
}
