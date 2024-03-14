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
                        <table class="table table-striped" id="table-data-list-pelamar">
                            <thead class="table-orange">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Umur</th>
                                    <th class="text-center">Posisi</th>
                                    <th class="text-center">Tanggal Melamar</th>
                                    <th>Status</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($data as $item)
                                    <tr>
                                        <td class="text-center text-capitalize">
                                            {{ $loop->iteration }}</td>
                                        <td class="text-center text-capitalize">
                                            {{ $item->fullname }}</td>
                                        <td class="text-center text-capitalize">
                                            {{ \Carbon\Carbon::parse($item->birthdate)->age }} th
                                        </td>
                                        <td class="text-center text-capitalize">
                                            {{ $item->position->name }}</td>
                                        <td class="text-center text-capitalize">
                                            {{ \Carbon\Carbon::parse($item->creaeted_at)->format('d F Y') }}
                                        </td>
                                        <td class="text-center text-capitalize">{{ $item->status }}</td>
                                        <td>
                                            <div class="d-flex">
                                                <div class="px-1">
                                                    <a href="{{ route ('recruiter.detail.data.applicant', ['id' => $item->id]) }}" class="btn btn-warning">Detail</a>
                                                </div>
                                                @if ($item->status == 'interviewed')
                                                    <div class="px-1">
                                                        <a href="{{ route ('recruiter.schedule.page', ['id' => $item->id]) }}" class="btn btn-success">Schedule</a>
                                                    </div>
                                                @else
                                                    <div class="px-1">
                                                        <button class="btn btn-success" disabled>Schedule</button>
                                                    </div>
                                                @endif
                                                <div class="px-1">
                                                    <button class="btn btn-primary btn-approval" id="btn-approval"
                                                        data-id-application="{{ $item->id }}">Approved</button>
                                                </div>
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


{{-- Modal --}}
<div class="modal fade" id="approvalModal" tabindex="-1" role="dialog" aria-labelledby="approvalModalLabel"
    aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="approvalModalLabel">Approval</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div id="loader-approval"></div>
                <div id="detail-form-approval"></div>
            </div>
        </div>
    </div>
</div>
{{-- Modal --}}

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-data-list-pelamar').DataTable({
                responsive: true,
                lengthMenu: [
                    [5, 10, 25, -1],
                    [5, 10, 25, 'All'],
                ],
                order: [
                    [0, 'asc']
                ],
            });

            $(document).on('click', '.btn-approval', function(e) {
                e.preventDefault();
                const idApplication = $(this).data('id-application');
                getModalApproval(idApplication);
                $("#approvalModal").modal("show");
            });
            $(document).on('change', '#approvalApplication', function() {
                $('#interviewApplication').show();
                if ($(this).val() !== 'interviewed') {
                    $('#interviewApplication').hide();
                }
            });
        });

        // Detail description case study product
        function getModalApproval(idApplication) {
            let url = "{{ route('recruiter.ajax.modal.approval', ['application' => ':application']) }}"
            url = url.replace(':application', idApplication);
            $.ajax({
                type: "GET",
                url,
                dataType: 'html',
                data: {
                    application: idApplication,
                },
                beforeSend: function() {
                    $('#loader-approval').html(
                        '<div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div>'
                    );
                },
                success: function(data) {
                    $('#detail-form-approval').html(data);
                    $('#approvalApplication').trigger("change");
                },
                complete: function() {
                    $('#loader-approval').html('');
                },
                error: function(xhr, ajaxOptions, thrownError) {
                    var pesan = xhr.status + " " + thrownError + "\n" + xhr.responseText;
                    $('#detail-form-approval').html(pesan);
                },
            });
        }
    </script>
@endpush
