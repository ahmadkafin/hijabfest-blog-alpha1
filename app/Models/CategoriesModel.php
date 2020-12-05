<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoriesModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_categories';
    protected $fillable =
    [
        'category_name',
        'deleted_at'
    ];

    public function pivots()
    {
        return $this->hasMany(PivotsArticlesModel::class);
    }

}
