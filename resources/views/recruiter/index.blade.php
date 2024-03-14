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
                        <h2>{{ $total_user }}</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total User General Affair</p>
                        <p class="fw-bold">
                        <h2>{{ $user_general }}</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total User Recuiter</p>
                        <p class="fw-bold">
                        <h2>{{ $user_recuiter }}</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-3">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Total User Applicant</p>
                        <p class="fw-bold">
                        <h2>{{ $user_applicant }}</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Data Users Processed</p>
                        <p class="fw-bold">
                        <h2>{{ $user_processed }}</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Data Users Interviewed</p>
                        <p class="fw-bold">
                        <h2>{{ $user_interviewed }}</h2>
                        </p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-4">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <p class="fw-semibold">Data Users Passed The Selection</p>
                        <p class="fw-bold">
                        <h2>{{ $user_approved }}</h2>
                        </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
