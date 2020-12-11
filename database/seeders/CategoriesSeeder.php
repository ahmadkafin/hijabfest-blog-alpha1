<?php

namespace Database\Seeders;

use App\Models\CategoriesModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_id');
        for ($i = 0; $i < 10; $i++) {
            CategoriesModel::insert([
                'category_name' => $faker->word(),
            ]);
        }
    }
}
