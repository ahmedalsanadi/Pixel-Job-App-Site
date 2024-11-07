<?php

namespace App\Http\Controllers;

use App\Models\Job;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function __invoke()
    {
        // dd(request("q"));
        $jobs = Job::where("title","LIKE","%". request("q") ."%")->get();
        return view('results',["jobs"=>$jobs]);
    }
}
