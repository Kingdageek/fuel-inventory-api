<?php

namespace App\Http\Controllers\API;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\TankStock;
use App\Tank;
use App\Http\Resources\TankStock as TankStockResource;

class TankStockController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Tank $tank)
    {
        return TankStockResource::collection(
            $tank->tank_stocks
        );
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
    public function store(Request $request, Tank $tank)
    {
        // Ensure that closing_stock is less than or equal to stock_left
        $request['stock_left'] = ''. $tank->stock_left .'';
        $this->validate($request, [
            'closing_stock' => 'required|numeric|lte:stock_left'
        ]);

        $tank_stock = $tank->tank_stocks()->create( $request->all() );

        // Update the tank's stock
        $tank->stock_left = $tank_stock->closing_stock;
        $tank->save();

        return ( new TankStockResource( $tank_stock ) )
            ->response()
            ->setStatusCode(201);
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
        //
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
