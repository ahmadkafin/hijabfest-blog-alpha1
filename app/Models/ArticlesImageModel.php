<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticlesImageModel extends Model
{
    use HasFactory;
    protected $table = 'tbl_articles_image';
    protected $fillable = ['id_articles', 'images_cover'];
}
