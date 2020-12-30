<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ImagesProductsModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_products_image';
    protected $fillable =
    [
        'products_id',
        'images_name',
    ];
}
