<?php

namespace Database\Seeders;

use App\Models\ProductsModel;
use Illuminate\Database\Seeder;
use Faker\Factory as Faker;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $faker = Faker::create('id_ID');
        for ($i = 0; $i < 25; $i++) {
            ProductsModel::insert([
                'sku_products'  => $faker->numerify('IHFPRD#####'),
                'products_name' => $faker->sentence($nbwords = 3, $variableNbWords = true),
                'products_slugs' => $faker->slug(),
                'products_weight' => $faker->numberBetween($min = 1, $max = 10),
                'products_dimension_width' => $faker->numberBetween($min = 100, $max = 200),
                'products_dimension_height' => $faker->numberBetween($min = 100, $max = 200),
                'products_dimension_wide' => $faker->numberBetween($min = 100, $max = 200),
                'products_qty' => $faker->numberBetween($min = 1, $max = 200),
                'products_price' => $faker->randomFloat($nbMaxDecimals = 2, $min = 1000, $max = 2000000000)
            ]);
        }
    }
}
