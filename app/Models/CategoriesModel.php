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
        return $this->hasMany(PivotsArticlesModel::class, 'id_categories');
    }

    public function articles()
    {
        return $this->belongsToMany(ArticlesModel::class, 'tbl_pivots_articles');
    }
}
