<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\PageVisit;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Carbon\Carbon;

class AdminDashboardController extends Controller
{
    public function index()
    {
        // 1. Ümumi Statistika (Bu gün, Dünən, Ümumi)
        $todayVisits = PageVisit::whereDate('created_at', Carbon::today())->count();
        $yesterdayVisits = PageVisit::whereDate('created_at', Carbon::yesterday())->count();
        $totalVisits = PageVisit::count();

        // 2. Qrafik üçün son 7 günün datası
        $last7Days = PageVisit::select(DB::raw('DATE(created_at) as date'), DB::raw('count(*) as views'))
            ->where('created_at', '>=', Carbon::now()->subDays(7))
            ->groupBy('date')
            ->orderBy('date', 'ASC')
            ->get();

        $chartLabels = $last7Days->pluck('date');
        $chartData = $last7Days->pluck('views');

        // 3. Ən Çox Baxılan Səhifələr
        $topPages = PageVisit::select('path', DB::raw('count(*) as views'))
            ->groupBy('path')
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        // 4. Ən Çox Daxil Olunan Ölkələr
        $topCountries = PageVisit::select('country', DB::raw('count(*) as views'))
            ->whereNotNull('country')
            ->groupBy('country')
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        // 5. Referans Mənbələri (Hardan gəliblər?)
        $topReferrers = PageVisit::select('referrer', DB::raw('count(*) as views'))
            ->whereNotNull('referrer')
            ->groupBy('referrer')
            ->orderByDesc('views')
            ->limit(5)
            ->get();

        return view('admin.dashboard', compact('todayVisits', 'yesterdayVisits', 'totalVisits', 'chartLabels', 'chartData', 'topPages', 'topCountries', 'topReferrers'));
    }
}