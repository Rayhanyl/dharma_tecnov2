<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class RecruiterController extends Controller
{
    public function showIndexPage()
    {
        $statuses = ['processed', 'approved', 'interviewed'];
        $data = Application::whereIn('status', $statuses)->get();
        return view('recruiter.index', compact('data'));
    }

    public function modalApproval($application)
    {
        $data = Application::where('id', $application)->get();
        $interviewers = User::whereRole('interviewer')->get();
        return view('ajax.approval', compact('data', 'interviewers'));
    }

    public function updateApproval(Request $request)
    {
        try {
            $application = Application::where('id', $request->idApplication)->first();
            $value = [];
            if ($application->status == 'processed') {
                $value = [
                    'interview_date' => $request->interview_date,
                    'interviewer_id' => $request->interviewer_id,
                    'interview_location' => $request->interview_location,
                ];
            }
            $status = [
                'status' => $request->approvalApplication,
            ];
            $merge = array_merge($value, $status);
            $application->update($merge);
            // Update user data

            Alert::toast('Profil berhasil di update', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }
}
