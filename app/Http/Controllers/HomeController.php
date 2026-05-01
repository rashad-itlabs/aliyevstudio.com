<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use App\Models\BlogModel;
use App\Models\CourseRegistration;

class HomeController extends Controller
{
    public function index()
    {
        return view('pages.index');
    }

    public function portfolio()
    {
        return view('pages.portfolio');
    }

    public function services()
    {
        return view('pages.services');
    }

    public function about()
    {
        return view('pages.about');
    }

    public function blog()
    {
        $blogs = BlogModel::latest()->paginate(5); // Son əlavə olunan 5 blogu səhifələmə ilə çəkirik
        $featuredBlogTitle = BlogModel::latest()->first(); // Ən son əlavə olunan blogu önə çıxarılan olaraq götürürük
        $featuredBlog = BlogModel::latest()->get(); // Ən son əlavə olunan blogu önə çıxarılan olaraq götürürük
        //dd($featuredBlog);
        return view('pages.blog', compact('blogs', 'featuredBlog','featuredBlogTitle'));
    }

    public function blog_detail($slug)
    {
        $this->data['blogs'] = BlogModel::where('slug', $slug)->firstOrFail(); // Use firstOrFail to handle 404 if not found
        return view('pages.blog-detail', $this->data);
    }

    public function ourTeam()
    {
        return view('pages.our-team');
    }

    public function contact()
    {
        return view('pages.contact');
    }

    public function courses()
    {
        return view('pages.courses');
    }

    public function serviceDetail()
    {
        return view('pages.service_detail');
    }

    public function privacy()
    {
        return view('pages.privacy');
    }
    

    public function storeCourse(Request $request)
    {
        // 1. Məlumatları yoxlayırıq
        $validated = $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255',
            'phone' => 'required|string|max:50',
            'level' => 'required|string',
            'message' => 'nullable|string'
        ]);

        // 2. Baza cədvəlinə əlavə edirik
        CourseRegistration::create($validated);

        // 3. WhatsApp üçün mesaj mətni hazırlayırıq
        $whatsappNumber = '994556691248'; // Məlumatın gedəcəyi WhatsApp nömrəsi (saytdakı nömrəniz)
        
        $messageText = "🔥 *Yeni Kurs Qeydiyyatı* 🔥\n\n";
        $messageText .= "👤 *Ad, Soyad:* " . $validated['name'] . "\n";
        $messageText .= "✉️ *E-poçt:* " . $validated['email'] . "\n";
        $messageText .= "📞 *Telefon:* " . $validated['phone'] . "\n";
        $messageText .= "📊 *Təcrübə:* " . ($validated['level'] == 'beginner' ? 'Başlanğıc (Təcrübəm yoxdur)' : 'Orta (Biraz təcrübəm var)') . "\n";
        if (!empty($validated['message'])) {
            $messageText .= "💬 *Əlavə mesaj:* " . $validated['message'];
        }
        
        $whatsappUrl = "https://api.whatsapp.com/send?phone=" . $whatsappNumber . "&text=" . urlencode($messageText);

        // 4. Uğur mesajı və WhatsApp linki ilə eyni səhifəyə qaytarırıq
        return back()->with('success', 'Təbrik edirik! Qeydiyyatınız uğurla tamamlandı. WhatsApp-a yönləndirilirsiniz...')
                     ->with('whatsapp_url', $whatsappUrl);
    }

    public function sitemap()
    {
        return response()->view('pages.sitemap')->header('Content-Type', 'text/xml');
    }
}
