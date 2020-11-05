<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Device;

class DeviceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public static function index()
    {
        $devices = Device::select('id', 'serial','oem' ,'model', 'name')->get();

        return $devices;
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
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

        return response()->json([
            'status' => 201,
            'message' => 'Success, new device created.',
            'device' => $device,
        ]);
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

        return $device;
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

        return response()->json([
            'status' => 200,
            'message' => 'Success, device updated.',
            'device' => $device,
        ]);
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

        return response()->json([
            'status' => 200,
            'message' => 'Success, device removed.'
        ]);
    }
}
