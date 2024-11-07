<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;
use Auth;
use Illuminate\Support\Arr;
use Request;


class JobController extends Controller
{

    public function index()
    {
        //group them according to whether they are featured or not
        $jobs = Job::all()->groupBy('featured');
        return view('jobs.index', [
            'featuredJobs' => $jobs[0], //featured jobs
            'jobs' => $jobs[1], // un-featured jobs
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
