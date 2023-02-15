<?php

namespace App\Http\Controllers;

use App\Models\Concert;
use App\Http\Requests\StoreconcertRequest;
use App\Http\Requests\UpdateconcertRequest;

class ConcertController extends Controller
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
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreconcertRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreconcertRequest $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function show(concert $concert)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateconcertRequest  $request
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateconcertRequest $request, concert $concert)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Concert  $concert
     * @return \Illuminate\Http\Response
     */
    public function destroy(concert $concert)
    {
        //
    }
}
