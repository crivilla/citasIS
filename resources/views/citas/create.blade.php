@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Crear cita</div>

                    <div class="panel-body">
                        @include('flash::message')

                        {!! Form::open(['route' => 'citas.store']) !!}

                        <div class="form-group">
                            {!! Form::label('fecha_hora', 'Fecha y hora de la cita') !!}
                            <input type="datetime-local" id="fecha_hora" name="fecha_hora" class="form-control" value="{{Carbon\Carbon::now()->format('Y-m-d\Th:i')}}" />
                        </div>

                        <div class="form-group">
                            {!!Form::label('medico_id', 'Medico') !!}
                            <br>
                            {!! Form::select('medico_id', $medicos, ['class' => 'form-control']) !!}
                        </div>
                        <div class="form-group">
                            {!!Form::label('paciente_id', 'Paciente') !!}
                            <br>
                            {!! Form::select('paciente_id', $pacientes, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('location_id', 'Hospital') !!}
                            <br>
                            {!! Form::select('location_id', $locations, ['class' => 'form-control']) !!}
                        </div>

                        <div class="form-group">
                            {!!Form::label('consulta_id', 'Consulta') !!}
                            <br>
                            {!! Form::select('consulta_id', $consultas, ['class' => 'form-control']) !!}
                        </div>




                        <div class="form-group">
                            <label name= "duracion" for="duracion"> Duración </label>
                            <select class="form-control" id="duracion" name="duracion">
                                <option value="15"> 15 </option>
                                <option value="20"> 20 </option>
                                <option value="25"> 25 </option>
                                <option value="30"> 30 </option>
                                <option value="35"> 35 </option>
                                <option value="40"> 40 </option>
                                <option value="45"> 45 </option>
                                <option value="50"> 50 </option>
                                <option value="55"> 55 </option>
                            </select>
                        </div>



                        {!! Form::submit('Guardar',['class'=>'btn-primary btn']) !!}

                        {!! Form::close() !!}
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection