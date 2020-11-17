<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;
use App\Models\Device;
use App\Models\User;
use Illuminate\Support\Facades\Session;

class MaintenanceController extends Controller
{

    /**
     * Instantiate a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $maintenances = Maintenance::select('id', 'type','subtype' ,'device_id', 'created_at')->get();

        return view('maintenances.index')->with('maintenances', $maintenances);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('maintenances.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Retorna qual o ID do dispositivo baseado no serial inserido pelo usuário
        $device = Device::select('id')->where('serial', $request['device_id'])->get();

        // Separa o tipo e subtipo, inseridos pelo select único
        $typeArray = explode('/', $request['type']);

        // Sobrescreve as informação corretamente
        $request['type'] = $typeArray[0];
        $request['subtype'] = $typeArray[1];
        $request['device_id'] = strval($device[0]->id);

        $request->validate([
            'device_id' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'user_id' => 'required',
        ]);

        $maintenance = Maintenance::create($request->all());

        Session::flash('alert', array('success', 'Success', 'Maintenance created.'));
        return redirect()->route('maintenances.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $maintenance = Maintenance::find($id);

        $serial = Device::find($maintenance->device_id);

        $user = User::find($maintenance->user_id);

        return view('maintenances.show')->with('maintenance', $maintenance)->with('serial', $serial->serial)->with('user', $user->name);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $maintenance = Maintenance::find($id);

        $serial = Device::find($maintenance->device_id);

        return view('maintenances.edit')->with('maintenance', $maintenance)->with('serial', $serial->serial);
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

        // Separa o tipo e subtipo, inseridos pelo select único
        $typeArray = explode('/', $request['type']);

        // Sobrescreve as informação corretamente
        $request['type'] = $typeArray[0];
        $request['subtype'] = $typeArray[1];
    
        $request->validate([
            'device_id' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'user_id' => 'required',
        ]);

        $maintenance = Maintenance::find($id);

        $maintenance->update($request->all());

        Session::flash('alert', array('success', 'Success', 'Maintenance updated.'));
        return redirect()->route('maintenances.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $maintenance = Maintenance::find($id);

        $maintenance->delete();

        Session::flash('alert', array('success', 'Success', 'Maintenance removed.'));
        return redirect()->route('maintenances.index');
    }
}
