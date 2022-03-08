@extends('Vuelo.layout')
  
@section('content')
<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Add New Vuelo</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('vuelo.index') }}"> Back</a>
        </div>
    </div>
</div>
   
@if ($errors->any())
    <div class="alert alert-danger">
        <strong>Whoops!</strong> There were some problems with your input.<br><br>
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
   
<form action="{{ route('vuelo.store') }}" method="POST">
    @csrf
    <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Company:</strong>
                <select name="company_id" class="form-control">
            @foreach($company as $companies)
                    <option value="{{$companies->id}}">{{$companies->nombre}}</option>
                    @endforeach
                </select>
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Salida:</strong>
                <input type="date" name="fecha_salida" class="form-control" placeholder="Fecha de Salida">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Fecha de Llegada:</strong>
                <input type="date" name="fecha_llegada" class="form-control" placeholder="Fecha de Llegada">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora de Salida:</strong>
                <input type="time" name="hora_salida" class="form-control" placeholder="Hora de Salida">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Hora de Llegada:</strong>
                <input type="time" name="hora_llegada" class="form-control" placeholder="Hora de Llegada">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Ciudad de destino:</strong>
                <select name="city_id_desti" class="form-control">
                    @foreach($cities as $cities)
                            <option value="{{$cities->id}}">{{$cities->nombre}}</option>
                            @endforeach
                        </select>
            </div>
            </div>
        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
        </div>
    </div>
   
</form>
@endsection