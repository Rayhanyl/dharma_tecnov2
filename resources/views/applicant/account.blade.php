@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12">
                <h3>Account Data</h3>
                <hr>
            </div>
            <div class="col-12">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        <form class="row" action="{{ route('applicant.update.user.process') }}" method="POST">
                            @csrf
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="nama-depan">Nama Depan</label>
                                <input type="text" class="form-control" id="nama-depan" name="nama_depan"
                                    placeholder="Masukan nama depan" aria-label="Nama Depan"
                                    aria-describedby="nama-depan-addon" value="{{ Auth::user()->first_name }}">
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="nama-belakang">Nama Belakang</label>
                                <input type="text" class="form-control" id="nama-belakang" name="nama_belakang"
                                    placeholder="Masukan nama belakang" aria-label="Nama Belakang"
                                    aria-describedby="nama-belakang-addon" value="{{ Auth::user()->last_name }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="">Email</label>
                                <input type="email" class="form-control" placeholder="Enter Your Email" name="email"
                                    aria-label="Email" aria-describedby="email-addon" value="{{ Auth::user()->email }}">
                            </div>
                            <div class="col-12 mb-3">
                                <label for="">Phone</label>
                                <input type="text" class="form-control" placeholder="Enter Your Number Phone"
                                    name="phone" aria-label="Phone" aria-describedby="phone-addon"
                                    value="{{ Auth::user()->phone_number }}">
                                <div id="emailHelp" class="form-text">Example number: +62852xxxxxxx</div>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="">Password</label>
                                <input type="password" class="form-control" placeholder="Password" aria-label="Password"
                                    name="password" aria-describedby="password-addon">
                                <div id="emailHelp" class="form-text">We'll never share your password with anyone else.
                                </div>
                            </div>
                            <div class="col-12 col-lg-6 mb-3">
                                <label for="">Confirm Password</label>
                                <input type="password" class="form-control" placeholder="Confirm Password"
                                    aria-label="Password" name="password_confirmation"
                                    aria-describedby="confirm-password-addon">
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn bg-gradient-dark w-100 my-4 mb-2">Update personal data</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
