@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header">
                        <a class="text-bold" href="{{ route('recruiter.applicant.data.page') }}"><i
                                class="fa fa-arrow-circle-left" aria-hidden="true"></i> Back to data applicant</a>
                        <hr>
                        <h3>Edit Schedule Interview</h3>
                    </div>
                    <div class="card-body">
                        @foreach ($data as $item)
                            <form class="row g-3" action="{{ route('recruiter.update.schedule') }}" method="POST">
                                @csrf
                                <input type="hidden" name="id" value="{{ $item->id }}">
                                <div class="col-12 col-lg-4">
                                    <label for="interview_date">Tanggal Interview</label>
                                    <input type="date" name="interview_date" class="form-control"
                                        value="{{ $item->interview_date }}">
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="interviewer" class="form-label">Interviewer</label>
                                    <select name="interviewer_id" id="interviewer" class="form-control">
                                        @foreach ($interviewers as $interview)
                                            <option {{ $interview->id == $item->interviewer_id ? 'selected' : '' }}
                                                value="{{ $interview->id }}">
                                                {{ $interview->first_name }} {{ $interview->last_name }}
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-12 col-lg-4">
                                    <label for="pelamar">Pelamar</label>
                                    <input type="text" name="interviewed" class="form-control"
                                        value="{{ $item->fullname }}" readonly>
                                </div>
                                <div class="col-12">
                                    <label for="interview_location">Lokasi</label>
                                    <input type="text" name="interview_location" class="form-control"
                                        value="{{ $item->interview_location }}">
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn bg-gradient-primary rounded-pill my-2">
                                        Save changes
                                    </button>
                                </div>
                            </form>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
