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

  public function vincular_form($id){
    try{
        $user = User::find($id);
        $personas = Persona::where('numero_ci', 'like', '%' . $user->ci . '%')
                    ->orWhere('primer_apellido', 'like', '%' . $user->paterno . '%')
                    ->orderBy('primer_apellido', 'ASC')->limit(10)->get();
        return view('admin.registro.vincular')->with('user', $user)->with('personas', $personas);
    }catch(\Exception $ex){
        flash('Wow!!! se presentó un problema al buscar datos... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
        return redirect()->route('admin.registro.index');
    }
  }

  public function desvincular_form($id){
    try{
        $user = User::find($id);
        $persona = Persona::find($user->persona_codigo);
        return view('admin.registro.desvincular')->with('user', $user)->with('persona', $persona);
    }catch(\Exception $ex){
        flash('Wow!!! se presentó un problema al buscar datos... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
        return redirect()->route('admin.registro.index');
    }
  }

  public function vincular(Request $request){
    $this->validate($request, [
        'codigo' => 'required'
    ]);
    try{
      $codigo=$request->codigo;
      $user=User::find($request->id_user);
      $user->persona_codigo=$codigo;
      $user->update($request->all());
      $nombre_completo=$user->materno.' '.$user->paterno.' '.$user->name;
      flash('Se ha vinculado a '.$nombre_completo.' exitosamente.','success')->important();
      return redirect()->route('admin.registro.index');
    }catch(\Exception $ex){
        flash('Wow!!! se presentó un problema al vincular... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
        return redirect()->route('admin.registro.index');
    }
  }

  public function desvincular($id){
    try{
      $user=User::find($id);
      $user->persona_codigo='';
      $user->update();
      $nombre_completo=$user->materno.' '.$user->paterno.' '.$user->name;
      flash('Se ha eliminado el vinculo de '.$nombre_completo.' exitosamente.','success')->important();
      return redirect()->route('admin.registro.index');
    }catch(\Exception $ex){
        flash('Wow!!! se presentó un problema al eliminar el vinculo... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
        return redirect()->route('admin.registro.index');
    }
  }

  public function edit(Request $request, $id)
  {
    if ($request->ajax()){
        try{
            $user = User::find($id);
            return response()->json([
                'user' => $user
            ]);
        }catch(\Exception $ex){
            flash('Wow!!! se presentó un problema al buscar datos... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
            return response()->json([
                'mensaje' => $ex->getMessage(),
            ]);
        }
    }
  }

  public function change_status(Request $request, $id)
  {
    if ($request->ajax()){
        try{
            $user = User::find($id);
            $user->is_active = !$user->is_active;
            $user->update();
            $estado=$user->is_active?'ACTIVO':'INACTIVO';
            $nombre_completo=strtoupper($user->paterno.' '.$user->materno.' '.$user->name);
            return response()->json([
                'mensaje' => '<strong>'.$nombre_completo.':</strong> Se ha cambiado el estado a <strong>'.$estado.'</strong>',
            ]);
        }catch(\Exception $ex){
            flash('Wow!!! se presentó un problema al buscar datos... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
            return response()->json([
                'mensaje' => $ex->getMessage(),
            ]);
        }
    }
  }

}
