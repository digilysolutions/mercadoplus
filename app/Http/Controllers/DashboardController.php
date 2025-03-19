<?php

namespace App\Http\Controllers;

use App\Models\District;
use App\Models\Regional;
use App\Models\Specialty;
use App\Models\Student;
use App\Models\StudyCenter;
use Illuminate\Http\Request;
use Illuminate\Support\Composer;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
        public function index()
        {
            $activeUsersCount = DB::table('sessions')
                ->where('last_activity', '>=', now()->subMinutes(5)->timestamp)
                ->count();

            return view('dashboard', ['activeUsersCount' => $activeUsersCount]);
        }
    public function dashboardAmdin()
    {
        if (!Auth::check() || Auth::user()->role!="Administrador") {

            return redirect('/'); // Redirigir a la página de inicio u otra página si no tiene acceso
        }
        return view('dashboard');
    }
}
