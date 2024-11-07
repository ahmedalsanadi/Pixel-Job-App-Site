<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Tag;

class TagController extends Controller
{
    public function __invoke(Tag $tag)
    {
        //jobs for this tag
        return view('results',["jobs"=>$tag->jobs]);
    }
}
