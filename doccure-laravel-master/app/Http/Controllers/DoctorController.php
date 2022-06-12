<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Doctor;
use App\Models\Speciality;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $doctors = Doctor::with(['speciality', 'city'])->get();
        return response()->view('cms.admin.doctors.index', ['doctors' => $doctors]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        $cities = City::where('active', true)->get();
        $specialities = Speciality::where('active', true)->get();
        return response()->view('cms.admin.doctors.create', ['cities' => $cities, 'specialities' => $specialities]);
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
            'user_name' => 'required|string',
            'email' => 'required|email|unique:doctors,email',
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'phone_number' => 'required|numeric|digits:10',
            'active' => 'required|boolean',
            'gender' => 'required|string|in:M,F',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'bio' => 'nullable|min:5|max:100',
            'address_1' => 'required|min:5|max:20',
            'address_2' => 'required|min:5|max:20',
            'city_id' => 'required|integer|exists:cities,id',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'pricing' => 'required|in:Free,Custom',
            'per_hour' => 'required_if:pricing,Custom|numeric'
        ]);
        if (!$validator->fails()) {
            $doctor = new Doctor();
            $doctor->user_name = $request->get('user_name');
            $doctor->email = $request->get('email');
            $doctor->first_name = $request->get('first_name');
            $doctor->last_name = $request->get('last_name');
            $doctor->phone_number = $request->get('phone_number');
            $doctor->gender = $request->get('gender');
            $doctor->active = $request->get('active');
            $doctor->date_of_birth = $request->get('birth_date');
            $doctor->bio = $request->get('bio');
            $doctor->address_line_1 = $request->get('address_1');
            $doctor->address_line_2 = $request->get('address_2');
            $doctor->city_id = $request->get('city_id');
            $doctor->speciality_id = $request->get('speciality_id');
            $doctor->pricing = $request->get('pricing');
            $doctor->per_hour = $request->get('per_hour');
            $doctor->password = Hash::make('123123');
            $isSaved = $doctor->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Doctor created successfully' : 'Failed to create doctor'], $isSaved ? 201 : 400);
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
        $doctor = Doctor::findOrFail($id);
        $specialities = Speciality::where('active', true)->get();
        $cities = City::where('active', true)->get();
        return response()->view('cms.admin.doctors.edit', ['doctor' => $doctor, 'specialities' => $specialities, 'cities' => $cities]);
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
            'user_name' => 'required|string',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'phone_number' => 'required|numeric|digits:10',
            'active' => 'required|boolean',
            'gender' => 'required|string|in:M,F',
            'birth_date' => 'required|date|date_format:Y-m-d',
            'bio' => 'nullable|min:5|max:100',
            'address_1' => 'required|min:5|max:20',
            'address_2' => 'required|min:5|max:20',
            'city_id' => 'required|integer|exists:cities,id',
            'speciality_id' => 'required|integer|exists:specialities,id',
            'pricing' => 'required|in:Free,Custom',
            'per_hour' => 'required_if:pricing,Custom|numeric'
        ]);
        if (!$validator->fails()) {
            $doctor =  Doctor::findOrFail($id);
            $doctor->user_name = $request->get('user_name');
            $doctor->email = $request->get('email');
            $doctor->first_name = $request->get('first_name');
            $doctor->last_name = $request->get('last_name');
            $doctor->phone_number = $request->get('phone_number');
            $doctor->gender = $request->get('gender');
            $doctor->active = $request->get('active');
            $doctor->date_of_birth = $request->get('birth_date');
            $doctor->bio = $request->get('bio');
            $doctor->address_line_1 = $request->get('address_1');
            $doctor->address_line_2 = $request->get('address_2');
            $doctor->city_id = $request->get('city_id');
            $doctor->speciality_id = $request->get('speciality_id');
            $doctor->pricing = $request->get('pricing');
            $doctor->per_hour = $doctor->pricing == 'Free' ? null : $request->get('per_hour');
            $isSaved = $doctor->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Doctor created successfully' : 'Failed to create doctor'], $isSaved ? 201 : 400);
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
        $isDeleted = Doctor::destroy($id);
        if ($isDeleted) {
            return response()->json(['title' => 'نجحت العملية', 'message' => 'تم حذف العنصر بنجاح', 'icon' => 'success'], 200);
        } else {
            return response()->json(['title' => 'فشلت العملية', 'message' => 'فشلت عملية الحذف!', 'icon' => 'error'], 400);
        }
    }
}
