<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\BlogModel;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage; // Bu sətir artıq mövcuddur
use Carbon\Carbon; // Carbon sinfini əlavə edirik
use Str;

class AdminBlogController extends Controller
{
    public function create()
    {
        return view('admin.blogs.create');
    }

    public function store(Request $request)
    {
        
        // 1. Məlumatları yoxlayırıq (Validasiya)
        $validator = Validator::make($request->all(), [
            'title'       => 'required|string|max:255',
            'upload_date' => 'required|date',
            'uploader'    => 'required|string|max:255',
            'images'      => 'nullable|array', // Şəkillər massiv olaraq gələ bilər
            'images.*'    => 'image|mimes:jpeg,png,jpg,gif,svg|max:2048', // Hər bir şəkil üçün qaydalar
            'description' => 'required|string',
        ], [
            'title.required'       => 'Başlıq sahəsi boş ola bilməz.',
            'title.max'            => 'Başlıq ən çox 255 simvol ola bilər.',
            'upload_date.required' => 'Yüklənmə tarixi sahəsi boş ola bilməz.',
            'upload_date.date'     => 'Yüklənmə tarixi düzgün formatda olmalıdır.',
            'uploader.required'    => 'Yükləyən sahəsi boş ola bilməz.',
            'uploader.max'         => 'Yükləyən adı ən çox 255 simvol ola bilər.',
            'images.*.image'       => 'Yüklənən fayl şəkil olmalıdır.',
            'images.*.mimes'       => 'Şəkil formatı jpeg, png, jpg, gif və ya svg olmalıdır.',
            'images.*.max'         => 'Şəkil ölçüsü 2MB-dan çox ola bilməz.',
            'description.required' => 'Təsvir sahəsi boş ola bilməz.',
        ]);

        if ($validator->fails()) {
            return back()->withErrors($validator)->withInput();
        }

        $validatedData = $validator->validated();

        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                // Şəkilləri storage/app/public/uploads/blogs qovluğuna yadda saxlayır
                $path = $image->store('uploads/blogs', 'public');
                if (!$path) {
                    return back()->with('error', 'Şəkil yüklənərkən xəta baş verdi. Zəhmət olmasa, yenidən cəhd edin.')->withInput();
                }
                $imagePaths[] = $path;
            }
        }

        BlogModel::create([
            'title'       => $validatedData['title'],
            'slug'        => Str::slug($validatedData['title']),
            'created_at' => Carbon::parse($validatedData['upload_date'])->setTimezone('Asia/Baku')->toDateString(), // 'upload_date' sütununa yazırıq və saat qurşağını təyin edirik
            'created_by'  => $validatedData['uploader'],
            'description' => $validatedData['description'],
            'images'      => json_encode($imagePaths), // Şəkil yollarını JSON formatında saxlayırıq
        ]);

        return redirect()->route('admin.blogs.create')->with('success', 'Blog uğurla əlavə edildi!');
    }
}