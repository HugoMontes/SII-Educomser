<?php

namespace App\Http\Controllers\usuario;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;

class HomeController extends Controller{

  public function index(){
    return view('backend.usuario.index');
  }

}
