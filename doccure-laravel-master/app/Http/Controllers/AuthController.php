<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AuthController extends Controller
{
    //
    // public function showLoginView()
    // {
    //     return view('cms.auth.login');
    // }

    public function login(Request $request)
    {
        $validator = Validator($request->all(), [
            'guard' => 'required|in:admin,doctor,patient',
            'email' => 'required|email|string',
            'password' => 'required|string|min:3|max:10',
            // 'remember' => 'boolean'
        ], [
            'email.string' => 'تأكد من إدخال البريد الإلكتروني بشكل صحيح',
            'email.email' => 'تأكد من إدخال البريد الإلكتروني بشكل صحيح',
            'email.required' => 'تأكد من إدخال البريد الإلكتروني و كلمة المرور',
            'password.required' => 'تأكد من إدخال البريد الإلكتروني و كلمة المرور',
        ]);

        $credentials = [
            'email' => $request->email,
            'password' => $request->password,
        ];

        if (!$validator->fails()) {
            if (Auth::guard($request->get('guard'))->attempt($credentials, $request->get('remember'))) {
                $user = Auth::guard($request->get('guard'))->user();
            if ($user->active) {
                    return response()->json(['message' => 'تم تسجيل الدخول بنجاح'], 200);
                } else {
                    Auth::guard($request->get('guard'))->logout();
                    return response()->json(['message' => 'الحساب محظور, لا يمكن تسجيل الدخول'], 400);
                }
            } else {
                return response()->json(['message' => 'فشل تسجيل الدخول, تأكد من البيانات المدخلة'], 400);
            }
        } else {
            return response(['status' => false, 'message' => $validator->getMessageBag()->first()], 400);
        }
    }

    public function edit()
    {
        // $user = Auth::guard('user')->user();
        // return response()->view('cms.auth.edit-profile', ['user' => $user]);
    }

    public function update(Request $request)
    {
        $id = Auth()->guard('user')->user()->id;
        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3|max:30',
            'email' => 'required|email|unique:users,email,' . $id,
            'mobile' => 'required|numeric|digits:10|unique:users,mobile,' . $id,
        ]);

        // if (!$validator->fails()) {
        //     $user = User::findOrFail($id);
        //     $user->name = $request->get('name');
        //     $user->email = $request->get('email');
        //     $user->mobile = $request->get('mobile');
        //     $isSaved = $user->save();
        //     return response(['message' => $isSaved ? "تمت العملية بنجاح" : "فشلت العملية"], $isSaved ? 200 : 400);
        // } else {
        //     return response(['message' => $validator->getMessageBag()->first()], 400);
        // }
    }

    public function editPassword()
    {
        return view('cms.auth.edit-password');
    }

    public function updatePassword(Request $request)
    {
        $validator = Validator($request->all(), [
            'current_password' => 'required|string|password:user',
            'new_password' => 'required|string|confirmed',
            'new_password_confirmation' => 'required|string'
        ], [
            'current_password.password' => 'كلمة المرور الحالية غير صحيحة',
            'new_password.confirmed' => 'كلمة المرور الجديدة غير متطابقة',
        ]);

        // if (!$validator->fails()) {
        //     $user = User::findOrFail(Auth()->guard('user')->user()->id);
        //     $user->password = Hash::make($request->get('new_password'));
        //     $isSaved = $user->save();
        //     return response(['message' => $isSaved ? "تمت العملية بنجاح" : "فشلت العملية"], $isSaved ? 200 : 400);
        // } else {
        //     return response(['message' => $validator->getMessageBag()->first()], 400);
        // }
    }

    public function logout(Request $request)
    {
        $guard = "";
        if (Auth::guard('admin')->check()) {
            $guard = 'admin';
        } else if (Auth::guard('doctor')->check()) {
            $guard = 'doctor';
        } else if (Auth::guard('patient')->check()) {
            $guard = 'patient';
        }

        Auth::guard($guard)->logout();
        $request->session()->invalidate();

        return redirect()->guest(route('cms.login', [$guard]));
    }
}
