<?php

namespace App\Http\Controllers;

use App\Models\City;
use App\Models\Jobs;
use App\Models\User;
use App\Models\Country;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\File;
use Illuminate\Console\View\Components\Alert;
use \Cviebrock\EloquentSluggable\Services\SlugService;

class JobsController extends Controller
{
    public function index()
    {
        $cities = City::all();
        $categories = Category::all();

        return view('member.member-posting', [
            'title' => 'HandyHelp | Posting Job',
            'cities' => $cities,
            'categories' => $categories
        ]);
    }

    public function store(Request $request)
    {
        // dd($request);
        $request->validate([
            'title' => 'required|min:8|max:150',
            'slug' => 'required|unique:jobs,slug',
            'image_1' => 'required|image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'image|mimes:jpeg,png,jpg|max:2048',
            'detail' => 'required|min:50|max:10000',
            'category_id' => 'required|numeric|min_digits:1',
            'location_id' => 'required|numeric|min_digits:1',
            'rate' => 'required|numeric|min:10000|max_digits:1000',
            'phone' => 'required|numeric|min_digits:8|max_digits:15',
            'option_one' => 'nullable',
            'option_two' => 'nullable'
        ]);

        $image_1 = time() . '.' . $request->image_1->getClientOriginalName();
        $request->image_1->move(public_path('img/jobs'), $image_1);

        if ($request->image_2) {
            $image_2 = time() . '.' . $request->image_2->getClientOriginalName();
            $request->image_2->move(public_path('img/jobs'), $image_2);
        }

        if ($request->image_3) {
            $image_3 = time() . '.' . $request->image_3->getClientOriginalName();
            $request->image_3->move(public_path('img/jobs'), $image_3);
        }

        $job = new Jobs;
        $job->user_id = Auth::user()->id;
        $job->title = $request->title;
        $job->slug = $request->slug;
        $job->image1 = $image_1;
        $job->detail = $request->detail;
        $job->category_id = $request->category_id;
        $job->location_id = $request->location_id;
        $job->rate = $request->rate;
        $job->phone = $request->phone;

        if ($request->image_2) {
            $job->image2 = $image_2;
        }

        if ($request->image_3) {
            $job->image3 = $image_3;
        }

        if ($request->option_one) {
            $job->option_one = $request->option_one;
        }

        if ($request->option_two) {
            $job->option_two = $request->option_two;
        }

        $job->save();

        return redirect('/profile')->with('success', 'Your job offer has been successfully uploaded!');
    }

    public function checkSlug(Request $request)
    {
        $slug = SlugService::createSlug(Jobs::class, 'slug', $request->title);
        return response()->json(['slug' => $slug]);
    }

    public function jobs()
    {
        if (request('search') or request('city') or request('category')) {
            return view('guest.jobs', [
                'title' => 'Handy Help | ' . request('search') . request('city') . (str_replace('-', ' ', request('category'))),
                'jobs' => Jobs::with(['category', 'User', 'city'])->latest()->filter(request(['search', 'city', 'category']))->paginate(10)->withQueryString(),
                'cities' => City::all(),
                'categories' => Category::all(),
                'search' => request('search'),
                'city' => request('city'),
                'category' => str_replace('-', ' ', request('category'))
            ]);
        } else {
            return view('guest.jobs', [
                'title' => 'HandyHelp | Jobs',
                'jobs' => Jobs::with(['category', 'User', 'city'])->latest()->paginate(10),
                'cities' => City::all(),
                'categories' => Category::all()
            ]);
        }
    }

    public function show(Jobs $job)
    {
        return view('guest.jobdetail', [
            'title' => $job->title,
            'job' => $job,
            'jobs' => $job
        ]);
    }

    // public function city(City $city)
    // {
    //     if (request('city')) {
    //         $city = City::firstWhere('slug', request('city'));
    //     }

    //     return view('guest.jobs', [
    //         'title' => 'Jobs Located in ' . $city->name,
    //         'jobs' => Jobs::with(['category', 'User', 'city'])->latest()->filter(request(['search', 'city', 'category']))->paginate(10)->withQueryString(),
    //         'cities' => City::all(),
    //         'categories' => Category::all(),
    //         'city' => $city->name
    //     ]);
    // }

    public function edit($slug)
    {
        $cities = City::all();
        $categories = Category::all();
        $job = Jobs::where('slug', $slug)->first();

        return view('member.edit-posting', [
            'title' => 'HandyHelp | Posting Job',
            'cities' => $cities,
            'categories' => $categories,
            'job' => $job
        ]);
    }

    public function update(Request $request, $slug)
    {
        $job = Jobs::where('slug', $slug)->first();
        // dd($job);
        $rules = [
            'title' => 'required|min:8|max:150',
            'image_1' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image_2' => 'image|mimes:jpeg,png,jpg|max:2048',
            'image_3' => 'image|mimes:jpeg,png,jpg|max:2048',
            'detail' => 'required|min:50|max:10000',
            'category_id' => 'required|numeric|min_digits:1',
            'location_id' => 'required|numeric|min_digits:1',
            'rate' => 'required|numeric|min:10000|max_digits:1000',
            'phone' => 'required|numeric|min_digits:8|max_digits:15',
            'option_one' => 'nullable',
            'option_two' => 'nullable'
        ];

        if ($job->slug != $request->slug) {
            $rules['slug'] = 'required|unique:jobs';
        } else {
            $rules['slug'] = 'required';
        }

        $validatedData = $request->validate($rules);

        $data = [
            $job->title = $validatedData['title'],
            $job->detail = $validatedData['detail'],
            $job->category_id = $validatedData['category_id'],
            $job->location_id = $validatedData['location_id'],
            $job->rate = $validatedData['rate'],
            $job->phone = $validatedData['phone'],
            $job->option_one = $validatedData['option_one'],
            $job->option_two = $validatedData['option_two']
        ];

        if ($request->image_1) {
            File::delete('img/jobs/' . $job->image1);

            $image1 =  time() . '-' . $validatedData['image_1']->getClientOriginalName();
            $validatedData['image_1']->move(public_path('img/jobs'), $image1);

            $data['image1'] = $image1;
        }

        if ($request->image_2) {
            File::delete('img/jobs/' . $job->image2);

            $image2 =  time() . '-' . $validatedData['image_2']->getClientOriginalName();
            $validatedData['image_2']->move(public_path('img/jobs'), $image2);

            $data['image2'] = $image2;
        }

        if ($request->image_3) {
            File::delete('img/jobs/' . $job->image3);

            $image3 =  time() . '-' . $validatedData['image_3']->getClientOriginalName();
            $validatedData['image_3']->move(public_path('img/jobs'), $image3);

            $data['image3'] = $image3;
        }

        if ($request->image_4) {
            File::delete('img/jobs/' . $job->image4);

            $image4 =  time() . '-' . $validatedData['image_4']->getClientOriginalName();
            $validatedData['image_4']->move(public_path('img/jobs'), $image4);

            $data['image4'] = $image4;
        }

        $job->update($data);
        return redirect('/profile')->with('success', 'Your job offer has been successfully updated!');
    }
}
