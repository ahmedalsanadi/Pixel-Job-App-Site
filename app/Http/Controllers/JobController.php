<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;



class JobController extends Controller
{

    public function index()
    {
      //group them according to whether they are featured or not
        $jobs = Job::latest()
            ->with(['employer', 'tags'])
            ->get()
            ->groupBy('featured');

        return view('jobs.index', [

            'jobs' => $jobs[0], // un-featured jobs
            'featuredJobs' => $jobs[1], //featured jobs
            'tags' => Tag::all()

        ]);
    }


    public function create()
    {
        return view('jobs.create');
    }

    public function store(Request $request)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'schedule' => ['required', 'in:Part Time,Full Time'],
            'url' => ['required', 'url'],
            'tags' => ['nullable']
        ]);
        $attributes['featured'] = $request->has('featured');
        $job = Auth::user()->employer->jobs()->create(Arr::except($attributes, ['tags']));

        if ($attributes['tags']) {
            $attributes['tags'] = explode(',', $attributes['tags']); // web , video, education
            foreach ($attributes['tags'] as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

}
