@extends('layout.admin.app')
@section('title', 'Applicants List')

@section('content')
<div id="content">
    <div class="content-wrapper p-4">
        <div class="d-flex justify-content-between align-items-center mb-4">
            <h2 class="page-title">Applicants</h2>
        </div>

        <form method="GET" class="bg-light p-3 rounded-3 shadow-sm mb-4">
            <div class="row g-3 align-items-end">
                <!-- Search by Name -->
                <div class="col-md-3">
                    <label class="form-label small text-muted" for="filter_name">Name</label>
                    <div class="input-group">
                        <span class="input-group-text bg-white"><i class="bi bi-person"></i></span>
                        <input id="filter_name" type="text" name="name" class="form-control"
                            placeholder="Search by name" value="{{ request('name') }}">
                    </div>
                </div>

                <!-- Scholarship Group -->
                <div class="col-md-2">
                    <label class="form-label small text-muted" for="filter_group">Scholarship Group</label>
                    <select id="filter_group" name="scholarship_group" class="form-select">
                        <option value="">All Groups</option>
                        @foreach(['madhesi','vepata','jehendar','bipanna','janjati','apanga','shahid','dalit'] as $group)
                        <option value="{{ $group }}" {{ request('scholarship_group')===$group ? 'selected' : '' }}>
                            {{ ucfirst($group) }}
                        </option>
                        @endforeach
                    </select>
                </div>

                <!-- Status -->
                <div class="col-md-2">
                    <label class="form-label small text-muted" for="filter_status">Status</label>
                    <select id="filter_status" name="status" class="form-select">
                        <option value="">All Status</option>
                        <option value="1" {{ request('status')==='1' ? 'selected' : '' }}>Pending</option>
                        <option value="2" {{ request('status')==='2' ? 'selected' : '' }}>Approved</option>
                    </select>
                </div>

                <!-- Action Buttons -->
                <div class="col-md-2 d-flex gap-2">
                    <button class="btn btn-primary w-100" title="Apply Filters">
                        <i class="bi bi-funnel-fill me-1"></i> Filter
                    </button>
                    <a href="{{ route('applicants.index') }}" class="btn btn-outline-secondary w-100"
                        title="Reset Filters">
                        <i class="bi bi-arrow-clockwise"></i> Reset
                    </a>
                </div>
            </div>
        </form>

        @if(session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <div class="card shadow-sm border-0">
            <div class="table-responsive">
                <table class="table table-hover align-middle mb-0">
                    <thead class="bg-light">
                        <tr class="text-center">
                            <th>#</th>
                            <th>Image</th>
                            <th>Name</th>
                            <th>Scholarship</th>
                            <th>Status</th>
                            <th>Applied On</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse($applicants as $index => $applicant)
                        <tr class="text-center">
                            <td>{{ $applicants->firstItem() + $index }}</td>
                            <td class="text-start">
                              <img src="{{ asset($applicant->user->documents->passport_size_photo ?? 'Biratnagar_logo.png') }}"
                                    alt="Photo"
                                    style="height:50px; width:50px; object-fit:cover; border-radius:50%; border:2px solid #e3e6f0; box-shadow:0 2px 6px rgba(0,0,0,0.08);"
                                    class="img-fluid shadow-sm"
                                    loading="lazy">

                            </td>

                            <td class="text-start">{{ $applicant->name_ne }}</td>

                            <td>{{ ucfirst($applicant->scholarship_group) }}</td>
                            <td>
                                @php $status = $applicant->status; @endphp
                                @if($status == 1)
                                <span class="badge bg-warning text-dark">Pending</span>
                                @elseif($status == 2)
                                <span class="badge bg-success">Approved</span>
                                @endif
                            </td>
                            <td>{{ $applicant->created_at->format('d M Y') }}</td>
                            <td>
                                <a href="{{ route('applicants.show', encrypt($applicant->user->id)) }}" target="_blank"
                                    class="btn btn-sm btn-info"><i class="bi bi-eye"></i></a>

                                       <a href="{{ route('applicants.edit', $applicant->id) }}" target="_blank"
                                    class="btn btn-sm btn-warning"><i class="bi bi-pencil-square"></i></a>

                                    <a href="{{ route('applicants.delete-applicant', $applicant->id) }}"
                                         class="btn btn-sm btn-danger delete-btn"><i class="bi bi-trash-fill"></i></a>
                            </td>
                        </tr>
                        @empty
                        <tr>
                            <td colspan="7" class="text-center text-muted py-3">No applicants found.</td>
                        </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
                <div class="p-3">
                    {{ $applicants->links('pagination::bootstrap-5') }}
                </div>
        </div>
    </div>
</div>

<script>
    document.querySelectorAll('.delete-btn').forEach(button => {
        button.addEventListener('click', function (e) {
            e.preventDefault();
            const url = this.getAttribute('href');

            Swal.fire({
                title: 'Are you sure?',
                text: 'This action is irreversible.',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonText: 'Yes, delete',
                cancelButtonText: 'Cancel'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = url;
                }
            });
        });
    });
</script>

@endsection
