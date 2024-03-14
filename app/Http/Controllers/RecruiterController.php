<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;
use Svg\Tag\Rect;

class RecruiterController extends Controller
{
    public function showIndexPage()
    {
        $statuses = ['processed', 'approved', 'interviewed'];
        $user = User::get();
        $total_user = count($user);
        $user_general = count(User::where('role', 'general')->get());
        $user_recuiter = count(User::where('role', 'recruiter')->get());
        $user_applicant = count(User::where('role', 'applicant')->get());
        $user_processed = count(Application::where('status', 'processed')->get());
        $user_interviewed = count(Application::where('status', 'interviewed')->get());
        $user_approved = count(Application::where('status', 'approved')->get());
        return view('recruiter.index', compact('total_user', 'user_general', 'user_recuiter', 'user_applicant', 'user_processed', 'user_interviewed', 'user_approved'));
    }

    public function showApplicantDataPage()
    {
        $statuses = ['processed', 'approved', 'interviewed'];
        $data = Application::whereIn('status', $statuses)->get();
        return view('recruiter.applicant_data', compact('data'));
    }

    public function showApplicantHistoryPage()
    {
        $data = Application::get();
        return view('recruiter.applicant_history', compact('data'));
    }

    public function showManageUserPage()
    {
        $user = User::get();
        return view('recruiter.manage_user', compact('user'));
    }

    public function showCreateUserPage()
    {
        return view('recruiter.create_user');
    }

    public function showDetailDataApplicant($id)
    {
        $data = Application::where('id', $id)->with('user', 'position', 'educations', 'certificate', 'interviewer')->get();
        return view('recruiter.detail_data_applicant', compact('data'));
    }

    public function showEditUserPage($id)
    {
        $user = User::where('id', $id)->first();
        return view('recruiter.edit_user', compact('user'));
    }

    public function showSchedulePage($id)
    {
        $interviewers = User::whereRole('general')->get();
        $data = Application::where('id', $id)->with('user', 'position', 'educations', 'certificate', 'interviewer')->get();
        return view('recruiter.schedule', compact('data', 'interviewers'));
    }

    public function modalApproval($application)
    {
        $data = Application::where('id', $application)->get();
        $interviewers = User::whereRole('general')->get();
        return view('ajax.approval', compact('data', 'interviewers'));
    }

    public function storeUserProcess(Request $request)
    {
        try {
            User::create([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => '+62' . $request->phone_number,
                'role' => $request->select_role,
            ]);
            Alert::toast('Berhasil membuat akun', 'success');
            return redirect()->route('recruiter.manage.user.page');
        } catch (\Throwable $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }

    public function updateUserProcess(Request $request)
    {
        try {
            $user = User::find($request->id_user);

            if (!$user) {
                // Handle case where user is not found
                return redirect()->back()->with('error', 'User not found');
            }

            $user->update([
                'email' => $request->email,
                'password' => bcrypt($request->password),
                'first_name' => $request->first_name,
                'last_name' => $request->last_name,
                'phone_number' => $request->phone_number,
                'role' => $request->select_role,
            ]);

            Alert::toast('User information updated successfully', 'success');
            return redirect()->route('recruiter.manage.user.page');
        } catch (\Throwable $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }

    public function deleteUserProcess($id)
    {
        try {
            $user = User::find($id);
            if (!$user) {
                // Handle case where user is not found
                return redirect()->back()->with('error', 'User not found');
            }
            $user->delete();
            Alert::toast('User deleted successfully', 'success');
            return redirect()->route('recruiter.manage.user.page');
        } catch (\Throwable $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }

    public function updateSchedule(Request $request)
    {
        try {
            $application = Application::where('id', $request->id)->first();
            $application->update([
                'interview_date' => $request->interview_date,
                'interviewer_id' => $request->interviewer_id,
                'interview_location' => $request->interview_location,
            ]);
            // Update user data

            Alert::toast('Jadwal berhasil di update', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
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
