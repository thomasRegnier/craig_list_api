<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\City;
use App\Models\Offer;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
       // $cat = Category::all();

        $cat = Category::with('sub_category')
            ->get();

        return response()
            ->json(['categories' => $cat]);
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
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category, Request $request)
    {
        //
        $city = City::firstWhere('slug', $request->cit);
        
        if(!$city){
            return response()
             ->json(["error"] ,400);
        }
        $category = Category::Where('slug', $request->cat)->firstOrFail();

        $offer = Offer::where('city_id', $city->id)
            ->where('category_id', $category->id)
            ->with("category")
            ->with('city')
            ->with('images')
            ->with('subCategory')
            ->orderBy('updated_at', 'asc')
            ->paginate(5);

        return response()
            ->json($offer);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        //
    }

    public function getCategory(Category $category, Request $request)
    {
        $category = Category::Where('slug', $request->slug)
                ->with('sub_category')
                ->firstOrFail();

        return response()
                ->json($category);
    }
}
