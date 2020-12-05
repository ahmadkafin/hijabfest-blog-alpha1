<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PivotsArticlesModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_pivots_articles';
    protected $fillable =
    [
        'id_articles',
        'id_categories' 
    ];
    
    public function articles()
    {
        return $this->belongsToMany(ArticlesModel::class);
    }

    public function categories()
    {
        return $this->belongsToMany(CategoriesModel::class);
    }
}
