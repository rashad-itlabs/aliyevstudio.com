<?php

namespace App\Http\Controllers\Api\v1;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\app\Products;
use App\Models\app\Categories;
use App\Models\app\DoctorProfiles;
use App\Models\app\DrCategories;
use App\Models\app\PatientProfiles;
use App\Models\app\DoctorSchedule;
use App\Models\app\Appointment;
use Illuminate\Support\Facades\Http;
use App\Models\User;
use App\Models\Notification;
use Google\Client;
use DB;
use Hash;

class ApiController extends Controller
{
    public function products(Request $request)
    {
        $products = Products::when($request->categoryId != null, function($query) use($request){
            return $query->where('category_id',$request->categoryId);
        })->when($request->proID != null, function($query) use($request){
            return $query->where('id',$request->proID);
        })
        ->get();
        $list = [];
        foreach($products as $pr){
            $list[] = [
                'id' => $pr->id,
                'pro_name' => $pr->pro_name,
                'images' => asset('app/images/'.$pr->pro_image),
                'litr' => $pr->litr,
                'price' => $pr->price,
            ];
        }

        return response()->json($list);
    }

    /// product detail
    public function productsInfo(Request $request)
    {
        $products_info = Products::where('id',$request->id)->get();
        $list = [];
        foreach($products_info as $pr){
            $list[] = [
                'id' => $pr->id,
                'pro_name' => $pr->pro_name,
                'images' => asset('app/images/'.$pr->pro_image),
                'litr' => $pr->litr,
                'price' => $pr->price,
            ];
        }

        return response()->json($list);
    }

    public function categories()
    {
        //echo Hash::make('12345678');
        return Categories::all();
    }

    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    ///////
    // FOR RANDEVU //

    public function change_password(Request $request, $userId)
    {
        // $validator = \Illuminate\Support\Facades\Validator::make($request->all(), [
        //     'current_password' => 'required|string',
        //     'new_password' => 'required|string|min:8|confirmed',
        // ]);

        // if ($validator->fails()) {
        //     return response()->json([
        //         'status' => 'error',
        //         'errors' => $validator->errors()
        //     ], 422);
        // }

        $user = User::find($userId);

        

         if (!$user) {
            return response()->json([
                'status' => 'error',
                'message' => 'İstifadəçi tapılmadı.'
            ], 404);
         }

        if (!Hash::check($request->current_password, $user->password)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cari şifrə yanlışdır.'
            ], 400);
        }

        $user->password = Hash::make($request->new_password);
        $user->save();

        return response()->json([
            'status' => 'success',
            'message' => $userId. ' Şifrə uğurla dəyişdirildi.'
        ], 200);
    }

    public function doctors()
    {
        // doctor_profiles cədvəlini users cədvəli ilə birləşdiririk ki, ad, soyad və nömrəni ala bilək.
        $doctors = DoctorProfiles::select('doctor_profiles.*', 'users.name', 'users.phone', 'users.email')
            ->join('users', 'doctor_profiles.user_id', '=', 'users.id')
            ->where('users.role', 'doctor')
            ->get();
        
        return response()->json([
            'status' => 'success',
            'data' => $doctors
        ], 200);
    }

    public function dr_categories()
    {
        return DrCategories::all();
    }

    // patient list

    public function patients($doctorID)
    {
        $patientsID = Appointment::where('doctor_id',$doctorID)->pluck('patient_id');
        //return $patientsID;
        $patients = PatientProfiles::select('patient_profiles.*', 'users.name', 'users.phone', 'users.email')
            ->join('users', 'patient_profiles.user_id', '=', 'users.id')
            ->where('users.role', 'user')
            ->whereIn('patient_profiles.user_id',$patientsID)
            ->get();
        
        $currentDate = date('Y-m-d');
        $currentTime = date('H:i:s');

        $patients->map(function ($patient) use ($doctorID, $currentDate, $currentTime) {
            // Son ziyarət (Last Visit): Statusu "completed", keçmişdə olan ən son randevu
            $lastVisit = Appointment::where('doctor_id', $doctorID)
                ->where('patient_id', $patient->user_id)
                ->where('status', 'completed')
                ->where(function($query) use ($currentDate, $currentTime) {
                    $query->where('appointment_date', '<', $currentDate)
                          ->orWhere(function($q) use ($currentDate, $currentTime) {
                              $q->where('appointment_date', '=', $currentDate)
                                ->where('start_time', '<=', $currentTime);
                          });
                })
                ->orderBy('appointment_date', 'desc')
                ->orderBy('start_time', 'desc')
                ->first();

            // Təkrar Randevu (Next Appointment): Statusu "cancelled" olmayan, gələcəkdə olan ən yaxın randevu
            $nextAppointment = Appointment::where('doctor_id', $doctorID)
                ->where('patient_id', $patient->user_id)
                ->where('status', '!=', 'cancelled')
                ->where(function($query) use ($currentDate, $currentTime) {
                    $query->where('appointment_date', '>', $currentDate)
                          ->orWhere(function($q) use ($currentDate, $currentTime) {
                              $q->where('appointment_date', '=', $currentDate)
                                ->where('start_time', '>', $currentTime);
                          });
                })
                ->orderBy('appointment_date', 'asc')
                ->orderBy('start_time', 'asc')
                ->first();

            $patient->last_visit = $lastVisit ? $lastVisit->appointment_date . ' ' . $lastVisit->start_time : null;
            $patient->next_appointment = $nextAppointment ? $nextAppointment->appointment_date . ' ' . $nextAppointment->start_time : null;

            return $patient;
        });

        return response()->json($patients);
    }


    //add patient
    public function add_patient(Request $request)
    {
        $nameUsername = $request->input('name_surname');
        $email = $request->input('email');
        $age = $request->input('age');
        $gender = $request->input('gender');
        $phone = $request->input('phone');
        $diaqnoz = $request->input('diaqnoz');
        $role = 'user';
        $password = Hash::make('12345678');
        
        try {
            DB::beginTransaction();

            // 1. Yeni User yaradılır
            $user = new User();
            $user->name = $nameUsername;
            $user->phone = $phone;
            $user->password = $password;
            $user->email = $email;
            $user->role = $role;
            // Qeyd: Əgər 'users' cədvəlində 'email' sütunu mütləqdirsə (required), 
            // bura formdan və ya default bir email əlavə etməlisiniz:
            // $user->email = 'patient_' . time() . '@example.com';
            $user->save();

            // 2. Yeni PatientProfile yaradılır və User-ə bağlanır
            $patientProfile = new PatientProfiles();
            $patientProfile->user_id = $user->id;
            $patientProfile->doctor_id = $request->input('doctor_id');
            $patientProfile->age = $age;
            $patientProfile->lastDate = now();
            $patientProfile->gender = $gender;
            $patientProfile->diaqnoz = $diaqnoz;
            $patientProfile->save();

            DB::commit();

            return response()->json([
                'status' => 'success',
                'message' => 'Pasiyent uğurla əlavə edildi.',
                'user_id' => $user->id
            ], 201);

        } catch (\Exception $e) {
            DB::rollBack();
            
            return response()->json([
                'status' => 'error',
                'message' => 'Pasiyent əlavə edilərkən xəta baş verdi: ' . $e->getMessage()
            ], 500);
        }
    }

    // update profile
    public function updateProfile(Request $request, $id)
    {
        $user = User::find($id);
        User::where('id',$id)->update([
            'name'=>$request->input('name'),
            'email'=>$request->input('email'),
            'phone'=>$request->input('phone'),
        ]);
        if($user->role == 'user'){
            PatientProfiles::where('user_id',$id)->update([
                'diaqnoz' => $request->input('reason'),
                'age'=> $request->input('age'),
                'gender'=> $request->input('gender'),
            ]);
        }elseif($user->role == 'doctor'){
            DoctorProfiles::where('user_id',$id)->update([
                'specialty' => $request->input('specialty'),
                'experience' => $request->input('experience'),
                'about' => $request->input('about'),
            ]);
        }

        return response()->json([
            'status' => 'success',
            'message' => 'Profil uğurla yeniləndi.',
        ], 200);
    }

    // ======= FCM TOKEN ==============
    public function updateFcmProfile(Request $request, $userId)
    {
        $user = User::find($userId);
        User::where('id',$userId)->update([
            'fcm_token'=>$request->input('fcm_token'),
        ]);
        return response()->json([
            'status' => 'success',
            'message' => 'FCM token yuklendi',
        ], 200);
    }

    // add doctor schedule
    public function store_schedule(Request $request)
    {
        // Flutter-dən gələn məlumat "schedules" açarı ilə gələ bilər
        $schedules = $request->input('schedules');
        

        // Əgər məlumat birbaşa JSON array kimi (list) göndərilibsə
        if (!$schedules && is_array($request->all()) && isset($request->all()[0])) {
            $schedules = $request->all();
        }

        if (empty($schedules) || !is_array($schedules)) {
            return response()->json([
                'status' => 'error',
                'message' => 'Cədvəl məlumatları düzgün deyil və ya boşdur.'
            ], 400);
        }


        
        $insertData = [];
        foreach ($schedules as $schedule) {
            $insertData[] = [
                'doctor_id'        => $schedule['doctor_id'] ?? null,
                'day_of_week'      => $schedule['day_of_week'] ?? null,
                'start_time'       => $schedule['start_time'] ?? null,
                'end_time'         => $schedule['end_time'] ?? null,
                'appointment_time' => $schedule['appointment_time'] ?? null,
                'is_active'        => $schedule['isActive'] ?? null,
            ];

            DoctorSchedule::where('doctor_id',$schedule['doctor_id'])->delete();
        }
        // Məlumatları bazaya toplu (bulk) şəkildə əlavə edirik

        
        DoctorSchedule::insert($insertData);
        return response()->json([
                'status' => 'success',
                'message' => 'Cədvəl uğurla yaradıldı'
            ], 200);
    }

    public function work_hours($id)
    {
        $schedule = DoctorSchedule::where('doctor_id',$id)
        ->select('id','doctor_id','day_of_week','start_time','end_time','appointment_time','is_active')
        ->get();
        return response()->json([
            'status' => 'success',
            'data' => $schedule
        ], 200);
    }

    public function book_list_for_doctor($id)
    {
        $books = Appointment::where('doctor_id',$id)->get();
        $patients = [];
        $bookList = [];
        foreach($books as $book){
            $bookList[] = [
                'id'=>$book->id,
                'doctor_id' =>$book->doctor_id,
                'doctor_name' => $book->doctorName->name,
                'specialty' => $book->specialty->specialty,
                'patient_info' => [
                    [
                        'patient_name'=> $book->patientName->name,
                        'phone_number'=> $book->patientName->phone
                    ]
                ],
                'patient_id'=>$book->patient_id,
                'appointment_date'=>$book->appointment_date,
                'start_time'=>date('H:i',strtotime($book->start_time)),
                'end_time'=>date('H:i',strtotime($book->end_time)),
                'status'=>$book->status,
                'notes'=>$book->notes,
            ];

        }

        return response()->json([
            'data'=>$bookList
        ]);
    }

    public function book_list()
    {
        $books = Appointment::all();
        $patients = [];
        $bookList = [];
        foreach($books as $book){
            $bookList[] = [
                'id'=>$book->id,
                'doctor_id' =>$book->doctor_id,
                'doctor_name' => $book->doctorName->name,
                'specialty' => $book->specialty->specialty,
                'patient_info' => [
                    [
                        'patient_name'=> $book->patientName->name,
                        'phone_number'=> $book->patientName->phone
                    ]
                ],
                'patient_id'=>$book->patient_id,
                'appointment_date'=>$book->appointment_date,
                'start_time'=>date('H:i',strtotime($book->start_time)),
                'end_time'=>date('H:i',strtotime($book->end_time)),
                'status'=>$book->status,
                'notes'=>$book->notes,
            ];

        }

        return response()->json([
            'data'=>$bookList
        ]);
    }


    public function create_book(Request $request)
    {

        $appointment = Appointment::create([
            'doctor_id'        => $request->doctor_id ?? null,
            'patient_id'       => $request->patient_id ?? null,
            'start_time'       => $request->start_time ?? null,
            'end_time'         => $request->end_time ?? null,
            'appointment_date' => $request->appointment_time ?? null,
            'notes'            => $request->notes ?? null,
        ]);

        $doctor = User::find($request->doctor_id);
        PatientProfiles::where('user_id',$request->patient_id)->update(['nextDate'=>$request->appointment_time]);

        $fcmResponse = null;
        if ($doctor && $doctor->fcm_token) {
            $fcmResponse = $this->sendFCM($doctor->fcm_token, $appointment);
        }

        Notification::insert([
            'title'=>'Randevu',
            'user_id' => $request->doctor_id,
            'start_time' => $request->start_time,
            'description' => $request->appointment_time. ' - tarixində saat: ' .$request->start_time. ' üçün yeni randevu yaradildi',
            'created_at' => now(),
            'updated_at' => now(),
        ]);


        return response()->json([
            'status'=>'success',
            'data'=> $request->appointment_date. ' - tarixində saat: ' .$request->start_time. ' üçün yeni randevu yaradildi',
            'token'=> $doctor->fcm_token ?? null,
            'fcm_response' => $fcmResponse,
            'request'=>$request->all()
        ]);
    }

    public function sendFCM($token, $appointment)
    {
        $accessToken = $this->getAccessToken();
        

        $response = Http::withToken($accessToken)
            ->post('https://fcm.googleapis.com/v1/projects/medapp-62f91/messages:send', [
                "message" => [
                    "token" => $token,

                    // 👇 BU HISSƏ VACİBDİR (background üçün)
                    "notification" => [
                        "title" => "Yeni randevu ",
                        "body"  => $appointment->appointment_date. ' - tarixində saat: ' .$appointment->start_time. ' üçün yeni randevu yaradildi'
                        //"body"  => $appointment->patient_name . " randevu yaratdı"
                    ],

                    // 👇 əlavə data
                    "data" => [
                        "doctor_id" => "1",
                        "appointment_id" => "34",
                        "type" => "appointment"
                    ],

                    "android" => [
                        "priority" => "high"
                    ],

                    "apns" => [
                        "headers" => [
                            "apns-priority" => "10"
                        ]
                    ]
                ]
            ]);
            
        return $response->json();
    }

    public function getAccessToken()
    {
        $client = new Client();
        $client->setAuthConfig(storage_path('app/firebase.json'));
        $client->addScope('https://www.googleapis.com/auth/firebase.messaging');

        $client->fetchAccessTokenWithAssertion();
        $token = $client->getAccessToken();

        return $token['access_token'];
    }

    public function delete_book($id)
    {
        Appointment::where('id',$id)->delete();
        return response()->json([
            'status'=>'success',
            'data'=> 'ID-si ' .$id . ' olan randevu silindi'
        ]);
    }

    public function update_book_status(Request $request, $id)
    {
        Appointment::where('id',$id)->update([
            'status'=>$request->status
        ]);
        return response()->json([
            'status'=>'success',
            'data'=> 'ID-si ' .$id . ' olan randevu təsdiqləndi'
        ]);
    }

    public function update_book(Request $request, $id)
    {

        Appointment::where('id',$id)->update([
            'doctor_id'        => $request->doctor_id ?? null,
            'start_time'       => $request->start_time ?? null,
            'end_time'         => $request->end_time ?? null,
            'appointment_date' => $request->appointment_time ?? null,
            'notes'            => $request->notes ?? null,
        ]);

        return response()->json([
            'status'=>'success',
            'data'=> 'ID-si ' .$id . ' olan randevu Yenilendi'
        ]);
    }

    public function notificationUpdate(Request $request, $userId)
    {
        User::where('id',$userId)->update(['notification'=>$request->notification]);
        return response()->json([
            'status'=>'success',
            'message'=> 'Əməliyyat təsdiqləndi'
        ], 200);
    }

    public function show_notification($userID)
    {
        $nots = Notification::where('user_id',$userID)->orderBy('id','DESC')->get();
    
        $data = [];
        foreach($nots as $nt){
            $data[] = [
                'title' => $nt->title,
                'start_time' => date('H:i',strtotime($nt->start_time)),
                'description' => $nt->description,
                'created_date' => date('d-m-Y',strtotime($nt->created_at))
            ];
        }

        return response()->json($data);
    }

    /// Randevu ucun REST API
}
