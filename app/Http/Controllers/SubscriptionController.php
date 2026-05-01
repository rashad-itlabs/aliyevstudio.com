<?php

namespace App\Http\Controllers;

use App\Models\Subscriber;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Stevebauman\Location\Facades\Location;

class SubscriptionController extends Controller
{
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'email' => 'required|email|unique:subscribers,email',
        ], [
            'email.required' => 'E-poçt ünvanı boş ola bilməz.',
            'email.email' => 'Düzgün e-poçt ünvanı daxil edin.',
            'email.unique' => 'Bu e-poçt ünvanı artıq abunə olunub.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        Subscriber::create([
                'email'      => $request->email,
                'ip_address' => $request->ip(),
                'country'    => Location::get($request->ip())->countryCode ?? null,
        ]);

        return back()->with('success', 'Abunəliyiniz uğurla tamamlandı!');
    }
}