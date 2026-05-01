<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\app\DoctorProfiles;
use App\Models\app\PatientProfiles;
use App\Models\User;

class AuthController extends Controller
{
    public function login(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email',
            'password' => 'required|string',
        ]);

        if ($validator->fails()) {
            return response()->json([
                'status' => 'error',
                'errors' => $validator->errors()
            ], 422);
        }

        if (!Auth::attempt($request->only('email', 'password'))) {
            return response()->json([
                'status' => 'error',
                'message' => 'E-poçt ünvanı və ya şifrə yanlışdır.'
            ], 401);
        }

        $user = User::where('email', $request->email)->firstOrFail();
        $token = $user->createToken('auth_token')->plainTextToken;

        return response()->json([
            'status' => 'success',
            'message' => 'Uğurla giriş edildi.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 200);
    }


    public function register(Request $request)
    {
        $user = new User();
        $user->name = $request->name;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->password = $request->password;
        $user->role = $request->role;
        $user->save();

        $patient = new PatientProfiles();
        $patient->user_id = $user->id;
        $patient->doctor_id = 0;
        $patient->save();


        $token = $user->createToken('auth_token')->plainTextToken;
        return response()->json([
            'status' => 'success',
            'message' => 'Uğurla giriş edildi.',
            'access_token' => $token,
            'token_type' => 'Bearer',
            'user' => $user
        ], 200);
    }
    

    public function profile(Request $request)
    {
        $user = $request->user();
        
        // doctor_profile cədvəlindən istifadəçiyə (həkimə) aid məlumatları çəkirik
        if($user->role == 'doctor'){
            $doctorDetails = DoctorProfiles::where('user_id', $user->id)->first();
        }elseif($user->role=='user'){
            $doctorDetails = PatientProfiles::where('user_id', $user->id)->first();
        }
        

        return response()->json([
            'status' => 'success',
            'user' => $user,
            'profile' => $doctorDetails
        ], 200);
    }
}