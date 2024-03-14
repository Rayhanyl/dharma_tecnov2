<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Position;
use App\Models\Education;
use App\Models\Application;
use App\Models\Certificate;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use Illuminate\Support\Facades\Validator;
use App\Http\Requests\StoreApplicationRequest;
use App\Http\Requests\UpdateApplicationRequest;

class ApplicantController extends Controller
{
    public function showIndexPage()
    {
        $data = Application::whereUserId(Auth::user()->id)->latest('id')->first();
        return view('applicant.index', compact('data'));
    }

    public function showLamaranPage()
    {
        $positions = Position::all();
        return view('applicant.lamaran', compact('positions'));
    }

    public function showStatusPage()
    {
        $application = Application::whereUserId(Auth::user()->id)->latest('id')->first();
        return view('applicant.status', compact('application'));
    }

    public function showAccountPage()
    {
        return view('applicant.account');
    }

    public function updateDataUserProcess(Request $request)
    {
        try {
            $user = Auth::user();

            // Validation rules
            $rules = [
                'password' => 'nullable|min:6|confirmed',
            ];

            // Validation messages
            $messages = [
                'password.confirmed' => 'The password confirmation does not match.',
            ];

            // Validate the request
            $validator = Validator::make($request->all(), $rules, $messages);
            // Check for validation failure
            if ($validator->fails()) {
                Alert::toast('Error', 'warning');
                return redirect()->back()->withErrors($validator)->withInput();
            }

            // Update user data
            User::where('id', $user->id)->update([
                'first_name' => $request->nama_depan,
                'last_name' => $request->nama_belakang,
                'email' => $request->email,
                'phone_number' => $request->phone,
                'password' => bcrypt($request->password), // Hash the password
            ]);

            Alert::toast('Profil berhasil di update', 'success');
            return redirect()->back();
        } catch (\Exception $e) {
            Alert::warning('Error', 'Contact Developer to Fix This');
            return redirect()->back();
        }
    }

    public function storeLamaran(Request $request)
    {
        $application = new Application;
        if ($request->hasFile('cv')) {
            $request->file('cv')->storeAs('public/media/applications', $request->cv->hashName());
        }
        $application->fullname              = $request->fullname;
        $application->identity_number       = $request->noidentitas;
        $application->birthplace            = $request->tmplahir;
        $application->birthdate             = $request->ttglahir;
        $application->religion              = $request->agama;
        $application->address               = $request->alamatlengkap;
        $application->residence_address     = $request->sesuaiktp;
        $application->active_phone          = $request->nohp;
        $application->job_histories         = $request->riwayat_pekerjaan;
        $application->leader_job_histories  = $request->riwayat_atasan_bawahan;
        $application->reason_to_apply       = $request->alasan_ingin_bekerja_diperusahaan;
        $application->salary_expectation    = $request->harapan_gaji;
        $application->facility_expectation  = $request->fasilitas_tambahan;
        $application->work_date             = $request->kesiapan_mulai_bekerja;
        $application->relation_person       = $request->kenalan_didalam_perusahaan;
        $application->cv                    = $request->cv->hashName();
        $application->cv_ext                = $request->cv->getClientOriginalExtension();
        $application->status                = 'processed';
        $application->position_id           = $request->position_id;
        $application->user_id               = Auth::User()->id;
        $application->save();
        if ($request->riwayat_pendidikan) {
            foreach ($request->riwayat_pendidikan as $value) {
                $education = new Education;
                $education->application_id    = $application->id;
                $education->university        = $value['nama_universitas'];
                $education->ipk               = $value['nilai_ipk'];
                $education->organizations     = $value['organiasi_diikuti'];
                $education->graduated_year    = $value['tahun_lulus'];
                $education->year              = $value['tahun_organisasi'];
                $education->position          = $value['jabatan_organisasi'];
                $education->save();
            }
        }
        if ($request->sertifikat) {
            foreach ($request->sertifikat as $idx => $value) {
                $certificate = new Certificate;
                // if ($request->hasFile('sertifikat')[$idx]) {
                $request->file('sertifikat')[$idx]->storeAs('public/media/certificates', $request->sertifikat[$idx]->hashName());
                // }
                $certificate->application_id    = $application->id;
                $certificate->certificate       = $request->sertifikat[$idx]->hashName();
                $certificate->certificate_ext   = $request->sertifikat[$idx]->getClientOriginalExtension();
                $certificate->save();
            }
        }

        Alert::toast('Pendaftaran berhasil, Form lamaran akan segera di proses', 'success');
        return redirect()->route('applicant.index.page');
    }
}
