@extends('PageMaster\_layout')

@section('content')
<form method="POST" action="{{('ejecutar')}}">
<div class="row">
    <div class="col-xs-12 col-sm-6 col-md-6">        
        <div class="form-group">
        <p>Nombre</p>
        <input type="text" class="form-control" name="unity_name" value="{{old('unity_name',$unidad->unity_name)}}" placeholder="Nombre">
        @if ($errors->has('unity_name'))
        <p>{{$errors->first('unity_name')}}</p>
        @endif
        </div>
        <div class="form-group">
        <p>Direccion</p>        
        <input type="text" class="form-control" name="unity_address" value="{{old('unity_address',$unidad->unity_address)}}" placeholder="Direccion"> 
        @if ($errors->has('unity_address'))
        <p>{{$errors->first('unity_address')}}</p>
        @endif
        </div>
        <div class="form-group">
        <p>Edificio</p>
        <select class="form-control" name="idedifice">
        @foreach($edificios as $edificio)
        <option value="{{$edificio->idedifice}}" {{ $unidad->edifice_idedifice == $edificio->idedifice ? 'selected="selected"' : '' }}>{{$edificio->edifice_name}}</option>
        @endforeach
        </select> 
        </div>
        <div class="form-group">
        <p>Organo</p>
        <select class="form-control" name="idOrgan">
        @foreach($organs as $organ)
        <option value="{{$organ->idOrgan}}" {{ $unidad->Organ_idOrgan == $organ->idOrgan ? 'selected="selected"' : '' }}>{{$organ->organ_name}}</option>
        @endforeach
        </select> 
        </div>
        <div class="form-group">
        <p>Correo</p>   
        <input type="email" class="form-control" name="unity_email" value="{{old('unity_email',$unidad->unity_email)}}" placeholder="Email">        
        @if ($errors->has('unity_email'))
        <p>{{$errors->first('unity_email')}}</p>
        @endif
        </div>
    </div>
    <div class="col-xs-12 col-sm-6 col-md-6">
        <div class="form-group">
        <p>Jefe Unidad</p>   
        <input type="text" class="form-control" name="unity_unit_boss" value="{{old('unity_unit_boss',$unidad->unity_unit_boss)}}" placeholder="Jefe de Unidad">        
        @if ($errors->has('unity_unit_boss'))
        <p>{{$errors->first('unity_unit_boss')}}</p>
        @endif
        </div>
        <div class="form-group">
        <p>Secretaria</p>   
        <input type="text" class="form-control" name="unity_secretary" value="{{old('unity_secretary',$unidad->unity_secretary)}}" placeholder="Secretaria">        
        @if ($errors->has('unity_secretary'))
        <p>{{$errors->first('unity_secretary')}}</p>
        @endif
        </div>
        <div class="form-group">
        <p>Horario</p>   
        <input type="text" class="form-control" name="unity_horary" value="{{old('unity_horary',$unidad->unity_horary)}}" placeholder="Horario">        
        @if ($errors->has('unity_horary'))
        <p>{{$errors->first('unity_horary')}}</p>
        @endif
        </div>
        <div class="form-group">
        <p>Anexo</p>   
        <input type="text" class="form-control" name="unity_annexed" value="{{old('unity_annexed',$unidad->unity_annexed)}}" placeholder="Anexo">        
        @if ($errors->has('unity_annexed'))
        <p>{{$errors->first('unity_annexed')}}</p>
        @endif 
        <p>Funciones</p>   
        <input type="text" class="form-control" name="unity_functions" value="{{old('unity_functions',$unidad->unity_functions)}}" placeholder="Anexo">        
        @if ($errors->has('unity_functions'))
        <p>{{$errors->first('unity_functions')}}</p>
        @endif 
        </div>     
        {{ csrf_field() }}
        <div class="form-group">
        @if ($unidad->idunity===null)
        <input style="float:right;" type="submit" class="btn btn-info" name="command" value="Agregar" id="btnAgregar" />        
        @else
        <input style="float:right;" type="submit" class="btn btn-info" name="command" value="Actualizar" id="btnActualizar" />
        <input type="hidden" name="idunity" value="{{$unidad->idunity}}" >
        @endif                      
        </div>
    </div>  
                 
</div>
</form>
@endsection  