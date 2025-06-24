@extends('layout.admin.app')
@section('title', 'Admins Management')

@section('content')
{{-- sweetalert2 for deleted successfully --}}
@if(session('success'))
    <script>
        Swal.fire({
            icon: 'success',
            title: 'Success',
            text: '{{ session('success') }}',
            timer: 2000,
            showConfirmButton: false
        });
    </script>
@endif


<div id="content">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h1 class="page-title m-0">Manage Admins</h1>
            <a href="{{ route('admins.create') }}" class="btn btn-primary">Add</a>
        </div>

        {{-- <h3 class="mb-3"></h3> --}}

        {{-- <a href="{{ route('admins.create') }}" class="btn btn-primary mb-3">Add</a> --}}

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <table class="table table-bordered">
            <thead class="table-dark">
                <tr>
                    <th>#</th>
                    <th>Name (EN)</th>
                    <th>Name (NE)</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Role</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach($admins as $index => $user)
                @if($user->role == 0 || $user->role == 1)
                <tr>
                    <td>{{ $index + 1 }}</td>
                    <td>{{ $user->name_en }}</td>
                    <td>{{ $user->name_ne }}</td>
                    <td>{{ $user->email }}</td>
                    <td>{{ $user->phone }}</td>
                    <td>
                        @if($user->role == 0)
                        Super Admin
                        @elseif($user->role == 1)
                        Admin
                        @else
                        User
                        @endif
                    </td>
                    <td>
                        @if($user->image)
                        <img src="{{ asset('storage/'.$user->image) }}" width="50" height="50">
                        @else
                        N/A
                        @endif
                    </td>
                    <td>
                        <a href="{{ route('admins.edit', $user->id) }}" class="btn btn-sm btn-warning">Edit</a>
                        <form action="{{ route('admins.destroy', $user->id) }}" method="POST"
                            class="delete-form d-inline">
                            @csrf
                            @method('DELETE')
                            <button type="button" class="btn btn-sm btn-danger delete-btn"
                                data-id="{{ $user->id }}">Delete</button>
                        </form>
                    </td>
                </tr>
                @endif
                @endforeach
            </tbody>
        </table>
    </div>
</div>
{{-- sweetalert2 for delete --}}
<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function () {
            const form = this.closest('form');
            Swal.fire({
                title: 'Are you sure?',
                text: "You won't be able to revert this!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, delete it!'
            }).then((result) => {
                if (result.isConfirmed) {
                    form.submit();
                }
            });
        });
    });
</script>

@endsection