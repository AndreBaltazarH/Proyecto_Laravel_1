@extends('PageMaster\_layout')

@section('content')

<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">
        <h1>Informacion</h1>
        <div class="form-group">        
        <p>Jefe Unidad</p>
        <input type="text" class="form-control"  name="unity_unit_boss" value="{{old('unity_unit_boss',$unidad->unity_unit_boss)}}" disabled>
        </div>
        <div class="form-group">
        <p>Secretaria</p>        
        <input type="text" class="form-control" name="unity_secretary" value="{{old('unity_secretary',$unidad->unity_secretary)}}"  disabled> 
        </div>
        <div class="form-group">
        <p>Direccion</p>
        <input type="text" class="form-control" name="unity_address" value="{{old('unity_address',$unidad->unity_address)}}"  disabled> 
        </div>
        <div class="form-group">
        <p>Organo</p>
        <input type="text" class="form-control" name="organ_name" value="{{old('organ_name',$unidad->organ_name)}}" disabled> 
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6"> 
        <h1>-</h1>
        <div class="form-group">
        <p>Edificio</p>
        <input type="text" class="form-control"  name="edifice_name" value="{{old('edifice_name',$unidad->edifice_name)}}"  disabled>
        </div>
        <div class="form-group">
        <p>Horario de Atencion</p>        
        <input type="text" class="form-control" name="unity_horary" value="{{old('unity_horary',$unidad->unity_horary)}}"  disabled> 
        </div>
        <div class="form-group">
        <p>Telefono</p>
        <input type="text" class="form-control"  value="Sin Informacion"  disabled> 
        </div>
        <div class="form-group">
        <p>Correo Electronico</p>
        <input type="text" class="form-control" name="unity_email" value="{{old('unity_email',$unidad->unity_email)}}"  disabled> 
        </div>
    </div>
</div>  
@endsection  