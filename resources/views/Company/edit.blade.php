@extends('company.layout')
   
@section('content')
    <div class="row">
        <div class="col-lg-12 margin-tb">
            <div class="pull-left">
                <h2>Edit ciudad</h2>
            </div>
            <div class="pull-right">
                <a class="btn btn-primary" href="{{ route('company.index') }}"> Back</a>
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
    
       
    <form action="{{ route('company.update',$Company->id) }}" method="POST">
        @csrf
        @method('PUT')
   
         <div class="row">
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Nombre:</strong>
                    <input type="text" name="nombre" value="{{$Company->nombre}}" class="form-control" placeholder="Nombre">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Descripcion:</strong>
                    <input type="text" name="descripcion" value="{{$Company->descripcion}}" class="form-control" placeholder="Descripcion">
                </div>
            </div>
            <div class="col-xs-12 col-sm-12 col-md-12">
                <div class="form-group">
                    <strong>Disponibilidad:</strong>
                    <select class="form-control" name="disponibilidad" >
                        @if ($Company->disponibilidad==1)
                            <option value="1" selected>Disponible</option>
                            <option value="0">No Disponible</option>
                        @else
                            <option value="1">Disponible</option>
                            <option value="0" selected>No Disponible</option>
                        
                        @endif
                    </select>
                 </div>

            </div>
            <div class="col-xs-12 col-sm-12 col-md-12 text-center">
                <button type="submit" class="btn btn-primary">Submit</button>
          
            </div>
        </div>
    </form>

   
@endsection