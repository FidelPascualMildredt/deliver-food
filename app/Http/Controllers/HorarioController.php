<?php

namespace App\Http\Controllers;

use App\Models\Horario;
use Illuminate\Http\Request;

class HorarioController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $horario = Horario::paginate(5);
        return view('horario.index',compact('horario'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('horario.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $rules = [
            'dia' => 'required|in:Lunes,Martes,Miercoles,Jueves,Viernes, Sabado,Domingo',
            'hora_inicio' => 'required|unique:horarios,hora_inicio|min:5',
            'hora_final' => 'required|unique:horarios,hora_final|min:5'
        ];



        $this->validate($request, $rules);

        Horario::create([
            'dia' => $request->get('dia'),
            'hora_inicio' => $request->get('hora_final'),
            'hora_final' => $request->get('hora_final')
           ]);

           return back()->with('success','El horario se a creado correctamente');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $horario = horario::find($id);
        return view('horario.show', compact('horario'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $horario = horario::find($id);
        return view('horario.edit', compact('horario'));
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
        $horario = horario::find($id);


        $rules = [
            'dia' => "required|unique:horarios,dia,{$horario->id}|min:5",
            'hora_inicio' => 'required|unique:horarios,hora_inicio|min:5',
            'hora_final' => 'required|unique:horarios,hora_final|min:5'
        ];



        $this->validate($request, $rules);



       $horario->update([
        'dia' => $request->get('dia'),
        'hora_inicio' => $request->get('hora_final'),
        'hora_final' => $request->get('hora_final')
       ]);

       return back()->with('success','El horario se a actualizado correctamente');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
