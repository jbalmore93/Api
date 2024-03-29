<?php

namespace App\Http\Controllers\API;

use App\Models\Paciente;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class PacienteController extends Controller
{
     //Reglas de validacion del back
     protected $rules =[
        'nombre_paciente' =>'required|max:25',
        'dui_paciente' =>'required|numeric|max:10',
        'direccion_paciente' =>'required|max:100',
     ];

    public function index()//Funcion que traera el json desde la bd
    {
        $data = Paciente::get();
       return response()->json($data,200);
    }

    public function store(Request $request)//Funcion para crear un nuevo paciente
    {
        $request->validate($this->rules);
        Paciente::create($this->igual($request));
        return response()->json(['message'=>'Creado','success'=>'true'],200);
    }

    public function igual(Request $request)//Funcion para igualar los datos con el request
    {
        $data['nombre_paciente'] = $request['nombre_paciente'];
        $data['dui_paciente'] = $request['dui_paciente'];
        $data['direccion_paciente'] = $request['direccion_paciente'];
        return $data;
    }

    public function update(Request $request, $id)//Funcion para actualizar un paciente
    {
        Paciente::find($id)->update($this->igual($request));
        return response()->json(['message'=>'Actualizado','success'=>'true'],200);
    }

    public function destroy($id)//Funcion para eliminar un registro
    {
      Paciente::find($id)->delete();
      return response()->json(['message'=>'Eliminado','success'=>'true'],200);
    }
}
