<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class RecruiterController extends Controller
{
    public function showIndexPage()
    {
        return view('recruiter.index');
    }
}
