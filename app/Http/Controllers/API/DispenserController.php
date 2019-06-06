<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Dispenser;
use App\Http\Resources\Dispenser as DispenserResource;
use App\Http\Resources\DispenserCollection;

class DispenserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // return Dispenser::all();
        return (new DispenserCollection(Dispenser::orderBy('id', 'DESC')->get()));
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
            'serial_num' => 'required|unique:dispensers|max:50',
            'num_of_nozzles' => 'required|numeric',
            'fuel_type' => 'required'
        ]);

        $dispenser = Dispenser::create($request->all());

        return ( new DispenserResource($dispenser) )
            ->response()
            ->setStatusCode(201);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Dispenser $dispenser)
    {
        return ( new DispenserResource( $dispenser ) );
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dispenser $dispenser)
    {
        // Unique in serial_num column, Ignore the current one.
        $this->validate($request, [
            'serial_num' => 'required|max:50|unique:dispensers,serial_num,'. $dispenser->id,
            'num_of_nozzles' => 'required|numeric',
            'fuel_type' => 'required'
        ]);

        $dispenser->update( $request->all() );
        return response()->json(['message' => 'Dispenser updated successfully']);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dispenser $dispenser)
    {
        $dispenser->delete();
        return response()->json(['message' => 'Dispenser deleted successfully'], 204);
    }
}
