<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;
use App\Persona;

class RegistroController extends Controller
{
  public function index(Request $request){
    if ($request->buscar_user){
        //$users = User::search($request->buscar_user)->orderBy('name', 'ASC')->paginate(10);
        $users = User::where('name', $request->buscar_user)->where('tipo', 'usuario')->orderBy('name', 'ASC')->paginate(10);
        $users->appends(['buscar_user' => $request->buscar_user]);
    }else{
        // $users = User::orderBy('name', 'ASC')->paginate(10);
        $users = User::where('tipo', 'usuario')->paginate(10);
    }
    if ($request->ajax()){
        return response()->json(view('admin.registro.partial.table')->with('users', $users)->render());
    }
    return view('admin.registro.index')->with('users', $users);
  }

  public function vincular($id){
    try{
        $user = User::find($id);
        // $personas = Persona::orderBy('personas.updated_at', 'DESC')->limit(10)->get();
        $personas = Persona::where('numero_ci', 'like', '%' . $user->ci . '%')
                    ->orWhere('primer_apellido', 'like', '%' . $user->paterno . '%')
                    ->orderBy('primer_apellido', 'ASC')->limit(10)->get();
        return view('admin.registro.vincular')->with('user', $user)->with('personas', $personas);
    }catch(\Exception $ex){
        flash('Wow!!! se presentó un problema al buscar datos... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
        return redirect()->route('admin.registro.index');
    }
    // return "vinculando....".$id;
  }

  public function store(){
    return "vinculando....";
  }
}
