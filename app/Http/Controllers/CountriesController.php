<?php

namespace App\Http\Controllers;

use App\Http\Middleware\CountriesValidation;
use App\Models\Country;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

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
        $country->langs;
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

    public function getByContinent($continent)
    {
        $countries = DB::table('country')
            ->where('Continent', '=', $continent)
            ->get();
        return response()->json($countries);
    }

    public function orderBySize()
    {
        $countries = DB::table('country')
            ->orderBy('SurfaceArea', 'desc')
            ->select('Name', 'SurfaceArea')
            ->get();
        return response()->json($countries);
    }

    public function withZeroCities()
    {
        $countries = DB::table('country')
            ->leftJoin('city', 'country.Code', '=', 'city.CountryCode')
            ->whereNull('city.countrycode')
            ->select('country.name')
            ->get();
        return response()->json($countries);
    }

    public function independenceNull()
    {
        $countries = DB::table('country')
            ->whereNull('IndepYear')
            ->get();
        return response()->json($countries);
    }

    public function independenceBetween($year1, $year2)
    {
        $countries = DB::table('country')
            ->whereBetween('IndepYear', [$year1, $year2])
            ->get();
        return response()->json($countries);
    }

    public function startsWith($letter)
    {
        $countries = DB::table('country')
            ->get();
        return response()->json($countries);
    }
}
