@extends('layouts.app')
@section('titulo','Formulario')
@section('contenido')
<button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
  Nuevo
</button>
@include('layouts.form')
<form action="{{route('paciente.store')}}" class="mt-2" method="POST">
@method('POST')
@csrf
<div id="caja">
 <div class="form-group">
  <div class="mt-2">
   <label class="form-label">Ingrese el nombre del paciente</label>
   <input type="text" class="form-control" name="nombre_paciente"  required>
   @error('nombre_paciente')
   <span class="text-danger">Falta el nombre del paciente</span>
   @enderror
  </div>
  <div class="mt-2">
   <label class="form-label">Ingrese el dui del paciente</label>
   <input type="number"  class="form-control" name="dui_paciente"  required>
  </div>
  <div class="mt-2">
   <label class="form-label">Ingrese direccion del paciente</label>
   <input type="text"  class="form-control" name="direccion_paciente"  required>
   @error('direccion_paciente')
   <span class="text-danger">Falta la direccion del paciente</span>
   @enderror
  </div>
 </div>
 <div class="form-group mt-2">
  <button type="submit" class="btn btn-outline-success" >Guardar</button>
 </div>
</div>
</form>
@endsection
