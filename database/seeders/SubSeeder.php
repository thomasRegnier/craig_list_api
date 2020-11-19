<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Str;
use App\Models\SubCategory;

class SubSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $sub = [
            [
                'category_id' => 1,
                'name' => 'achat',
                'slug' => Str::of('achat')->slug('-'),
            ],
            [
                'category_id' => 1,
                'name' => 'location',
                'slug' => Str::of('location')->slug('-'),
            ],
            [
                'category_id' => 2,
                'name' => 'camping',
                'slug' => Str::of('camping')->slug('-'),
            ],
            [
                'category_id' => 2,
                'name' => 'appartement',
                'slug' => Str::of('appartement')->slug('-'),
            ],
            [
                'category_id' => 2,
                'name' => 'villa',
                'slug' => Str::of('villa')->slug('-'),
            ],
            [
                'category_id' => 3,
                'name' => 'dépannage',
                'slug' => Str::of('dépannage')->slug('-'),
            ],
            [
                'category_id' => 3,
                'name' => 'occasion',
                'slug' => Str::of('occasion')->slug('-'),
            ],
            [
                'category_id' => 3,
                'name' => 'neuf',
                'slug' => Str::of('développement')->slug('-'),
            ],
            [
                'category_id' => 4,
                'name' => 'neuf',
                'slug' => Str::of('neuf')->slug('-'),
            ],
            [
                'category_id' => 4,
                'name' => 'occasion',
                'slug' => Str::of('occasion')->slug('-'),
            ],
            [
                'category_id' => 4,
                'name' => 'location',
                'slug' => Str::of('location')->slug('-'),
            ],
            [
                'category_id' => 5,
                'name' => 'canapé',
                'slug' => Str::of('canapé')->slug('-'),
            ],
            [
                'category_id' => 5,
                'name' => 'table',
                'slug' => Str::of('table')->slug('-'),
            ],
            [
                'category_id' => 6,
                'name' => 'lave vaisselle',
                'slug' => Str::of('lave vaisselle')->slug('-'),
            ],
            [
                'category_id' => 6,
                'name' => 'lave linge',
                'slug' => Str::of('lave linge')->slug('-'),
            ],
            [
                'category_id' => 6,
                'name' => 'réfrégirateur',
                'slug' => Str::of('réfrégirateur')->slug('-'),
            ],
        ];
        foreach ($sub as $s) {
            SubCategory::create($s);
        }
    }
}
