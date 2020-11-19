<?php

namespace Database\Seeders;
use App\Models\Category;
use Illuminate\Support\Str;

use Illuminate\Database\Seeder;

class CategoriesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $categories = [
            [
                'name' => 'immobilier',
                'image' => 'https://www.leboncoin.fr/_next/static/immobilier-db5bdd7c.jpg',
                'color' => '#0066CC',
                'slug' => Str::of('immobilier')->slug('-'),
                'icon' => 'bx bxs-building-house'
            ],
            [
                'name' => 'vacances',
                'image' => 'https://www.leboncoin.fr/_next/static/vacances-5abd217f.jpg',
                'color' => '#FFB01D',
                'slug' => Str::of('vacances')->slug('-'),
                'icon' => 'bx bx-sun'

            ],
            [
                'name' => 'informatique',
                'image' => 'https://www.leboncoin.fr/_next/static/informatique-a63ba837.jpg',
                'color' => '#00C438',
                'slug' => Str::of('informatique')->slug('-'),
                'icon' => 'bx bx-desktop'

            ],
            [
                'name' => 'voitures',
                'image' => 'https://www.leboncoin.fr/_next/static/voitures-5866ab03.jpg',
                'color' => '#0040C1',
                'slug' => Str::of('voitures')->slug('-'),
                'icon' => 'bx bxs-car'

            ],
            [
                'name' => 'ameublement',
                'image' => 'https://www.leboncoin.fr/_next/static/ameublement-d8b2e91d.jpg',
                'color' => '#FFDB61',
                'slug' => Str::of('ameublement')->slug('-'),
                'icon' => 'bx bx-chair'
            ],
            [
                'name' => 'electromenager',
                'image' => 'https://www.leboncoin.fr/_next/static/electromenager-bb329a62.jpg',
                'color' => '#996DFF',
                'slug' => Str::of('electromenager')->slug('-'),
                'icon' => 'bx bxs-washer'
            ]
        ];

        foreach ($categories as $category) {
            Category::create($category);
        }

    }
}
