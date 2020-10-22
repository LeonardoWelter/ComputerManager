<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Maintenance;

class MaintenanceController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $maintenances = Maintenance::select('id', 'type','subtype' ,'user_id', 'created_at')->get();

        return $maintenances;
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
            'device_id' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'user_id' => 'required',
        ]);

        $maintenance = Maintenance::create($request->all());

        return response()->json([
            'status' => 201,
            'message' => 'Success, new maintenance created.',
            'maintenance' => $maintenance,
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
        $maintenance = Maintenance::find($id);

        return $maintenance;
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
            'device_id' => 'required',
            'type' => 'required',
            'subtype' => 'required',
            'description' => 'required',
            'comments' => 'required',
            'user_id' => 'required',
        ]);

        $maintenance = Maintenance::find($id);

        $maintenance->update($request->all());

        return response()->json([
            'status' => 200,
            'message' => 'Success, maintenance updated.',
            'maintenance' => $maintenance,
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
        $maintenance = Maintenance::find($id);

        $maintenance->delete();

        return response()->json([
            'status' => 200,
            'message' => 'Success, maintenance removed.'
        ]);
    }
}
