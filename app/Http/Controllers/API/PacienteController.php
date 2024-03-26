<?php

namespace App\Http\Controllers\API;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
    /**
     * Display a listing of the resource.
     */

     protected $rules =[
        'nombre_paciente' =>'required|max:25',
        'dui_paciente' =>'required|numeric|max:10',
        'direccion_paciente' =>'required|max:100',
     ];

    public function index()
    {
        $data = Paciente::get();
       return response()->json($data,200);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Request $request)
    {
        $request->validate($this->rules);
        Paciente::create($this->igual($request));
        return response()->json(['message'=>'Creado','success'=>'true'],200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function igual(Request $request)
    {
        $data['nombre_paciente'] = $request['nombre_paciente'];
        $data['dui_paciente'] = $request['dui_paciente'];
        $data['direccion_paciente'] = $request['direccion_paciente'];
        return $data;
    }

    public function update(Request $request, $id)
    {
        Paciente::find($id)->update($this->igual($request));
        return response()->json(['message'=>'Actualizado','success'=>'true'],200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function delete($id)
    {
      Paciente::find($id)->delete();
      return response()->json(['message'=>'Eliminado','success'=>'true'],200);
    }

    public function validar($request){
        $request->validate($this->rules);
        return true;
    }
}
