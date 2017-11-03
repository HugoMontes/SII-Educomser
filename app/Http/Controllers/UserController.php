<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use App\User;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request){
        if ($request->buscar_user){
            //$users = User::search($request->buscar_user)->orderBy('name', 'ASC')->paginate(10);
            $users = User::where('name', $request->buscar_user)->where('tipo', '!=', 'usuario')->orderBy('name', 'ASC')->paginate(10);
            $users->appends(['buscar_user' => $request->buscar_user]);
        }else{
            // $users = User::orderBy('name', 'ASC')->paginate(10);
            $users = User::where('tipo', '!=', 'usuario')->paginate(10);
        }
        if ($request->ajax()){
            return response()->json(view('admin.user.partial.table')->with('users', $users)->render());
        }
        return view('admin.user.index')->with('users', $users);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      if ($request->ajax()){
          try{
              $user = new User($request->all());
              $user->password = bcrypt($user->password);
              $user->save();
              $nombre_completo=$user->paterno.' '.$user->materno.' '.$user->name;
              flash('Se agregó el usuario: '.$nombre_completo, 'success')->important();
              return response()->json([
                  'mensaje' => $user->id,
              ]);
          }catch(\Exception $ex){
              flash('Wow!!! se presentó un problema al agregar... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
              return response()->json([
                  'mensaje' => $ex->getMessage(),
              ]);
          }
      }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
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

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      if ($request->ajax()){
          try{
              $user = User::find($id);
              $user->fill($request->all());
              $user->update();
              $nombre_completo=$user->paterno.' '.$user->materno.' '.$user->name;
              flash('Se modificó el usuario: '.$nombre_completo, 'warning')->important();
              return response()->json([
                  'mensaje' => $user->id,
              ]);
          }catch(\Exception $ex){
              flash('Wow!!! se presentó un problema al modificar... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
              return response()->json([
                  'mensaje' => $ex->getMessage(),
              ]);
          }
      }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Request $request, $id)
    {
      if ($request->ajax()){
          try{
              $user = User::find($id);
              $user->delete();
              $nombre_completo=$user->primer_paterno.' '.$user->segundo_materno.' '.$user->name;
              flash('Se eliminó al usuario: '.$nombre_completo, 'danger')->important();
              return response()->json([
                  'mensaje' => $user->id,
              ]);
          }catch(\Exception $ex){
              flash('Wow!!! se presentó un problema al eliminar... Intenta más tarde. El mensaje es el siguiente: '.$ex->getMessage(), 'danger')->important();
              return response()->json([
                  'mensaje' => $ex->getMessage(),
              ]);
          }
      }
    }
}
