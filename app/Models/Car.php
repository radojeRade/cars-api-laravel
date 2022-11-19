<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Car extends Model
{
    use HasFactory;
    protected $table = 'cars';

    protected $fillable = ['brand', 'model', 'year', 'max_speed','is_automatic','engine','number_of_doors'];

    public function scopeSearchByBrand( $query, $brand) //$query,$brand
    {
        // if (!$brand) {
        //     return $query;
        // }
        return $query->where('brand', 'LIKE','%'. $brand.'%');
    }

    public function scopeSearchByModel($query,$model)//$query, $model
    {
        // if (!$model) {
        //     return $query;
        // }
        // return self::where('model', $model);
        return $query->where('model', 'LIKE','%'. $model.'%');
    }
}
