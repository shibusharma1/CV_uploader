<?php
namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ApplicantAddress;
use App\Models\ApplicantDocuments;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Illuminate\Validation\Rule;

class ApplicantController extends Controller
{
    // Display paginated list of applicants
    public function index()
    {
        $applicants = User::with(['address', 'documents'])->paginate(20);
        return view('applicants.index', compact('applicants'));
    }

    // Show form to create new applicant
    public function create()
    {
        return view('applicants.create');
    }

    // Store new applicant with related address & documents
public function store(Request $request)
{
    // Define allowed user fields only
    $userFields = [
        'name_en','name_ne', 'password', 'phone', 'school_name', 'role',
        'scholarship_group', 'dob_bs', 'dob_ad', 'gender',
        'father_name', 'father_occupation', 'mother_name', 'mother_occupation',
        'grandfather_name', 'grandfather_occupation', 'family_income_source',
        'family_income_amount', 'see_school_type', 'desired_stream', 'see_symbol_number',
        'see_gpa', 'see_school_address',
    ];

    // Extract user data from request
    $userData = $request->only($userFields);

    // Hash password before saving
    if (isset($userData['password'])) {
        $userData['password'] = bcrypt($userData['password']);
    }

    // Create user record
    $user = User::create($userData);

    // Define allowed address fields
    $addressFields = [
        'permanent_province',
        'permanent_district',
        'permanent_municipality',
        'permanent_ward',
        'temporary_province',
        'temporary_district',
        'temporary_municipality',
        'temporary_ward',
    ];

    // Extract address data from request
    $addressData = $request->only($addressFields);

    // Save address related to user (assuming relation user->address())
    $user->address()->create($addressData);

    // File fields to handle
    $fileFields = [
        'see_gradesheet',
        'community_school_document',
        'citizenship_birth_certificate',
        'disability_id_card',
        'dalit_janjati_recommendation',
        'bipanna_recommendation',
        'physical_disability_certificate',
        'movement_related_certificate',
        'passport_size_photo',
    ];

    $documentData = [];

    foreach ($fileFields as $field) {
        if ($request->hasFile($field)) {
            $file = $request->file($field);
            // Store the file in 'applicants/documents' folder on 'public' disk
            $path = $file->store('applicants/documents', 'public');
            $documentData[$field] = $path;
        }
    }

    // Save documents related to user (assuming relation user->documents())
    if (!empty($documentData)) {
        $user->documents()->create($documentData);
    }

    return redirect()->route('home')->with('success', 'Applicant created successfully.');
}


    // Show form for editing applicant
    public function edit(User $applicant)
    {
        // eager load relations
        $applicant->load(['address', 'documents']);
        return view('applicants.edit', compact('applicant'));
    }

    // Update applicant data + address + documents
    public function update(Request $request, User $applicant)
    {
        // Validate main user data
        $validatedUser = $request->validate([
            'name_en' => 'required|string|max:255',
            'email'   => ['required','email', Rule::unique('users')->ignore($applicant->id)],
            'phone'   => 'nullable|string|max:20',
            'school_name' => 'required|string|max:255',
            'role'    => 'nullable|integer|in:0,1,2',
            'scholarship_group' => ['nullable', Rule::in([
                'madhesi','vepata','jehendar','bipanna','janjati','apanga','shahid','dalit'
            ])],
            'dob_bs' => 'nullable|string|max:20',
            'dob_ad' => 'nullable|date',
            'gender' => 'nullable|integer|in:0,1,2',

            'father_name' => 'nullable|string|max:255',
            'father_occupation' => 'nullable|string|max:255',
            'mother_name' => 'nullable|string|max:255',
            'mother_occupation' => 'nullable|string|max:255',
            'grandfather_name' => 'nullable|string|max:255',
            'grandfather_occupation' => 'nullable|string|max:255',
            'family_income_source' => 'nullable|string|max:255',
            'family_income_amount' => 'nullable|string|max:255',
            'see_school_type' => 'nullable|string|max:255',
            'desired_stream' => 'nullable|string|max:255',
            'see_symbol_number' => 'nullable|string|max:255',
            'see_gpa' => 'nullable|string|max:255',
            'see_school_address' => 'nullable|string',
        ]);

        // Update main user data
        $applicant->update($validatedUser);

        // Validate and update address
        $addressData = $request->validate([
            'permanent_province' => 'nullable|string|max:255',
            'permanent_district' => 'nullable|string|max:255',
            'permanent_municipality' => 'nullable|string|max:255',
            'permanent_ward' => 'nullable|string|max:255',

            'temporary_province' => 'nullable|string|max:255',
            'temporary_district' => 'nullable|string|max:255',
            'temporary_municipality' => 'nullable|string|max:255',
            'temporary_ward' => 'nullable|string|max:255',
        ]);

        // Update or create address
        $applicant->address()->updateOrCreate(
            ['user_id' => $applicant->id],
            $addressData
        );

        // Handle document file uploads - replace files if new ones uploaded
        $documentData = [];
        $fileFields = [
            'see_gradesheet',
            'community_school_document',
            'citizenship_birth_certificate',
            'disability_id_card',
            'dalit_janjati_recommendation',
            'bipanna_recommendation',
            'physical_disability_certificate',
            'movement_related_certificate',
            'passport_size_photo',
        ];

        foreach ($fileFields as $field) {
            if ($request->hasFile($field)) {
                // Delete old file if exists
                if ($applicant->documents && $applicant->documents->$field) {
                    Storage::disk('public')->delete($applicant->documents->$field);
                }
                $file = $request->file($field);
                $path = $file->store('applicants/documents', 'public');
                $documentData[$field] = $path;
            }
        }

        if (!empty($documentData)) {
            $applicant->documents()->updateOrCreate(
                ['user_id' => $applicant->id],
                $documentData
            );
        }

        return redirect()->route('applicants.index')->with('success', 'Applicant updated successfully.');
    }

    // Delete applicant and related address/documents (cascade handled by DB)
    public function destroy(User $applicant)
    {
        $applicant->delete();

        return redirect()->route('applicants.index')->with('success', 'Applicant deleted successfully.');
    }
}
?>