<?php

namespace App\Http\Controllers;

use App\Models\Application;
use Illuminate\Http\Request;

class GeneralController extends Controller
{
    public function showIndexPage()
    {
        $statuses = ['interviewed'];
        $data = Application::whereIn('status', $statuses)->get();
        return view('generalaffair.index',compact('data'));
    }

    public function detailApplicant($id)
    {
        $data = Application::where('id', $id)->with('user', 'position', 'educations', 'certificate', 'interviewer')->get();
        return view('generalaffair.detail_data_applicant', compact('data'));
    }
}
