@extends('company.layout')
 
@section('content')
    
<div class="row" style="margin-top: 5rem;">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Companies</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-success" href="{{ route('company.create') }}"> Crear una nueva ciudad</a>
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
        <th>Descripcion</th>
        <th>Disponibilidad</th>
        <th width="280px">Acciones</th>
    </tr>
    @foreach ($data as $company)
    <tr>
        <td>{{ $company->id }}</td>
        <td>{{ $company->nombre }}</td>
        <td>{{ $company->descripcion }}</td>
        <td>@if($company->disponibilidad == 1)
                <span class="label label-success">Disponible</span>
            @else
                <span class="label label-danger">No disponible</span>
            @endif
        </td>
        <td>
            <form action="{{ route('company.destroy',$company->id) }}" method="POST">

                <a class="btn btn-info" href="{{ route('company.show',$company->id) }}">Mostrar</a>

                <a class="btn btn-primary" href="{{ route('company.edit',$company->id) }}">Editar</a>

                @csrf
                @method('DELETE')
  
                <button type="submit" class="btn btn-danger">Eliminar</button>
            </form>
        </td>
    </tr>
    @endforeach
@endsection