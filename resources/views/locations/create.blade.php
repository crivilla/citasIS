@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear localización</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'locations.store']) !!}
                        <div class="form-group">
                            {!! Form::label('hospital', 'Nombre del hospital') !!}
                            {!! Form::text('hospital',null,['class'=>'form-control', 'required', 'autofocus']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('consulta_id', ' Consulta') !!}
                            <br>
                            {!! Form::select('consulta_id', $consultas, ['class' => 'form-control', 'required']) !!}
                        </div>


                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection