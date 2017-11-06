<?php

namespace App\Http\Controllers\backend;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Http\Controllers\Controller;
use App\Alumno;
use App\User;
use App\Persona;

class AlumnoController extends Controller{

  public function index(){
    return view('alumno.index');
  }


  public function show($id)
  {
      try{
          $user = User::find($id);
          if($user->persona_codigo!=''){
            $id_alumno = Alumno::where('persona_codigo',$user->persona_codigo)->get()[0]->id;
            $alumno = Alumno::find($id_alumno);
            return view('alumno.show')->with('alumno', $alumno)->with('user', $user);
          }
          return view('alumno.show')->with('user', $user);
      }catch(\Exception $ex){
          flash('Wow!!! se presentó un problema al buscar datos... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
          return redirect()->route('admin.alumno.index');
      }
  }

}
