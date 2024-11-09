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

            $attributes['tags'] =
                array_map(
                    fn($tag) =>
                    strtolower(trim($tag)),
                    explode(',', $attributes['tags'])
                ); // web , video, education


            foreach ($attributes['tags'] as $tag) {
                $job->tag($tag);
            }
        }

        return redirect('/');
    }

    public function show(Job $job)
    {
        return " show job";
    }

    public function edit(Job $job)
    {
        $tags = $job->tags->pluck('name')->implode(', '); //format tags to be separeted by commas
        return view('jobs.edit', [
            'job' => $job,
            'tags' => $tags
        ]);
    }

    public function update(Request $request, Job $job)
    {
        $attributes = $request->validate([
            'title' => 'required',
            'salary' => 'required',
            'location' => 'required',
            'schedule' => ['required', 'in:Part Time,Full Time'],
            'url' => ['required', 'url'],
            'tags' => ['nullable']
        ]);

        //update job attributes except for tags
        $job->update(Arr::except($attributes, ['tags']));

        // process tags
        if ($attributes['tags']) {

            // split the tags, trim spaces, and make them lowercase
            $tags = array_map('trim', explode(',', strtolower($attributes['tags'])));

            // remove any existing tags first
            $job->tags()->detach();

            // attach each tag using the `tag` method on the Job model
            foreach ($tags as $tag) {
                $job->tag($tag);
            }
        } else {
            // if no tags provided, detach all
            $job->tags()->detach();
        }

        return redirect()->route('jobs.index')->with('success', 'Job updated successfully');
    }

}
