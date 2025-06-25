@extends('layout.admin.app')
@section('title', 'Applicant Detail')

@section('content')
<div id="content">
    <div class="content-wrapper p-4">
        <h1 class="mb-4">Applicant Detail</h1>

        <div class="row g-4">
            <!-- Applicant Info -->
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-primary text-white fw-bold">Applicant Info</div>
                    <div class="card-body">
                        <div class="row mb-2"><strong>Name (EN):</strong> {{ $applicant->user->name_en ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>Name (NE):</strong> {{ $applicant->name_ne ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>Email:</strong> {{ $applicant->user->email ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>Phone:</strong> {{ $applicant->user->phone ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>Gender:</strong>
                            @if($applicant->gender === 0)
                                Male
                            @elseif($applicant->gender === 1)
                                Female
                            @elseif($applicant->gender === 2)
                                Other
                            @else
                                N/A
                            @endif
                        </div>
                        <div class="row mb-2"><strong>Status:</strong>
                            <span class="badge {{ $applicant->status ? 'bg-success' : 'bg-warning' }}">
                                {{ $applicant->status ? 'Approved' : 'Pending' }}
                            </span>
                        </div>
                        <div class="row mb-2"><strong>Scholarship Group:</strong> {{ $applicant->scholarship_group ? ucfirst($applicant->scholarship_group) : 'N/A' }}</div>
                        <div class="row mb-2"><strong>School Name:</strong> {{ $applicant->school_name ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>SEE GPA:</strong> {{ $applicant->see_gpa ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>Desired Stream:</strong> {{ $applicant->desired_stream ?? 'N/A' }}</div>
                        <div class="row mb-2"><strong>Family Income:</strong> {{ $applicant->family_income_amount ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            <!-- Address Info -->
            <div class="col-12 col-md-6">
                <div class="card border-0 shadow-sm rounded-3 h-100">
                    <div class="card-header bg-primary text-white fw-bold">Address Info</div>
                    <div class="card-body">
                        <h6 class="text-muted">Permanent Address</h6>
                        <p><strong>Province:</strong> {{ $applicant->address->permanent_province ?? 'N/A' }}</p>
                        <p><strong>District:</strong> {{ $applicant->address->permanent_district ?? 'N/A' }}</p>
                        <p><strong>Municipality:</strong> {{ $applicant->address->permanent_municipality ?? 'N/A' }}</p>
                        <p><strong>Ward:</strong> {{ $applicant->address->permanent_ward ?? 'N/A' }}</p>
                        <hr>
                        <h6 class="text-muted">Temporary Address</h6>
                        <p><strong>Province:</strong> {{ $applicant->address->temporary_province ?? 'N/A' }}</p>
                        <p><strong>District:</strong> {{ $applicant->address->temporary_district ?? 'N/A' }}</p>
                        <p><strong>Municipality:</strong> {{ $applicant->address->temporary_municipality ?? 'N/A' }}</p>
                        <p><strong>Ward:</strong> {{ $applicant->address->temporary_ward ?? 'N/A' }}</p>
                    </div>
                </div>
            </div>

            <!-- Parents Info -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-primary text-white fw-bold">Family Information</div>
                    <div class="card-body row g-2">
                        <div class="col-md-4"><strong>Father's Name:</strong> {{ $applicant->father_name ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Father's Occupation:</strong> {{ $applicant->father_occupation ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Mother's Name:</strong> {{ $applicant->mother_name ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Mother's Occupation:</strong> {{ $applicant->mother_occupation ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Grandfather's Name:</strong> {{ $applicant->grandfather_name ?? 'N/A' }}</div>
                        <div class="col-md-4"><strong>Grandfather's Occupation:</strong> {{ $applicant->grandfather_occupation ?? 'N/A' }}</div>
                    </div>
                </div>
            </div>

            <!-- Documents -->
            <div class="col-12">
                <div class="card border-0 shadow-sm rounded-3">
                    <div class="card-header bg-primary text-white fw-bold">Uploaded Documents</div>
                    <div class="card-body row g-3">
                        @if($applicant->documents)
                            @foreach($applicant->documents->getFillable() as $field)
                                @php $docPath = $applicant->documents->$field; @endphp
                                <div class="col-md-3 text-center">
                                    <label class="d-block fw-semibold">{{ ucwords(str_replace('_', ' ', $field)) }}</label>
                                    @if($docPath)
                                        @if(Str::endsWith(strtolower($docPath), ['jpg','jpeg','png','gif']))
                                            <img src="{{ asset('storage/'.$docPath) }}" class="img-thumbnail" style="height:150px;object-fit:cover;" alt="{{ $field }}">
                                        @else
                                            <a href="{{ asset('storage/'.$docPath) }}" target="_blank" class="btn btn-outline-secondary btn-sm mt-2">View PDF</a>
                                        @endif
                                    @else
                                        <span class="text-muted">No file uploaded</span>
                                    @endif
                                </div>
                            @endforeach
                        @else
                            <p class="text-muted">No documents uploaded.</p>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <a href="{{ route('applicants.index') }}" class="btn btn-secondary">← Back to list</a>
        </div>
    </div>
</div>
@endsection
