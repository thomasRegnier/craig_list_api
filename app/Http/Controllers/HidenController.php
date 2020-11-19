<?php

namespace App\Http\Controllers;

use App\Models\Hiden;
use Illuminate\Http\Request;

class HidenController extends Controller
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
        $hiden =  Hiden::create([
            'user_id' => $request->user()->id,
            'offer_id' => $request->id
        ]);

        return response()
            ->json(["fav" => $hiden]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Hiden  $hiden
     * @return \Illuminate\Http\Response
     */
    public function show(Hiden $hiden)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Hiden  $hiden
     * @return \Illuminate\Http\Response
     */
    public function edit(Hiden $hiden)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Hiden  $hiden
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Hiden $hiden)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Hiden  $hiden
     * @return \Illuminate\Http\Response
     */
    public function destroy(Hiden $hiden, Request $request)
    {
        //
        $hiden = Hiden::where('user_id', $request->user()->id)
            ->where('offer_id', $request->id)
            ->first();

        if (!$hiden) {
            return response()
                ->json(["error" => "error"], 400);
        }else{
            $hiden->delete();
            return response()
                ->json(["success" => "success"]);
        }
    }
}
