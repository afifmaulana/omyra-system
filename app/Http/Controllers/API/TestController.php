<?php

namespace App\Http\Controllers\API;

use App\Http\Controllers\Controller;
use App\Models\Stock;
use Illuminate\Http\Request;

class TestController extends Controller
{
    public function test($id)
    {
        $stock = Stock::find($id);

        return response()->json([
            'stock' => $stock,
            'stock_left' => $stock->getStock(),
        ]);
    }
}
