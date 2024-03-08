@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12">
                <h3>Dashboard</h3>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total Users</p>
                        <p class="fw-bold">
                        <h3>{{ $total_user }}</h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total General</p>
                        <p class="fw-bold">
                        <h3>{{ $user_general }}</h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total Recuiter</p>
                        <p class="fw-bold">
                        <h3>{{ $user_recuiter }}</h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total Applicant</p>
                        <p class="fw-bold">
                        <h3>{{ $user_applicant }}</h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Data Users Processed</p>
                        <p class="fw-bold">
                        <h3>{{ $user_processed }}</h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Data Users Interviewed</p>
                        <p class="fw-bold">
                        <h3>{{ $user_interviewed }}</h3>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Data Users Approved</p>
                        <p class="fw-bold">
                        <h3>{{ $user_approved }}</h3>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
