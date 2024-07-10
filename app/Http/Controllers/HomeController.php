<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function index()
    {
        $jobs = Jobs::with(['category', 'User', 'city'])->orderBy('created_at', 'desc')->get();
        $categories = Category::all();
        $cities = City::all();

        // dd($user_info);
        return view('guest.home', [
            'title' => 'HandyHelp | Connecting Hands, Solving demands',
            'jobs' => $jobs,
            'categories' => $categories,
            'cities' => $cities
        ]);
    }

    public function about()
    {
        $contractor = User::where('role', '=', 'contractor')->count();
        $member = User::where('role', '=', 'member')->count();
        $jobs = Jobs::where('ava', '=', 'y')->count();

        return view('guest.about', [
            'title' => 'HandyHelp | About Us',
            'contractor' => $contractor,
            'member' => $member,
            'jobs' => $jobs
        ]);
    }
}
