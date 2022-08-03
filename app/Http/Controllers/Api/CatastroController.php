<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Catastro;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CatastroController extends Controller
{
    /**
     * @param Request $request
     * @param int $zipCode
     * @param string $aggregate
     * @return \Illuminate\Http\JsonResponse
     */
    public function show(Catastro $catastro, Request $request, int $zipCode, string $aggregate)
    {
        $constructionType = $request->construction_type;
        if (!in_array($constructionType, [1, 2, 3, 4, 5, 6, 7])) {
            abort(404);
        }

        $payload = DB::select('SELECT "' . $aggregate . '" as type, ' . $aggregate . '(price_unit) AS price_unit, ' . $aggregate . '(price_unit_construction) as price_unit_construction, COUNT(*) AS elements FROM catastros WHERE uso_construccion= ? AND codigo_postal= ?', [$catastro->getUsoConstruccion($constructionType), $zipCode]);

        return response()->json([
            'status' => true,
            'payload' => $payload[0],
        ]);
    }
}
