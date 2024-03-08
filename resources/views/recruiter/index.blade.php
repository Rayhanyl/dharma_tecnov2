@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row g-3">
            <div class="col-12">
                
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
