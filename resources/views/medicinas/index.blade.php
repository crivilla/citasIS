
@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Medicinas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'medicinas.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear medicina', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}

                        <br><br>
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre Común</th>
                                <th>Composición</th>
                                <th>Presentación</th>
                                <th>Web Link</th>


                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($medicinas as $medicina)


                                <tr>
                                    <td>{{ $medicina->name }}</td>
                                    <td>{{ $medicina->composicion }}</td>
                                    <td>{{ $medicina->presentacion }}</td>
                                    <td>{{ $medicina->link}}</td>


                                    <td>
                                        {!! Form::open(['route' => ['medicinas.edit',$medicina->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['medicinas.destroy',$medicina->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está seguro?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
@endsection