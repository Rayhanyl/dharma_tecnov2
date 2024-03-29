@extends('layouts.app')
@section('content')
    <style>
        #progressbar {
            margin-bottom: 3vh;
            overflow: hidden;
            color: #252f40;
            padding-left: 0;
            margin-top: 3vh;
        }

        #progressbar li {
            list-style-type: none;
            font-size: 0.9rem;
            width: 33.3%;
            float: left;
            position: relative;
            font-weight: 700;
            color: #252f40;
        }

        #progressbar li:before {
            line-height: 29px;
            display: block;
            font-size: 12px;
            background: #8392ab;
            border-radius: 50%;
            z-index: -1;
            margin-bottom: 1vh;
        }

        #progressbar li:after {
            content: '';
            height: 3px;
            background: #8392ab;
            position: absolute;
            left: 0%;
            right: 0%;
            margin-bottom: 2vh;
            top: 8px;
            z-index: 1;
        }

        #progressbar #step1:before,
        #progressbar #step2:before,
        #progressbar #step3:before,
        #progressbar #step4:before {
            content: "";
            color: #82d616;
            width: 20px;
            height: 20px;
            margin-left: 0;
            margin-right: 0;
        }

        #progressbar li:nth-child(2):after {
            margin-right: auto;
        }

        #progressbar li:nth-child(1):after {
            margin: auto;
        }

        #progressbar li:nth-child(3):after {
            float: left;
        }

        #progressbar li:nth-child(4):after {
            margin-left: auto;
        }

        #progressbar li.active:before,
        #progressbar li.active:after {
            background: #82d616;
            color: #82d616 !important;
        }

        #progressbar li.active {
            color: #82d616 !important;
        }

        #three {
            font-size: 1.2rem;
        }

        @media (max-width: 767px) {
            #three {
                font-size: 1rem;
            }
        }

        .progress-track {
            padding: 0;
        }
    </style>
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row">
            <div class="col-12">
                <h3>Status Lamaran</h3>
                <hr>
            </div>
            <div class="col-12">
                <div class="card shadow rounded-4">
                    <div class="card-body">
                        @if ($application)
                            <h6>Posisi yang dilamar : {{ $application->position->name }}</h6>
                            @if ($application->status == 'rejected')
                                <h4 class="text-danger text-center">Maaf, anda tidak lolos seleksi</h4>
                            @else
                                <div class="progress-track">
                                    <ul id="progressbar">
                                        <li class="step0 {{ $application->status == 'processed' || $application->status == 'interviewed' || $application->status == 'accepted' ? 'active' : '' }}"
                                            id="step1">Berkas Diproses</li>
                                        <li class="step0 {{ $application->status == 'interviewed' || $application->status == 'accepted' ? 'active' : '' }}"
                                            id="step3">Tahap Wawancara</li>
                                        <li class="step0 {{ $application->status == 'accepted' ? 'active' : '' }}"
                                            id="step4">Lolos Seleksi</li>
                                    </ul>
                                </div>
                            @endif
                        @else
                            <div class="text-center">
                                <a href="{{ route('applicant.lamaran.page') }}"
                                    class="btn bg-gradient-info w-50 mt-4 mb-0 shadow">Lamar</a>
                            </div>
                        @endif
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@push('script')
    <script>
        // 
    </script>
@endpush
