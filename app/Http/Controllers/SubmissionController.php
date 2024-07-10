<?php

namespace App\Http\Controllers;

use App\Models\Jobs;
use App\Models\Review;
use App\Models\Submission;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class SubmissionController extends Controller
{
    public function index(Request $request, $id)
    {
        if (Auth::user()->role == 'contractor') {
            $job = Jobs::findOrFail($id);
            $request->validate([
                'rate_offer' => 'required',
                'comb' => 'required|unique:submissions'
            ]);
            $input['job_id'] = $job->id;
            $input['contractor_id'] = Auth::user()->id;
            $input['comb'] = $request->comb;
            $input['rate_offer'] = $request->rate_offer;
            Submission::create($input);

            return redirect()->back()->with('success', 'Your offer has been successfully submitted!');
        } else {
            return redirect()->back()->with('failed', 'Your offer has been successfully submitted!');
        }
    }

    public function contractor()
    {
        $subs = Submission::join('users', 'submissions.contractor_id', '=', 'users.id')
            ->where('submissions.contractor_id', '=', Auth::user()->id)->latest('submissions.created_at')
            ->select('submissions.*')->with('Job')->get();
        // dd($subs);
        return view('contractor.submission', [
            'title' => 'HandyHelp | My Submission',
            'subs' => $subs
        ]);
    }

    public function member(Jobs $job)
    {
        $subs = Submission::join('jobs', 'submissions.job_id', '=', 'jobs.id')
            ->join('users', 'jobs.user_id', '=', 'users.id')
            ->where('submissions.job_id', '=', $job->id)
            ->where('jobs.user_id', '=', Auth::user()->id)
            ->latest('submissions.created_at')
            ->select('submissions.*')->with('Contractor')->get();

        return view('member.submission', [
            'title' => 'HandyHelp | My Submission',
            'subs' => $subs
        ]);
    }

    public function decline(Submission $sub)
    {
        $sub->status = 'reject';
        $sub->comb = '';
        $sub->update();
        return redirect()->back();
    }

    public function accept(Submission $sub)
    {
        $job = Jobs::findOrFail($sub->job_id);
        $job->ava = 'n';
        $job->save();

        $subs = Submission::where('job_id', '=', $sub->job_id)->get();
        foreach ($subs as $sub) {
            $sub->status = 'reject';
            $sub->update();
        }
        $sub->status = 'accept';
        $sub->update();
        return redirect()->back();
    }

    public function status(Jobs $job)
    {
        $subs = Submission::join('jobs', 'submissions.job_id', '=', 'jobs.id')
            ->where('submissions.job_id', '=', $job->id)
            ->where('submissions.status', '!=', 'reject')
            ->select('submissions.*')->get();

        return view('member.status', [
            'title' => 'HandyHelp | My Submission',
            'subs' => $subs
        ]);
    }

    public function progress(Jobs $job)
    {
        $subs = Submission::join('jobs', 'submissions.job_id', '=', 'jobs.id')
            ->where('submissions.job_id', '=', $job->id)
            ->where('submissions.status', '!=', 'reject')
            ->select('submissions.*')->with('Contractor')->get();

        return view('member.status', [
            'title' => 'HandyHelp | My Submission',
            'subs' => $subs
        ]);
    }

    public function dojob(Submission $sub)
    {
        $sub->status = 'doing';
        $sub->update();
        return redirect()->back();
    }

    public function done_(Submission $sub)
    {
        $sub->status = 'done_';
        $sub->update();
        return redirect()->back();
    }

    public function done(Submission $sub)
    {
        $sub->status = 'done';
        $sub->update();
        return redirect()->back();
    }

    public function review(Submission $sub)
    {
        $user = User::findOrFail(Auth()->user()->id)->name;
        return view('member.review', [
            'title' => 'HandyHelp | My Submission',
            'sub' => $sub,
            'user' => $user
        ]);
    }

    public function store(Request $request, $id)
    {
        $sub = Submission::findOrFail($id);
        $sub->status = 'reviewed';
        $sub->save();

        $job = Jobs::findOrFail($sub->job_id);

        $request->validate([
            'name' => 'required|min:4|max:50',
            'rating' => 'required|min_digits:1',
            'review' => 'required|min:10|max:100'
        ]);

        $review = new Review;
        $review->member_id = $job->user_id;
        $review->contractor_id = $sub->contractor_id;
        $review->name = $request->name;
        $review->review = $request->review;
        $review->rating = $request->rating;
        $review->save();
        return redirect('/profile')->with('review', 'Your review has been successfully submitted!');
    }
}
