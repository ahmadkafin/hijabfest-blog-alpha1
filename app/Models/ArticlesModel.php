<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class ArticlesModel extends Model
{
    use HasFactory, Sluggable;

    protected $table = 'tbl_articles';
    protected $fillable = [
        'article_title',
        'article_slug',
        'article_content',
        'article_status',
        'article_url_video',
        'article_video_embeed',
    ];

    public function images()
    {
        return $this->hasMany(ArticlesImagesModel::class);
    }

    public function pivots()
    {
        return $this->hasMany(PivotsArticlesModel::class, 'id_articles');
    }

    public function category()
    {
        return $this->belongsToMany(ArticlesModel::class, 'tbl_pivots_articles', 'id_articles', 'id_categories');
    }

    /**
     * Return the sluggable configuration array for this model.
     *
     * @return array
     */
    public function sluggable()
    {
        return [
            'article_slug' => [
                'source' => 'article_title'
            ]
        ];
    }
}
