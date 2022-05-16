<?php

namespace App\Http\Controllers\API;

use App\Helpers\Sql;
use App\Http\Controllers\Controller;
use App\Models\BrandType;
use Illuminate\Http\Request;

class BrandController extends Controller
{



    public function getTypes(Request $request)
    {
        $brandId = $request->brand_id;
        $boxType = $request->box_type;
        $query = BrandType::where('brand_id', $brandId)->where('box_type', $boxType);
        $datas = $query->get();
        $sql = Sql::getSqlWithBindings($query);
        $res = [
            'data' => $datas,
            'sql' => $sql,
        ];
        return $res;
    }
}
