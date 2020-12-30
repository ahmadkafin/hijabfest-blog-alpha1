<?php

namespace App\Models;

use Cviebrock\EloquentSluggable\Sluggable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductsModel extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tbl_products';
    protected $fillable = [
        'sku_products',
        'products_name',
        'products_slugs',
        'products_weight',
        'products_dimension_width',
        'products_dimension_height',
        'products_dimension_wide',
        'products_qty',
        'products_price'
    ];

    public function images()
    {
        return $this->hasMany(ImagesProductsModel::class, 'products_id');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */

    public function sluggable(): array
    {
        return [
            'products_slugs' => [
                'source'   => 'products_name'
            ]
        ];
    }
}
