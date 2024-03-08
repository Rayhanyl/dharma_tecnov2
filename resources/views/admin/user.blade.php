@extends('layouts.app')
@section('content')
    <div class="container" style="min-height:100vh; margin-top: 8rem;">
        <div class="row">
            <div class="col-12">
                <div class="card shadow-lg rounded-4">
                    <div class="card-header">
                        <div class="row">
                            <div class="col-12 col-lg-6">
                                <h3>Table User</h3>
                            </div>
                            <div class="col-12 col-lg-6 text-end">
                                <a class="btn btn-primary" href="{{ route('admin.add.user.page') }}">
                                    <i class="fa fa-plus" aria-hidden="true"></i> Add User
                                </a>
                            </div>
                        </div>
                    </div>
                    <div class="card-body">
                        <table class="table table-striped " id="table-data-user">
                            <thead class="table-orange">
                                <tr>
                                    <th class="text-center">No</th>
                                    <th class="text-center">Nama</th>
                                    <th class="text-center">Email</th>
                                    <th class="text-center">Phone</th>
                                    <th class="text-center">Role</th>
                                    <th class="text-center">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($user as $item)
                                    <tr>
                                        <td class="text-center">{{ $loop->iteration }}</td>
                                        <td>{{ $item->first_name }} {{ $item->last_name }}</td>
                                        <td>{{ $item->email }}</td>
                                        <td>{{ $item->phone_number }}</td>
                                        <td>{{ $item->role }}</td>
                                        <td class="d-flex justify-content-center">
                                            <div class="d-flex">
                                                <div class="p-2">
                                                    <button class="btn btn-warning" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Edit User"><i class="fa fa-pencil"
                                                            aria-hidden="true"></i></button>
                                                </div>
                                                <div class="p-2">
                                                    <button class="btn btn-danger" data-bs-toggle="tooltip"
                                                        data-bs-placement="top" title="Delete User"><i class="fa fa-trash-o"
                                                            aria-hidden="true"></i></button>
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

@push('script')
    <script>
        $(document).ready(function() {
            $('#table-data-user').DataTable({
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
