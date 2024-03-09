@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12 col-lg-7">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <h5>Selamat Datang <b class="text-primary">( {{ session('name') }} ) </b> di Portal Rekrutmen </h5>
                        <p style="text-align: justify;">Akun ini akan digunakan untuk mengirim lamaran pekerjaan yang
                            tersedia di PT Dharma Tekno Indonesia. Pastikan email yang digunakan merupakan e-mail aktif
                            untuk mendapatkan pemberitahuan mengenai lowongan pekerjaan atau status lamaran</p>
                    </div>
                </div>
            </div>
            <div class="col-12 col-lg-5">
                @if ($data)
                    @if ($data->status == 'processed' || $data->status == 'interviewed')
                        <div class="col-12">
                            <h4 class="fw-bold text-warning">
                                <i class="fa fa-warning"></i>
                                Lamaran sedang dalam proses seleksi
                            </h4>
                        </div>
                    @elseif ($data->status == 'accepted')
                        <div class="col-12">
                            <h4 class="fw-bold text-success">
                                <i class="fa fa-success"></i>
                                Anda telah diterima
                            </h4>
                        </div>
                    @endif
                @else
                    <div class="col-12 d-flex justify-content-center">
                        <a href="{{ route ('applicant.lamaran.page') }}" class="btn bg-gradient-info w-50 mt-4 mb-0 shadow">Lamar</a>
                    </div>
                @endif
            </div>
            @if ($data)
                @if ($data->status == 'interviewed')
                    <div class="col-12 row d-flex justify-content-center my-2">
                        <div class="col-12 col-lg-8">
                            <div class="card rounded-4 shadow">
                                <div class="card-body">
                                    <h6 class="text-uppercase fw-bolder">Jadwal Interview</h6>
                                    <hr>
                                    <div class="row">
                                        <div class="col-12 col-lg-12 row">
                                            <div class="col-4">
                                                <h6>Tanggal Interview</h6>
                                                <p>{{ $data->interview_date }}</p>
                                            </div>
                                            <div class="col-4">
                                                <h6>Pewawancara</h6>
                                                <p class="text-capitalize">
                                                    {{ $data->interviewer->first_name }}
                                                    {{ $data->interviewer->last_name }}</p>
                                            </div>
                                            <div class="col-4">
                                                <h6>Pelamar</h6>
                                                <p class="text-capitalize">{{ $data->fullname }}</p>
                                            </div>
                                            <div class="col-12">
                                                <h6>Address / Link meet</h6>
                                                <p>{{ $data->interview_location }}</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @endif
            @endif
        </div>
    </div>
@endsection
@push('script')
    <script>
        $(document).ready(function() {
            $('#table-data-interviewee').DataTable({
                responsive: true,
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, 'All'],
                ],
                order: [
                    [0, 'asc']
                ],
            });
        });
    </script>
@endpush
