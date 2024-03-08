<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Application;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class AdminController extends Controller
{
    public function showIndexPage()
    {
        $statuses = ['processed', 'approved', 'interviewed'];
        $user = User::get();
        $total_user = count($user);
        $user_general = count(User::where('role', 'general')->get());
        $user_recuiter = count(User::where('role', 'recuiter')->get());
        $user_applicant = count(User::where('role', 'applicant')->get());
        $user_processed = count(Application::where('status', 'processed')->get());
        $user_interviewed = count(Application::where('status', 'interviewed')->get());
        $user_approved = count(Application::where('status', 'approved')->get());
        return view('admin.index', compact('total_user', 'user_general', 'user_recuiter', 'user_applicant', 'user_processed', 'user_interviewed', 'user_approved'));
    }

    public function showManageUser()
    {
        $user = User::get();
        return view('admin.user', compact('user'));
    }

    public function showAddUser()
    {
        return view('admin.add');
    }

    public function createUser(Request $request)
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
            return redirect()->route('admin.manage.user.page');
        } catch (\Throwable $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }
}
