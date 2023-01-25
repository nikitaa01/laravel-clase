<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CountriesValidation;
use App\Models\Country;
use Illuminate\Http\Request;

class CountriesController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            CountriesValidation::class,
            ['only' => ['store']]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return response()->json(Country::all());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $country = new Country();
        $country->Code = $request->Code;
        $country->Name = $request->Name;
        $country->Continent = $request->Continent;
        $country->Region = $request->Region;
        $country->SurfaceArea = $request->SurfaceArea;
        $country->IndepYear = $request->IndepYear;
        $country->Population = $request->Population;
        $country->LifeExpectancy = $request->LifeExpectancy;
        $country->GNP = $request->GNP;
        $country->GNPOld = $request->GNPOld;
        $country->LocalName = $request->LocalName;
        $country->GovernmentForm = $request->GovernmentForm;
        $country->HeadOfState = $request->HeadOfState;
        $country->Capital = $request->Capital;
        $country->Code2 = $request->Code2;
        $country->save();
        // $country = Country::create($request->all());
        return response()->json($country, 201);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function show(Country $country)
    {
        return response()->json($country);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Country $country)
    {
        // $country->message = $request->message;
        // $country->save();
        $country->fill($request->all())->save();
        return response()->json($country);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Country  $country
     * @return \Illuminate\Http\Response
     */
    public function destroy(Country $country)
    {
        $country->delete();
        return response()->noContent();
    }
}
