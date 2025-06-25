@extends('layout.admin.app')
@section('title', 'User Details')
@section('content')
<div id="content">
<div class="content-wrapper p-4">
    <div class="page-header mb-4">
        <h2 class="page-title text-xl font-semibold">User Details</h2>
    </div>

    <div class="row justify-content-center">
        <div class="col-md-6 col-lg-5">
            <div class="card border-0 shadow-sm rounded-3 overflow-hidden">
                <!-- Header with a subtle background -->
                <div class="bg-primary text-white p-3 text-center">
                    <h4 class="m-0">{{ $user->name_en }}</h4>
                </div>

                <!-- User info -->
                <div class="card-body p-4">
                    <div class="mb-3 d-flex align-items-center">
                        <i class="bi bi-envelope-fill me-2 text-muted"></i>
                        <span class="text-muted">Email:</span>
                        <span class="ms-2">{{ $user->email }}</span>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <i class="bi bi-telephone-fill me-2 text-muted"></i>
                        <span class="text-muted">Phone:</span>
                        <span class="ms-2">{{ $user->phone }}</span>
                    </div>
                    <div class="mb-3 d-flex align-items-center">
                        <i class="bi bi-check-circle-fill me-2 text-muted"></i>
                        <span class="text-muted">Status:</span>
                        {{-- <span class="ms-2 badge {{ $user->is_active ? 'bg-success' : 'bg-danger' }}">
                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                        </span> --}}
                                                      <form action="{{ route('users.toggle-status', $user->id) }}" method="POST"
                                        class="d-inline">
                                        @csrf @method('PATCH')
                                        <button
                                            class="btn btn-sm {{ $user->is_active ? 'btn-success' : 'btn-secondary' }}"
                                            title="Toggle Status">
                                            {{ $user->is_active ? 'Active' : 'Inactive' }}
                                        </button>
                                    </form>
                    </div>
                </div>

                <!-- Back to list -->
                <div class="card-footer bg-light text-center p-3">
                    <a href="{{ route('users.index') }}" class="btn btn-outline-secondary">
                        <i class="bi bi-arrow-left me-1"></i>Back to list
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
</div>
@endsection
