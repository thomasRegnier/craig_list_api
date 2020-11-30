<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Image as myImage;
use Image;
use Validator;
use JD\Cloudder\Facades\Cloudder;
use Illuminate\Support\Str;

class OfferController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        //   $request->header('Authorization');



        $city =  City::where('slug', $request['city'])->firstOrFail();

        if (Auth::guard('sanctum')->user()) {
            $auth =  Auth::guard('sanctum')->user();

            $arrayHiden = [];

            foreach($auth->hidens as $hiden){
                array_push($arrayHiden, $hiden['offer_id']);
            }

            $offers = Offer::where('city_id', $city->id)
            ->whereNotIn('id', $arrayHiden)
            ->with('user')
            ->with('city')
            ->with('subCategory')
            ->with('category')
            ->with('images')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        }else{
            $offers = Offer::where('city_id', $city->id)
            ->with('user')
            ->with('city')
            ->with('subCategory')
            ->with('category')
            ->with('images')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        }




        return response()
            ->json(['offers' => $offers]);
    }

    public function ads(Request $request)
    {
        $offers = Offer::where('user_id', $request->user()->id)
            ->with('city')
            ->with('subCategory')
            ->with('category')
            ->with('images')
            ->orderBy('updated_at', 'desc')
            ->paginate(5);
        //    ->get();

        return response()
            ->json(['offers' => $offers]);
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
        /*         return response()
                ->json(['error' => $request->all()]); */
        if($request->file('images')){
            if (count($request->file('images')) > 24) {
                return response()
                    ->json(['error' => "too much images"], 400);
            }
        }


        $city =  City::where('slug', $request['city'])->firstOrFail();

        // 'unique:offers'
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            //    'image' => ['string','nullable'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'integer'],
            'subcategory' => ['required', 'integer'],
            'city' => ['required', 'string']
        ]);

        if ($validation->fails()) {
            $message = $validation->messages()->toArray();
            return response()
                ->json(['error' => $message], 422);
        }

        $slug = Str::of($request->title)->slug('-');

        $offer =  Offer::create([
            'title' => $request->title,
            'description' => $request->description,
            'city_id' => $city->id,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'slug' => $slug
        ]);




        if ($request->file('images')) {
            foreach ($request->file('images') as $file) {

/*                 $originalImage = $file;
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path() . '/thumbnail/';
                $originalPath = public_path() . '/images/';
                $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
                $thumbnailImage->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName()); */

                $unique = uniqid();
                
                   Cloudder::upload($file, "thumbnail/".$unique,
                   [
                   'resource_type' => 'image',
                   'transformation' => array(
                     array('width' => 300, 'height' => 480, 'crop' => 'limit'),
                   )
                   ]);
                    $cloundary_upload = Cloudder::getResult();

                    Cloudder::upload($file, "normal/".$unique);

                $newImage = myImage::create([
                    'url_path' => $unique,
                    'offer_id' => $offer->id,
                ]);
            }
        }

        return response()
            ->json(['offer' =>
            Offer::where('id', $offer->id)
                ->with('city')
                ->with('category')
                ->with('subCategory')
                ->get()]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function show(Offer $offer, $id)
    {
        //
        $offer = $offer::where('id', $id)
            ->with('city')
            ->with('category.sub_category')
            ->with('subCategory')
            ->with('images')
            ->with('user')
            ->get();
        if(count($offer) > 0)    {
            return response()
            ->json(['offer' => $offer]);
        }else{
            return response()
            ->json(['error' => "error"], 404);
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, Offer $offer)
    {

        $offer = Offer::find($request['id']);

        $city =  City::where('slug', $request['city'])->firstOrFail();

        // 'unique:offers'
        $validation = Validator::make($request->all(), [
            'title' => ['required', 'string'],
            //    'image' => ['string','nullable'],
            'description' => ['string', 'nullable'],
            'category' => ['required', 'integer'],
            'subcategory' => ['required', 'integer'],
            'city' => ['required', 'string']
        ]);

        if ($validation->fails()) {
            $message = $validation->messages()->toArray();
            return response()
                ->json(['error' => $message], 422);
        }

        $slug = Str::of($request->title)->slug('-');


        $offer->update([
            'title' => $request->title,
            'description' => $request->description,
            'city_id' => $city->id,
            'user_id' => Auth::user()->id,
            'category_id' => $request->category,
            'subcategory_id' => $request->subcategory,
            'slug' => $slug
        ]);

        if ($request->file('images')) {
            foreach ($request->file('images') as $file) {
                $originalImage = $file;
                $thumbnailImage = Image::make($originalImage);
                $thumbnailPath = public_path() . '/thumbnail/';
                $originalPath = public_path() . '/images/';
                $thumbnailImage->save($originalPath . time() . $originalImage->getClientOriginalName());
                // $thumbnailImage->resize(150,150);
                $thumbnailImage->resize(300, null, function ($constraint) {
                    $constraint->aspectRatio();
                });
                $thumbnailImage->save($thumbnailPath . time() . $originalImage->getClientOriginalName());

                //    Cloudder::upload($thumbnailImage);
                //    $cloundary_upload = Cloudder::getResult();

                $newImage = myImage::create([
                    'url_path' => time() . $originalImage->getClientOriginalName(),
                    'offer_id' => $offer->id,
                ]);
            }
        }

        return response()
            ->json(['annonce' => $offer]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Offer $offer)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Offer  $offer
     * @return \Illuminate\Http\Response
     */
    public function destroy(Offer $offer, Request $request)
    {
        //

        $offer = Offer::findOrFail($request['id']);

        if (count($offer->images) > 0) {
            foreach ($offer->images as $img) {
                $i = myImage::find($img['id']);
                unlink(public_path() . '/thumbnail/' . $i->url_path);
                unlink(public_path() . '/images/' . $i->url_path);
                $i->delete();
            }
        }

        $offer->delete();
    }

    public function search(Offer $offer, Request $request)
    {
        
       
       
        $annonces =  Offer::where('title', 'LIKE', '%'. $request['research'] .'%')
                    ->with('images')
                    ->with('city')
                    ->with('subCategory')
                    ->with('category')
                    ->get();

        return response()
                    ->json(['annonces' => $annonces]);     

    }
}
