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
                                    <th class="text-center">File Cv</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
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
