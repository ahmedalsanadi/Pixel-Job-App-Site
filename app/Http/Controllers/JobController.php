<?php

namespace App\Http\Controllers;

use App\Models\Job;
use App\Models\Tag;
use App\Http\Requests\StoreJobRequest;
use App\Http\Requests\UpdateJobRequest;


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
        //
    }



    public function show(Job $job)
    {
        //
    }


    public function edit(Job $job)
    {
        //
    }

    public function update()
    {

    }


    public function destroy(Job $job)
    {
        //
    }
}
