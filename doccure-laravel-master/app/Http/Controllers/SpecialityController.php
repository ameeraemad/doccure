<?php

namespace App\Http\Controllers;

use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class SpecialityController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $specialities = Speciality::all();
        return response()->view('cms.admin.specialities.index', ['specialities' => $specialities]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return response()->view('cms.admin.specialities.create');
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
            $speciality = new Speciality();
            $speciality->name = $request->get('name');
            $speciality->active = $request->get('active');
            $isSaved = $speciality->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Created successfully' : 'Failed to create'], $isSaved ? 201 : 400);
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
        $speciality = Speciality::findOrFail($id);
        return response()->view('cms.admin.specialities.edit', ['speciality' => $speciality]);
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
            $speciality = Speciality::findOrFail($id);
            $speciality->name = $request->get('name');
            $speciality->active = $request->get('active');
            $isSaved = $speciality->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Updated successfully' : 'Failed to update'], $isSaved ? 201 : 400);
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
        $isDeleted = Speciality::destroy($id);
        if ($isDeleted) {
            return response()->json(['title' => 'نجحت العملية', 'message' => 'تم حذف العنصر بنجاح', 'icon' => 'success'], 200);
        } else {
            return response()->json(['title' => 'فشلت العملية', 'message' => 'فشلت عملية الحذف!', 'icon' => 'error'], 400);
        }
    }
}
