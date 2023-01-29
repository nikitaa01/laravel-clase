<?php

namespace App\Http\Controllers;

use App\Http\Middleware\LangsValidation;
use App\Models\Lang;
use Illuminate\Http\Request;

class LangsController extends Controller
{
    public function __construct()
    {
        $this->middleware(
            LangsValidation::class,
            ['only' => ['store', 'update']]
        );
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $allLang = Lang::all();
        foreach ($allLang as $lang) {
            $lang->countries;
        }
        return response()->json($allLang);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $allRequest = [];
        $allRequest['lang'] = ucfirst($request->all()['lang']);
        $lang = Lang::create($allRequest);
        $lang->save();
        return response()->json($lang);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function show(Lang $lang)
    {
        $lang->countries;
        return response()->json($lang);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Lang $lang)
    {
        $allRequest = [];
        $allRequest['lang'] = ucfirst($request->all()['lang']);
        $lang->fill($allRequest)->save();
        return response()->json($lang);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Lang  $lang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Lang $lang)
    {
        $lang->delete();
        return response()->json($lang);
    }
}
