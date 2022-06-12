<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $admins = User::all();
        return response()->view('cms.admin.admins.index', ['admins' => $admins]);
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
        return response()->view('cms.admin.admins.create', ['cities' => $cities]);
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
            'email' => 'required|email|unique:users,email',
            'mobile' => 'required|numeric|digits:10|unique:users,mobile',
            'address' => 'required|min:5|max:30',
            'gender' => 'required|string|in:M,F',
            'active' => 'required|boolean',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if (!$validator->fails()) {
            $patient = new User();
            $patient->first_name = $request->get('first_name');
            $patient->last_name = $request->get('last_name');
            $patient->date_of_birth = Carbon::parse($request->get('birth_date'));
            $patient->email = $request->get('email');
            $patient->mobile = $request->get('mobile');
            $patient->address = $request->get('address');
            $patient->gender = $request->get('gender');
            $patient->active = $request->get('active');
            $patient->city_id = $request->get('city_id');
            $patient->password = Hash::make('123123');
            $isSaved = $patient->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'User created successfully' : 'Failed to create user'], $isSaved ? 201 : 400);
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
        $admin = User::findOrFail($id);
        $cities = City::where('active', true)->get();
        return response()->view('cms.admin.admins.edit', ['admin' => $admin, 'cities' => $cities]);
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
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $id,
            'address' => 'required|min:5|max:30',
            'gender' => 'required|string|in:M,F',
            'active' => 'required|boolean',
            'city_id' => 'required|integer|exists:cities,id',
        ]);
        if (!$validator->fails()) {
            $admin = User::findOrFail($id);
            $admin->first_name = $request->get('first_name');
            $admin->last_name = $request->get('last_name');
            $admin->date_of_birth = Carbon::parse($request->get('birth_date'));
            $admin->email = $request->get('email');
            $admin->mobile = $request->get('mobile');
            $admin->address = $request->get('address');
            $admin->gender = $request->get('gender');
            $admin->active = $request->get('active');
            $admin->city_id = $request->get('city_id');
            $isSaved = $admin->save();
            return response()->json(['status' => $isSaved ? true : false, 'message' => $isSaved ? 'Admin updated successfully' : 'Failed to update admin'], $isSaved ? 201 : 400);
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
        $isDeleted = User::destroy($id);
        if ($isDeleted) {
            return response()->json(['title' => 'نجحت العملية', 'message' => 'تم حذف العنصر بنجاح', 'icon' => 'success'], 200);
        } else {
            return response()->json(['title' => 'فشلت العملية', 'message' => 'فشلت عملية الحذف!', 'icon' => 'error'], 400);
        }
    }
}
