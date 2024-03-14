@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header">
                        <h3>List Pelamar</h3>
                    </div>
                    <div class="card-body table-responsive">
                        <table class="table table-striped" id="table-data-list-history-pelamar">
                            <thead class="table-orange">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Umur</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Tanggal Melamar</th>
                                    <th class="text-center">Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center text-capitalize">{{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">{{ $item->fullname }}</td>
                                        <td class="text-center text-capitalize">
                                            {{ \Carbon\Carbon::parse($item->birthdate)->age }} th</td>
                                        <td class="text-center text-capitalize">{{ $item->position->name }}</td>
                                        <td class="text-center text-capitalize">
                                            {{ \Carbon\Carbon::parse($item->creaeted_at)->format('d F Y') }}
                                        </td>
                                        <td class="text-center text-capitalize">{{ $item->status }}</td>
                                        <td class="text-center">
                                            <div class="btn-group gap-2" role="group"
                                                aria-label="Basic example">
                                                <a href="{{ route('recruiter.detail.data.applicant', ['id' => $item->id]) }}"
                                                    class="btn btn-sm btn-primary rounded-pill">Detail Lamaran
                                                    </a>
                                            </div>
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
            $('#table-data-list-history-pelamar').DataTable({
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
