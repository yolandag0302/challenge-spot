<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Catastro;
use Illuminate\Http\Request;

class CatastroController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $catastros = Catastro::all();

        return response()->json([
            'status' => true,
            'catastros' => [],
        ]);
    }



    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Catastro  $catastro
     * @return \Illuminate\Http\Response
     */
    public function show(Catastro $catastro)
    {
        return response()->json([
            'status' => true,
            'catastro' => $catastro,
        ]);
    }
}
