<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Cita;
use App\Medico;
use App\Paciente;
use App\Location;

use Carbon\Carbon;


class CitaController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $citas = Cita::all();

        return view('citas/index',['citas'=>$citas]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $medicos = Medico::all()->pluck('full_name','id');
        $pacientes = Paciente::all()->pluck('full_name','id');
        $locations = Location::all()->pluck('hospital','id');
        $locationsConsulta = Location::all()->pluck('consulta','id');
        //$locations = Location::all()->pluck('fullLocation','id');

        return view('citas/create',['medicos'=>$medicos, 'pacientes'=>$pacientes, 'locations'=>$locations, 'locationsConsulta'=>$locationsConsulta]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'location_id' => 'required|max:255',
            'duracion' => 'required|max:255',
        ]);

        $cita = Cita::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'fecha_hora' => $request->fecha_hora,
            'location_id' => $request->location_id,
            'duracion' => $request->duracion,
            'hora_fin' => Carbon::parse($request['fecha_hora'])->modify("+{$request['duracion']} minutes")

        ]);

        $cita->save();

        flash('Cita creada correctamente');

        return redirect()->route('citas.index');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {

        $cita = Cita::find($id);

        $medicos = Medico::all()->pluck('full_name','id');
        $pacientes = Paciente::all()->pluck('full_name','id');
        $locations = Location::all()->pluck('hospital','id');
        $locationsConsulta = Location::all()->pluck('consulta','id');

        return view('citas/edit',['cita'=> $cita, 'medicos'=>$medicos, 'pacientes'=>$pacientes, 'locations'=>$locations, 'locationsConsulta'=>$locationsConsulta]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [

            'medico_id' => 'required|exists:medicos,id',
            'paciente_id' => 'required|exists:pacientes,id',
            'fecha_hora' => 'required|date|after:now',
            'location_id' => 'required|max:255',
            'duracion' => 'required|max:255',
        ]);
        $cita = Cita::find($id);

       //$cita->fill($request->all());
        /*
       $cita->fill([$request->medico_id,
            $request->paciente_id,
            $request->fecha_hora,
            //'localizacion' => $request->localizacion,
           $request->duracion,
            Carbon::parse($request['fecha_hora'])->modify("+{$request['duracion']} minutes")->format('Y-m-d\Th:i')
        ]);*/

        $cita2 = Cita::create([
            'medico_id' => $request->medico_id,
            'paciente_id' => $request->paciente_id,
            'fecha_hora' => $request->fecha_hora,
            'location_id' => $request->location_id,
            'duracion' => $request->duracion,
            'hora_fin' => Carbon::parse($request['fecha_hora'])->modify("+{$request['duracion']} minutes")
        ]);

        $cita->delete();
        $cita2->save();

        flash('Cita modificada correctamente');

        return redirect()->route('citas.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cita = Cita::find($id);
        $cita->delete();
        flash('Cita borrada correctamente');

        return redirect()->route('citas.index');
    }
}
