@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header">
                        <a class="text-bold" href="{{ route('recruiter.manage.user.page') }}"><i
                                class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to list manage user</a>
                        <hr>
                        <h3>Edit User</h3>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('recruiter.update.user') }}" method="POST">
                            @csrf
                            <input type="hidden" name="id_user" id="id_user" value="{{ $user->id }}">
                            <div class="col-12 col-lg-3">
                                <label for="#">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name"
                                    value="{{ $user->first_name }}" required>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="#">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name"
                                    value="{{ $user->last_name }}" required>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="#">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    value="{{ $user->email }}" required>
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="#">Phone Number</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number"
                                    value="{{ $user->phone_number }}" required>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="#">Select Role</label>
                                <select class="form-select" name="select_role" id="select_role" aria-label="Select Role"
                                    required>
                                    <option>Open this select role</option>
                                    <option {{ $user->role == 'general' ? 'selected' : '' }} value="general">General
                                    </option>
                                    <option {{ $user->role == 'recruiter' ? 'selected' : '' }} value="recruiter">Recuiter
                                    </option>
                                    <option {{ $user->role == 'applicant' ? 'selected' : '' }} value="applicant">Applicant
                                    </option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="#">Password</label>
                                <input type="password" class="form-control" name="password" id="password" required>
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50"><i class="fa fa-user-plus"
                                        aria-hidden="true"></i> Edit User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
