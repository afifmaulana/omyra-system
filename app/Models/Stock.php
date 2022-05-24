<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Stock extends Model
{
    use HasFactory;
    protected $guarded = [];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function brand()
    {
        return $this->belongsTo(Brand::class, 'brand_id', 'id');
    }

    public function BrandType()
    {
        return $this->belongsTo(BrandType::class,  'brand_type_id', 'id');
    }

    public function size()
    {
        return $this->belongsTo(Size::class, 'brand_size_id', 'id');
    }

    public function getStock()
    {
        $brandTypeId = $this->brand_type_id;
        $stockSemiFinished = SemiFinished::where('brand_type_id', $brandTypeId)->sum('total');
        $stockFinished = Finished::where('brand_type_id', $brandTypeId)->sum('total');
        $realStock = Stock::where('brand_type_id', $brandTypeId)->sum('stock_total');
        return $realStock - $stockSemiFinished - $stockFinished;
    }
}
