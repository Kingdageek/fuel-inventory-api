<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Tank;
use App\Http\Resources\Tank as TankResource;
use App\Http\Resources\TankCollection;

class TankController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return ( new TankCollection( Tank::orderBy('id', 'DESC')->get() ) );
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
        $this->validate($request, [
            'serial_num' => 'required|unique:tanks|max:50',
            'capacity' => 'required|numeric',
            'fuel_type' => 'required'
        ]);

        $tank = Tank::create( $request->all() );

        // Stock left is initial tank capacity on creation
        $tank->stock_left = $tank->capacity;
        $tank->save();

        return ( new TankResource( $tank ) )
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Tank $tank)
    {
        return ( new TankResource( $tank ) );
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
    public function update(Request $request, Tank $tank)
    {
        // Ensure Updated capacity is not less than the stock left
        // String concatenation is for validator to be able compare the types

        $request['stock_left'] = ''. $tank->stock_left .'';
        $this->validate($request, [
            'serial_num' => 'required|max:50|unique:tanks,serial_num,' . $tank->id,
            'fuel_type' => 'required',
            'capacity' => 'required|numeric|gte:stock_left',
        ]);

        // Update all fields save stock_left
        $tank->update( $request->all() );

        return response()->json(['message' => 'Tank updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tank $tank)
    {
        $tank->delete();
        return response()->json(['message' => 'Tank deleted successfully'], 204);
    }
}
