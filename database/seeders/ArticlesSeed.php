<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\ArticlesModel;

class ArticlesSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 10; $i++) {
            ArticlesModel::insert([
                'article_title' => $faker->sentence($nbWords = 5, $variableNbWords = true),
                'article_slug'  => $faker->slug(),
                'article_content' => $faker->realText($maxNbChars = 250, $indexSize = 2),
                'article_status' => false,
            ]);
        }
    }
}
