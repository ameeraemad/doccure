<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Patient;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $patients = Patient::all();
        return response()->view('cms.admin.patients.index', ['patients' => $patients]);
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
        return response()->view('cms.admin.patients.create', ['cities' => $cities]);
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
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'birth_date' => 'required|date|date_format:d/m/Y',
            'blood_group' => 'required|string|in:A-,A+,B-,B+,AB-,AB+,O+,O-',
            'email' => 'required|email|unique:patients,email',
            'mobile' => 'required|numeric|digits:10|unique:patients,mobile',
            'address' => 'required|min:5|max:30',
            'gender' => 'required|string|in:M,F',
            'active' => 'required|boolean',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if (!$validator->fails()) {
            $patient = new Patient();
            $patient->first_name = $request->get('first_name');
            $patient->last_name = $request->get('last_name');
            $patient->date_of_birth = Carbon::parse($request->get('birth_date'));
            $patient->blood_group = $request->get('blood_group');
            $patient->email = $request->get('email');
            $patient->mobile = $request->get('mobile');
            $patient->address = $request->get('address');
            $patient->gender = $request->get('gender');
            $patient->active = $request->get('active');
            $patient->city_id = $request->get('city_id');
            $patient->password = Hash::make('123123');
            $isSaved = $patient->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Patient created successfully' : 'Failed to create patient'], $isSaved ? 201 : 400);
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
        $patient = Patient::findOrFail($id);
        $cities = City::where('active', true)->get();
        return response()->view('cms.admin.patients.edit', ['patient' => $patient, 'cities' => $cities]);
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
            'first_name' => 'required|string|min:2',
            'last_name' => 'required|string|min:2',
            'birth_date' => 'required|date|date_format:m/d/Y',
            'blood_group' => 'required|string|in:A-,A+,B-,B+,AB-,AB+,O+,O-',
            'email' => 'required|email|unique:doctors,email,' . $id,
            'mobile' => 'required|numeric|digits:10|unique:patients,mobile,' . $id,
            'address' => 'required|min:5|max:30',
            'gender' => 'required|string|in:M,F',
            'active' => 'required|boolean',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if (!$validator->fails()) {
            $patient = Patient::findOrFail($id);
            $patient->first_name = $request->get('first_name');
            $patient->last_name = $request->get('last_name');
            $patient->date_of_birth = Carbon::parse($request->get('birth_date'));
            $patient->blood_group = $request->get('blood_group');
            $patient->email = $request->get('email');
            $patient->mobile = $request->get('mobile');
            $patient->address = $request->get('address');
            $patient->gender = $request->get('gender');
            $patient->active = $request->get('active');
            $patient->city_id = $request->get('city_id');
            $isSaved = $patient->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Patient updated successfully' : 'Failed to update patient'], $isSaved ? 201 : 400);
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
        $isDeleted = Patient::destroy($id);
        if ($isDeleted) {
            return response()->json(['title' => 'نجحت العملية', 'message' => 'تم حذف العنصر بنجاح', 'icon' => 'success'], 200);
        } else {
            return response()->json(['title' => 'فشلت العملية', 'message' => 'فشلت عملية الحذف!', 'icon' => 'error'], 400);
        }
    }
}
