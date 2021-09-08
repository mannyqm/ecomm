<?php

namespace App\Http\Controllers;

use App\Models\Imagen;
use Faker\Provider\Image;
use Illuminate\Http\Request;

class ImagenController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return Imagen::get();
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {        
        $img = new Imagen;
        // $this->validate($request,[
        //     'imagen' => 'required|imagen|mimes:jpeg,png,jpg,gif,svg',
        // ]);
        

        $image = request()->file('imagen');
        $imageName = $image->getClientOriginalName();
        $imageName = time().'_'.$imageName;
        $image->move(public_path('/imagenes'), $imageName);

        
        $img->imagen = 'imagenes/'.$imageName;
        $img->save();
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function show(Imagen $imagen)
    {
        return $imagen;
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Imagen $imagen)
    {
        $imagen->update($request->all());
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Imagen  $imagen
     * @return \Illuminate\Http\Response
     */
    public function destroy(Imagen $imagen)
    {
        $imagen->delete();
    }
}
