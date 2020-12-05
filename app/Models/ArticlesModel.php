<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_articles';
    protected $fillable = [
        'article_title',
        'article_slug',
        'article_content',
        'article_status',
        'article_url_video',
        'article_video_embeed',
        'deleted_at'
    ];

    public function images()
    {
        return $this->hasMany(ArticlesImagesModel::class);
    }

    public function pivots()
    {
        return $this->hasMany(PivotsArticlesModel::class);
    }
}
