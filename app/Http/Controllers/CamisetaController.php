<?php

namespace App\Http\Controllers;

use App\Models\camiseta;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class CamisetaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Camiseta::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $camiseta = new Camiseta;
        $camiseta->create($request->all());
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\camiseta  $camiseta
     * @return \Illuminate\Http\Response
     */
    public function show(camiseta $camiseta)
    {
        return $camiseta;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\camiseta  $camiseta
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, camiseta $camiseta)
    {
        $camiseta->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\camiseta  $camiseta
     * @return \Illuminate\Http\Response
     */
    public function destroy(camiseta $camiseta)
    {
        $camiseta->delete();
    }
}
