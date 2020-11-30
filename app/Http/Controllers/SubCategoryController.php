<?php

namespace App\Http\Controllers;

use App\Models\SubCategory;
use App\Models\Category;
use App\Models\City;
use App\Models\Offer;
use Illuminate\Http\Request;

class SubCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function show(SubCategory $subCategory, Request $request)
    {
        $city = City::firstWhere('slug', $request->city);

        if (!$city) {
            return response()
                ->json(["error"], 400);
        }
        $category = Category::firstWhere('slug', $request->cat);

        if (!$category) {
            return response()
                ->json(["error"], 400);
        }

        $sub = SubCategory::Where('slug', $request->slug)->firstOrFail();

        $offer = Offer::where('city_id', $city->id)
        ->where('subcategory_id', $sub->id)
        ->where('category_id', $category->id)
        ->with("category")
        ->with('subCategory')
        ->with('images')
        ->with('city')
        ->orderBy('updated_at', 'desc')
        ->paginate(5);

    return response()
        ->json($offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(SubCategory $subCategory)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SubCategory $subCategory)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SubCategory  $subCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(SubCategory $subCategory)
    {
        //
    }
}
