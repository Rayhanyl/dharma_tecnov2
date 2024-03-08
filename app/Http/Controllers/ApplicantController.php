<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ApplicantController extends Controller
{
    public function showIndexPage()
    {
        $data = Application::whereUserId(Auth::user()->id)->latest('id')->first();
        return view('applicant.index', compact('data'));
    }
}
