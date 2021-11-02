@extends('city.layout')
 
@section('content')
    <div class="row" style="margin-top: 5rem;">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Ciudades</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-success" href="{{ route('city.create') }}"> Crear una nueva ciudad</a>
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
            <th>Nombre</th>
            <th width="280px">Acciones</th>
        </tr>
        @foreach ($data as $city)
        <tr>
            <td>{{ $city->id }}</td>
            <td>{{ $city->nombre }}</td>
            <td>
                <form action="{{ route('city.destroy',$city->id) }}" method="POST">
   
                    <a class="btn btn-info" href="{{ route('city.show',$city->id) }}">Mostrar</a>
    
                    <a class="btn btn-primary" href="{{ route('city.edit',$city->id) }}">Editar</a>
   
                    @csrf
                    @method('DELETE')
      
                    <button type="submit" class="btn btn-danger">Eliminar</button>
                </form>
            </td>
        </tr>
        @endforeach
@endsection