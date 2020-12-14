<?php

namespace App\Services;

class ArticleServices
{

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
}
