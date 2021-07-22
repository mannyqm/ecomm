<?php

namespace App\Http\Controllers;

use App\Models\talla;
use Illuminate\Http\Request;

class TallaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Talla::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\talla  $talla
     * @return \Illuminate\Http\Response
     */
    public function show(talla $talla)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\talla  $talla
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, talla $talla)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\talla  $talla
     * @return \Illuminate\Http\Response
     */
    public function destroy(talla $talla)
    {
        //
    }
}
