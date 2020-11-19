<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Faker\Factory as Faker;
use App\Models\Offer;

class OfferSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
    //    Offer::factory()->count(10)->make();

        $offers = [

            [
                'title' => 'test',
                'description' => 'Une description en test',
                'city_id' => 1,
                'category_id' => '4',
                'user_id' => 1,
                'subcategory_id' => 4
            ]
        ];

        foreach ($offers as $offer) {
            for($i = 0; $i < 10 ; $i++)
            Offer::create([
                'title' => $offer['title'] . $i,
                'description' => $offer['description'] . $i,
                'city_id' => $offer['city_id'],
                'category_id' => $offer['category_id'],
                'user_id' => $offer['user_id'],
                'subcategory_id' => $offer['subcategory_id']
            ]);
        }

    }
}
