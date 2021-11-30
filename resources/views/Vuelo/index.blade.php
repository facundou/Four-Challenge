@extends('vuelo.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Vuelos</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('vuelo.create') }}"> Crear una nueva ciudad</a>
            </div>
        </div>
    </div>
   
    @if ($message = Session::get('success'))
        <div class="alert alert-success">
            <p>{{ $message }}</p>
        </div>
    @endif
   
    
    <table class="table table-bordered">
        <tr>
            <th>No</th>
            <th>Nombre aerolinea</th>
            <th>Hora de despegue</th>
            <th>Hora de lleagada</th>
            <th>Ciudad origen</th>
            <th>Ciudad destino</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($data as $vuelo)
        <tr>
            <td>{{ $vuelo->id }}</td>
            <td>{{ $vuelo->name_aerolinea }}</td>
            <td>{{ $vuelo->hora_despegue }}</td>
            <td>{{ $vuelo->hora_llegada }}</td>
            <td>{{ $vuelo->ciudad_origen }}</td>
            <td>{{ $vuelo->ciudad_destino }}</td>

            <td>
                <form action="{{ route('city.destroy',$vuelo->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('city.show',$vuelo->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('city.edit',$vuelo->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
@endsection