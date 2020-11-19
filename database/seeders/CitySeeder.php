<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\City;
use Illuminate\Support\Str;

class CitySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        $cities = [
            [
                "name" => "Paris",
                "code" => "75000",
                "picture" =>"https://cdn.paris.fr/paris/2020/04/06/huge-9b08ad1f0c7bacc8e2b9add420fccfe1.jpg"
            ],
            [
                "name" => "Marseille",
                "code" => "13000",
                "picture" =>"https://cdn-media.rtl.fr/cache/7eMBPymYBtpXGeDtrSqylA/880v587-0/online/image/2020/0915/7800807525_une-vue-du-port-de-marseille-illustration.jpg"
        
            ],
            [
                "name" => "Lyon",
                "code" => "69000",
                "picture" =>"https://www.lyonmag.com/medias/images/lyon-4k.jpg"
        
            ],
            [
                "name" => "Toulouse",
                "code" => "31000",
                "picture" =>"https://cdn-media.rtl.fr/cache/4205MTQY_2Ba0ihbeW2Mtg/880v587-0/online/image/2019/1205/7799630576_une-vue-de-la-ville-de-toulouse.jpg"
        
            ],
            [
                "name" => "Nice",
                "code" => "06000",
                "picture" =>"https://luxus-plus.com/wp-content/uploads/2020/03/Nice-PACA-French-riviera.jpg"
            ],
            [
                "name" => "Nantes",
                "code" => "44000",
                "picture" =>"https://static.latribune.fr/1052422/nantes-ville.png"
            ],
            [
                "name" => "Montpellier",
                "code" => "34000",
                "picture" =>"https://paris-jetequitte.com/wp-content/uploads/2018/12/travailler-montpellier-17.-Foch.jpg"
            ],
            [
                "name" => "Strasbourg",
                "code" => "67000",
                "picture" =>"https://static.latribune.fr/1453314/strasbourg-cathedrale.jpg"
            ],
            [
                "name" => "Bordeaux",
                "code" => "33000",
                "picture" => "https://www.causeur.fr/wp-content/uploads/2019/04/bordeaux-juppe-gilets-jaunes-mamere.jpg"
            ],
            [
                "name" => "Lille",
                "code" => "59000",
                "picture" => "https://cdn.radiofrance.fr/s3/cruiser-production/2020/01/8db073e2-5323-494b-afc8-6f508d58216f/1136_gettyimages-1167757568.jpg"
            ],
            [
                "name" => "Rennes",
                "code" => "35000",
                "picture" => "https://paris-jetequitte.com/wp-content/uploads/2018/04/partir-vivre-rennes-Ambiance_Terrasse_Destination_Rennes_JM_17.jpg"
            ],
            [
                "name" => "Reims",
                "code" => "51000",
                "picture" => "https://media.routard.com/image/85/1/reims.1562851.jpg"
            ],
            [
                "name" => "Saint-Étienne",
                "code" => "42000",
                "picture" => "https://cdn-s-www.leprogres.fr/images/08B1E49B-437F-48E6-A400-3E8F986312F1/NW_raw/saint-etienne-est-souvent-autre-que-ce-que-l-on-croit-photo-le-progres-philippe-vacher-1552777762.jpg"
            ],
            [
                "name" => "Toulon",
                "code" => "83000",
                "picture" => "https://blog.babasport.fr/wp-content/uploads/2019/11/toulon-1.jpg"
            ],
            [
                "name" => "Le Havre",
                "code" => "76000",
                "picture" => "https://pagtour.info/wp-content/uploads/2019/05/LE-HAVRE.jpg"
            ],
            [
                "name" => "Grenoble",
                "code" => "38000",
                "picture" => "https://drivy.imgix.net/cities/FR/location-voiture-grenoble-getaround.jpg"
            ],
            [
                "name" => "Dijon",
                "code" => "21000",
                "picture" => "https://upload.wikimedia.org/wikipedia/commons/7/71/Vue_panoramique_de_Dijon_07.jpg"
            ],
            [
                "name" => "Angers",
                "code" => "49000",
                "picture" => "https://www.angers.villactu.fr/wp-content/uploads/sites/6/2018/02/Ch%C3%A2teau-dAngers-1280x720.jpg"
            ],
            [
                "name" => "Nîmes",
                "code" => "30000",
                "picture" => "https://www.tourisme.fr/images/otf_offices/858/arenes-de-nimes-vue-du-ciel-photo-l-boudereaux-2-.jpg"
            ],
            [
                "name" => "Saint-Denis",
                "code" => "97000",
                "picture" => "https://www.sortiraparis.com/images/80/77153/396325-monument-jeu-d-enfant-2018-a-la-basilique-de-saint-denis.jpg"
            ],
            [
                "name" => "Villeurbanne",
                "code" => "69000",
                "picture" => "https://cdn-s-www.leprogres.fr/images/76ADE0E4-C779-4ED9-A29F-07F25C5E2C85/NW_raw/les-gratte-ciel-de-villeurbanne-photo-jean-christophe-morera-1407089731.jpg"
            ],
            [
                "name" => "Clermont-Ferrand",
                "code" => "63000",
                "picture" => "https://static4.mclcm.net/iod/images/v2/69/citytheque/localite_101_297/1200x630_100_300_000000x30x0.jpg"
            ],
            [
                "name" => "Le Mans",
                "code" => "72000",
                "picture" => "https://www.kandbaz.com/wp-content/uploads/2020/07/banner-ville-lemans.jpg"
            ],
            [
                "name" => "Aix-en-Provence",
                "code" => "13000",
                "picture" => "https://static.trainlinecontent.com/content/vul/hero-images/city/aix-en-provence/2x.jpg"
            ],
            [
                "name" => "Brest",
                "code" => "29000",
                "picture" => "https://www.brest.fr/fileadmin/imported_for_brest/fileadmin/Images/Au_quotidien/Bouger_se_divertir/Ete_a_Brest/DL_MLG_DSC_5567.jpg"
            ],
            [
                "name" => "Tours",
                "code" => "37000",
                "picture" => "https://upload.wikimedia.org/wikipedia/commons/c/ca/Tram_et_h%C3%B4tel_de_ville_de_Tours.JPG"
            ],
            [
                "name" => "Amiens",
                "code" => "80000",
                "picture" => "https://media.routard.com/image/24/9/amiens.1556249.jpg"
            ],
            [
                "name" => "Limoges",
                "code" => "87000",
                "picture" => "https://www.terre.tv/wp-content/uploads/2020/04/Limoges.jpg"
            ],
            [
                "name" => "Annecy",
                "code" => "74000",
                "picture" => "https://blog.mobilboard.com/wp-content/uploads/2014/11/visiter-annecy.jpg"
            ],
            [
                "name" => "Perpignan",
                "code" => "66000",
                "picture" => "https://www.kikimagtravel.fr/wp-content/uploads/2017/05/20170510_132741681_iOS-1170x730.jpg"
            ]
            ];
    
            foreach ($cities as $city) {
                City::create([
                    'name' => $city['name'],
                    'code' => $city['code'],
                    'picture' => $city['picture'],
                    'slug' => Str::of($city['name'])->slug('-')
                ]);
            }
    }
}
