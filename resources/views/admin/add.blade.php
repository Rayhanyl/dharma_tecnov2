@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header">
                        <h3>Create User</h3>
                    </div>
                    <div class="card-body">
                        <form class="row g-3" action="{{ route('admin.create.user.process') }}" method="POST">
                            @csrf
                            <div class="col-12 col-lg-3">
                                <label for="#">First Name</label>
                                <input type="text" class="form-control" name="first_name" id="first_name">
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="#">Last Name</label>
                                <input type="text" class="form-control" name="last_name" id="last_name">
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="#">Email</label>
                                <input type="email" class="form-control" name="email" id="email">
                            </div>
                            <div class="col-12 col-lg-3">
                                <label for="#">Phone Numver</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number">
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="#">Select Role</label>
                                <select class="form-select" name="select_role" id="select_role" aria-label="Select Role">
                                    <option selected>Open this select role</option>
                                    <option value="general">General</option>
                                    <option value="recuiter">Recuiter</option>
                                    <option value="applicant">Applicant</option>
                                </select>
                            </div>
                            <div class="col-12 col-lg-6">
                                <label for="#">Password</label>
                                <input type="text" class="form-control" name="phone_number" id="phone_number">
                            </div>
                            <div class="col-12 text-center">
                                <button type="submit" class="btn btn-primary w-50"><i class="fa fa-user-plus"
                                        aria-hidden="true"></i> Create User</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
