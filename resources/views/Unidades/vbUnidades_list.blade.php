

@extends('PageMaster\_layout')

@section('content')
<div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12"> 
        <h1>{{ $title }}</h1>
                <table class="table">
                        <thead class="thead-light">
                          <tr>
                            <th scope="col">#</th>
                            <th scope="col">Nombre</th>
                            <th scope="col">Cargo</th>
                            <th scope="col">Correo</th>
                            <th scope="col">Ver</th>
                            <th scope="col">Detalle</th>
                            <th scope="col">Eliminar</th>
                          </tr>
                        </thead>
        @forelse ($unidades as $unidad)
              <tr>
                <th scope="row">-</th>
                <td>{{$unidad->unity_name}}</td>
                <td>{{$unidad->unity_in_charge}}</td>
                <td>{{$unidad->unity_email}}</td>
                <td><a href="{{route('unidad_ver',['id' => $unidad->idunity])}}"><span class="iconVer"></span></a></td>
                <td><a href="{{route('unidad_detalle',['id' => $unidad->idunity])}}"><span class="iconEdit"></span></a></td>
                <td scope="col">
                        <form action="{{route('unidad_eliminar', $unidad->idunity)}}" method="POST"> 
                        <button type="submit" value="Eliminar" class="btn btn-link iconDelete"></button>
                        {{ method_field('DELETE') }} 
                        {{ csrf_field() }}
                        </form>
                </td>
        @empty
            <p>No hay usuarios Registrados </p>
        @endforelse 
                </tr>
            </table>
        </div>
</div>
@endsection    

