@extends('layout.admin.app')
@section('title', 'Add Admin')

@section('content')
<div id="content">
    <!-- Content Wrapper -->
    <div class="content-wrapper">
        <!-- Page Header -->
        <div class="page-header d-flex justify-content-between align-items-center mb-3">
            <h1 class="page-title m-0">Add Admin</h1>
            <a href="{{ route('admins.index') }}" class="btn btn-secondary">back</a>
        </div>

         <form action="{{ route('users.store') }}" method="POST" enctype="multipart/form-data">
        @csrf

        <div class="row g-3">

            <div class="col-md-6">
                <label class="form-label">Name (English) <span class="text-danger">*</span></label>
                <input type="text" name="name_en" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Name (Nepali)</label>
                <input type="text" name="name_ne" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Email <span class="text-danger">*</span></label>
                <input type="email" name="email" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Phone</label>
                <input type="text" name="phone" class="form-control">
            </div>

            <div class="col-md-6">
                <label class="form-label">Password <span class="text-danger">*</span></label>
                <input type="password" name="password" class="form-control" required>
            </div>

            <div class="col-md-6">
                <label class="form-label">Role <span class="text-danger">*</span></label>
                <select name="role" class="form-select" required>
                    <option value="0">Super Admin</option>
                    <option value="1" selected>Admin</option>
                    <option value="2">User</option>
                </select>
            </div>

            <div class="col-md-6">
                <label class="form-label">Profile Image</label>
                <input type="file" name="image" class="form-control">
            </div>

            <div class="col-12 mt-3">
                <button type="submit" class="btn btn-primary">Create User</button>
                <a href="{{ route('users.index') }}" class="btn btn-secondary">Cancel</a>
            </div>

        </div>
    </form>
</div>
</div>

@endsection
