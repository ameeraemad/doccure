<?php

namespace App\Http\Controllers;

use App\Models\City;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class CityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $cities = City::all();
        return response()->view('cms.admin.cities.index', ['cities' => $cities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.admin.cities.create');
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
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:20',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $city = new City();
            $city->name = $request->get('name');
            $city->active = $request->get('active');
            $isSaved = $city->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'City created successfully' : 'Failed to create city'], $isSaved ? 201 : 400);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
        $city = City::findOrFail($id);
        return response()->view('cms.admin.cities.edit', ['city' => $city]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
        $validator = Validator::make($request->all(), [
            'name' => 'required|string|min:2|max:20',
            'active' => 'required|boolean',
        ]);
        if (!$validator->fails()) {
            $city = City::findOrFail($id);
            $city->name = $request->get('name');
            $city->active = $request->get('active');
            $isSaved = $city->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'City updated successfully' : 'Failed to update city'], $isSaved ? 201 : 400);
        } else {
            return response()->json(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        $isDeleted = City::destroy($id);
        if ($isDeleted) {
            return response()->json(['title' => 'نجحت العملية', 'message' => 'تم حذف العنصر بنجاح', 'icon' => 'success'], 200);
        } else {
            return response()->json(['title' => 'فشلت العملية', 'message' => 'فشلت عملية الحذف!', 'icon' => 'error'], 400);
        }
    }
}
