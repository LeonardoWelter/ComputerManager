<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;
use Illuminate\Support\Facades\Session;

class DeviceController extends Controller
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
        $devices = Device::select('id', 'serial','oem' ,'model', 'name')->paginate(10);

        return view('devices.index')->with('devices', $devices);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('devices.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'serial' => 'required',
            'oem' => 'required',
            'model' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'psu' => 'required',
            'mac' => 'required',
            'name' => 'required',
            'os' => 'required',
        ]);

        $device = Device::create($request->all());

        Session::flash('alert', array('success', 'Success', 'Device created.'));
        return redirect()->route('devices.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $device = Device::find($id);

        return view('devices.show')->with('device', $device);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $device = Device::find($id);

        return view('devices.edit')->with('device', $device);
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
        $request->validate([
            'serial' => 'required',
            'oem' => 'required',
            'model' => 'required',
            'cpu' => 'required',
            'ram' => 'required',
            'storage' => 'required',
            'psu' => 'required',
            'mac' => 'required',
            'name' => 'required',
            'os' => 'required',
        ]);

        $device = Device::find($id);

        $device->update($request->all());

        Session::flash('alert', array('success', 'Success', 'Device updated.'));
        return redirect()->route('devices.show', ['device' => $device->id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $device = Device::find($id);

        $device->delete();

        Session::flash('alert', array('success', 'Success', 'Device removed.'));
        return redirect()->route('devices.index');
    }
}
