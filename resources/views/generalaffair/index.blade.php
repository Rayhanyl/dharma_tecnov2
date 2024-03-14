@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-body">
                        <table class="table table-striped " id="table-data-interviewee">
                            <thead class="table-orange">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Tanggal Wawancara</th>
                                    <th class="text-center">link zoom</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center text-capitalize">{{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">{{ $item->fullname }}</td>
                                        <td class="text-center text-capitalize">
                                            {{ \Carbon\Carbon::parse($item->creaeted_at)->format('d F Y') }}
                                        </td>
                                        <td class="text-center text-capitalize">{{ $item->interview_location }}</td>
                                        <td class="text-center text-capitalize">
                                            <a href="{{ route('general.detail.applicant.page', ['id' => $item->id]) }}"
                                                class="btn btn-primary">Detail</a>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
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
