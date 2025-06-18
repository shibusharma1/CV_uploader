@extends('layouts.master')

@section('content')
<div class="container mt-5">
    <div class="card shadow rounded-4 border-0" style="background-color: var(--light);">
        <div class="card-header text-center text-white rounded-top-4" style="background-color: var(--primary);">
            <h4>Personal Details Form</h4>
        </div>
        <div class="card-body p-4">
            <form action="{{ route('personal-details.store') }}" method="POST" enctype="multipart/form-data">
                @csrf

                <div class="row g-3">
                    <div class="col-md-6">
                        <label for="father_name" class="form-label">Father's Name</label>
                        <input type="text" name="father_name" class="form-control" id="father_name">
                    </div>
                    <div class="col-md-6">
                        <label for="permanent_address" class="form-label">Permanent Address</label>
                        <input type="text" name="permanent_address" class="form-control" id="permanent_address">
                    </div>
                    <div class="col-md-6">
                        <label for="temporary_address" class="form-label">Temporary Address</label>
                        <input type="text" name="temporary_address" class="form-control" id="temporary_address">
                    </div>
                    <div class="col-md-6">
                        <label for="marital_status" class="form-label">Marital Status</label>
                        <select name="marital_status" class="form-select">
                            <option value="" disabled selected>Select</option>
                            <option>Single</option>
                            <option>Married</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="religion" class="form-label">Religion</label>
                        <input type="text" name="religion" class="form-control" id="religion">
                    </div>
                    <div class="col-md-6">
                        <label for="nationality" class="form-label">Nationality</label>
                        <input type="text" name="nationality" class="form-control" id="nationality">
                    </div>
                    <div class="col-md-6">
                        <label for="gender" class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="" disabled selected>Select</option>
                            <option>Male</option>
                            <option>Female</option>
                            <option>Other</option>
                        </select>
                    </div>
                    <div class="col-md-6">
                        <label for="languages_known" class="form-label">Languages Known</label>
                        <input type="text" name="languages_known" class="form-control" id="languages_known">
                    </div>
                    <div class="col-md-6">
                        <label for="hobbies" class="form-label">Hobbies</label>
                        <input type="text" name="hobbies" class="form-control" id="hobbies">
                    </div>
                    <div class="col-md-6">
                        <label for="career_objective" class="form-label">Career Objective</label>
                        <textarea name="career_objective" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="education" class="form-label">Education</label>
                        <textarea name="education" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="skills" class="form-label">Skills</label>
                        <textarea name="skills" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="work_experience" class="form-label">Work Experience</label>
                        <textarea name="work_experience" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="certifications" class="form-label">Certifications</label>
                        <textarea name="certifications" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="projects" class="form-label">Projects</label>
                        <textarea name="projects" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="references" class="form-label">References</label>
                        <textarea name="references" class="form-control" rows="2"></textarea>
                    </div>
                    <div class="col-md-6">
                        <label for="image" class="form-label">Profile Image</label>
                        <input type="file" name="image" class="form-control" id="image">
                    </div>
                    <div class="col-md-6">
                        <label for="cv_file" class="form-label">CV File</label>
                        <input type="file" name="cv_file" class="form-control" id="cv_file">
                    </div>
                </div>

                <input type="hidden" name="user_id" value="{{ Auth::id() }}">

                <button type="submit" class="btn text-white mt-4 w-100" style="background-color: var(--secondary);">Submit Details</button>
            </form>
        </div>
    </div>
</div>
@endsection
