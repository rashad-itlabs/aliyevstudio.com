<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\app\Appointment;
use App\Models\User;
use App\Models\app\PatientProfiles;
use App\Models\app\DoctorProfiles;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\DB;
use App\Services\FirebaseService;

class Docly extends Controller
{
    public function dashboard()
    {
        return view('docly.dashboard');
    }

    public function settings()
    {
        return view('docly.settings');
    }

    public function sendNotification(Request $request, FirebaseService $firebaseService)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'message' => 'required|string'
        ]);

        // Yalnız FCM token-i olan istifadəçiləri tapırıq
        $users = User::whereNotNull('fcm_token')->where('fcm_token', '!=', '')->get();
        $count = 0;

        foreach ($users as $user) {
            try {
                $firebaseService->sendCustomNotification($user->fcm_token, $request->title, $request->message);
                $count++;
            } catch (\Exception $e) {
                // Xəta olarsa prosesin dayanmaması üçün try-catch bloku daxilinə alırıq
            }
        }

        return back()->with('success', $count . ' istifadəçiyə bildiriş uğurla göndərildi.');
    }

    public function appointments()
    {
        // Randevuları həkim və pasiyent məlumatları ilə birlikdə bazadan çəkirik
        $appointments = Appointment::with(['doctorName', 'patientName'])->get();
        
        $events = [];
        foreach ($appointments as $app) {
            $className = 'bg-primary border-primary text-white'; // default rəng
            if ($app->status == 'completed' || strtolower($app->status) == 'gəldi') {
                $className = 'bg-success border-success text-white';
            } elseif ($app->status == 'pending' || strtolower($app->status) == 'gözləyir') {
                $className = 'bg-warning border-warning text-dark';
            } elseif ($app->status == 'cancelled' || strtolower($app->status) == 'no-show') {
                $className = 'bg-danger border-danger text-white';
            }
            
            $events[] = [
                'title' => ($app->patientName->name ?? 'Naməlum Pasiyent') . ' - ' . ($app->doctorName->name ?? 'Naməlum Həkim'),
                'start' => $app->appointment_date . 'T' . $app->start_time,
                'end'   => $app->appointment_date . 'T' . $app->end_time,
                'className' => $className,
                'extendedProps' => [
                    'status' => $app->status ?? 'Naməlum',
                    'notes'  => $app->notes ?? 'Qeyd yoxdur'
                ]
            ];
        }

        return view('docly.appointments', compact('events'));
    }

    public function patients()
    {
        $patients = User::where('role', 'user')
            ->leftJoin('patient_profiles', 'users.id', '=', 'patient_profiles.user_id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone', 'patient_profiles.age', 'patient_profiles.gender', 'patient_profiles.diaqnoz')
            ->orderBy('users.created_at', 'desc')
            ->get();
            
        return view('docly.patients', compact('patients'));
    }

    public function storePatient(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make('12345678'); // Default şifrə
            $user->role = 'user';
            $user->save();

            $profile = new PatientProfiles();
            $profile->user_id = $user->id;
            $profile->age = $request->age;
            $profile->gender = $request->gender;
            $profile->diaqnoz = $request->diaqnoz;
            $profile->save();

            DB::commit();
            return back()->with('success', 'Pasiyent uğurla əlavə edildi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function updatePatient(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            PatientProfiles::updateOrCreate(
                ['user_id' => $id],
                ['age' => $request->age, 'gender' => $request->gender, 'diaqnoz' => $request->diaqnoz]
            );

            DB::commit();
            return back()->with('success', 'Pasiyent məlumatları yeniləndi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function destroyPatient($id)
    {
        try {
            User::findOrFail($id)->delete();
            PatientProfiles::where('user_id', $id)->delete();
            return back()->with('success', 'Pasiyent silindi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function doctors()
    {
        $doctors = User::where('role', 'doctor')
            ->leftJoin('doctor_profiles', 'users.id', '=', 'doctor_profiles.user_id')
            ->select('users.id', 'users.name', 'users.email', 'users.phone', 'doctor_profiles.specialty', 'doctor_profiles.experience', 'doctor_profiles.about')
            ->orderBy('users.created_at', 'desc')
            ->get();
            
        return view('docly.doctors', compact('doctors'));
    }

    public function storeDoctor(Request $request)
    {
        try {
            DB::beginTransaction();
            $user = new User();
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->password = Hash::make('12345678'); // Default şifrə
            $user->role = 'doctor';
            $user->save();

            $profile = new DoctorProfiles();
            $profile->user_id = $user->id;
            $profile->specialty = $request->specialty;
            $profile->experience = $request->experience;
            $profile->about = $request->about;
            $profile->save();

            DB::commit();
            return back()->with('success', 'Həkim uğurla əlavə edildi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function updateDoctor(Request $request, $id)
    {
        try {
            DB::beginTransaction();
            $user = User::findOrFail($id);
            $user->name = $request->name;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->save();

            DoctorProfiles::updateOrCreate(
                ['user_id' => $id],
                ['specialty' => $request->specialty, 'experience' => $request->experience, 'about' => $request->about]
            );

            DB::commit();
            return back()->with('success', 'Həkim məlumatları yeniləndi.');
        } catch (\Exception $e) {
            DB::rollBack();
            return back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function destroyDoctor($id)
    {
        try {
            User::findOrFail($id)->delete();
            DoctorProfiles::where('user_id', $id)->delete();
            return back()->with('success', 'Həkim silindi.');
        } catch (\Exception $e) {
            return back()->with('error', 'Xəta baş verdi: ' . $e->getMessage());
        }
    }

    public function doctorAppointments($id)
    {
        $doctor = User::findOrFail($id);
        $appointments = Appointment::with(['patientName'])->where('doctor_id', $id)->get();
        
        $events = [];
        foreach ($appointments as $app) {
            $className = 'bg-primary border-primary text-white';
            if ($app->status == 'completed' || strtolower($app->status) == 'gəldi') {
                $className = 'bg-success border-success text-white';
            } elseif ($app->status == 'pending' || strtolower($app->status) == 'gözləyir') {
                $className = 'bg-warning border-warning text-dark';
            } elseif ($app->status == 'cancelled' || strtolower($app->status) == 'no-show') {
                $className = 'bg-danger border-danger text-white';
            }
            
            $events[] = [
                'title' => ($app->patientName->name ?? 'Naməlum Pasiyent'),
                'start' => $app->appointment_date . 'T' . $app->start_time,
                'end'   => $app->appointment_date . 'T' . $app->end_time,
                'className' => $className,
                'extendedProps' => [ 'status' => $app->status ?? 'Naməlum', 'notes'  => $app->notes ?? 'Qeyd yoxdur' ]
            ];
        }
        return view('docly.doctor_appointments', compact('events', 'doctor'));
    }
}
