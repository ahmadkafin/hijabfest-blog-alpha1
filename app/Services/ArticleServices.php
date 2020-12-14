<?php

namespace App\Services;

use App\Models\ArticlesImageModel;
use Carbon\Carbon;


class ArticleServices
{
    public function popData($request)
    {
        $data = [
            'article_title'         => $request->article_title,
            'article_slug'          => $request->article_slug,
            'article_content'       => $request->article_content,
            'article_url_video'     => $request->article_url_video,
            'article_video_embeed'  => $request->article_video_embeed
        ];
        return $data;
    }

    public static function updateArticles($request, $articles)
    {
        $articles->update([
            'article_title'         => $request->article_title,
            'article_slug'          => $request->article_slug,
            'article_content'       => $request->article_content,
            'article_url_video'     => $request->article_url_video,
            'article_video_embeed'  => $request->article_video_embeed
        ]);
    }

    public function imageDrop($idArtikel, $file)
    {
        $this->imageRules();
        $now = Carbon::now()->format('D-m');
        $filename = md5($now) . "-" . $file->getClientOriginalName();
        $dir =  public_path() . '/img/articles';
        $file->move($dir, $filename);
        ArticlesImageModel::create([
            'id_articles'    => $idArtikel,
            'images_cover'  => $filename,
        ]);
    }

    private function imageRules()
    {
        $rules = array(
            'file'  => 'file|image|mimes:jpeg,png,jpg|max:2048'
        );

        return $rules;
    }
}
