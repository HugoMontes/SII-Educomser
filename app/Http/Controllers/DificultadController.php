<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;

use App\Dificultad;
use App\Http\Requests\DificultadRequest;

class DificultadController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if ($request->buscar_dificultad){
            $dificultades = Dificultad::search($request->buscar_dificultad)->orderBy('nombre', 'ASC')->paginate(10);
            $dificultades->appends(['buscar_dificultad' => $request->buscar_dificultad]);
        }else{
            $dificultades = Dificultad::orderBy('nombre', 'ASC')->paginate(10);
        }

        if ($request->ajax()){
            return response()->json(view('admin.dificultad.partial.table')->with('dificultades', $dificultades)->render());
        }
        return view('admin.dificultad.index')->with('dificultades', $dificultades);
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
    public function store(DificultadRequest $request)
    {
        if ($request->ajax()){
            try{
                $dificultad = new Dificultad($request->all());
                $dificultad->save();
                flash('Se agregó la dificultad: '.$dificultad->nombre, 'success')->important();
                return response()->json([
                    'mensaje' => $dificultad->id,
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
                $dificultad = Dificultad::find($id);
                return response()->json([
                    'dificultad' => $dificultad,
                    'cursos' => $dificultad->cursos()->count(),
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
    public function update(DificultadRequest $request, $id)
    {
        if ($request->ajax()){
            try{
                $dificultad = Dificultad::find($id);
                $dificultad->fill($request->all());
                $dificultad->update();
                flash('Se modificó la dificultad: '.$dificultad->nombre, 'warning')->important();
                return response()->json([
                    'mensaje' => $dificultad->id,
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
                $dificultad = Dificultad::find($id);
                $dificultad->delete();
                flash('Se eliminó la dificultad: '.$dificultad->nombre, 'danger')->important();
                return response()->json([
                    'mensaje' => $dificultad->id,
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
