<?php
namespace App\Http\Controllers;

use App\Models\PersonalDetail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class PersonalDetailController extends Controller
{
    public function index()
    {
        $details = PersonalDetail::where('user_id', Auth::id())->get();
        return view('personal_details.index', compact('details'));
    }

    public function create()
    {
        return view('personal_details.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'father_name' => 'nullable|string|max:255',
            'permanent_address' => 'nullable|string|max:255',
            'temporary_address' => 'nullable|string|max:255',
            'marital_status' => 'nullable|string',
            'religion' => 'nullable|string',
            'nationality' => 'nullable|string',
            'gender' => 'nullable|string',
            'languages_known' => 'nullable|string',
            'hobbies' => 'nullable|string',
            'career_objective' => 'nullable|string',
            'education' => 'nullable|string',
            'skills' => 'nullable|string',
            'work_experience' => 'nullable|string',
            'certifications' => 'nullable|string',
            'projects' => 'nullable|string',
            'references' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg|max:2048',
            'cv_file' => 'nullable|mimes:pdf,doc,docx|max:5120',
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('personal_images', 'public');
        }

        if($request->hasFile('cv_file')){
            $data['cv_file'] = $request->file('cv_file')->store('cv_files', 'public');
        }

        $data['user_id'] = Auth::id();
        PersonalDetail::create($data);

        return redirect()->route('personal-details.index')->with('success', 'Personal details added successfully.');
    }

    public function edit(PersonalDetail $personalDetail)
    {
        return view('personal_details.edit', compact('personalDetail'));
    }

    public function update(Request $request, PersonalDetail $personalDetail)
    {
        $request->validate([
            'father_name' => 'nullable|string|max:255',
            // same as store rules...
        ]);

        $data = $request->all();

        if($request->hasFile('image')){
            $data['image'] = $request->file('image')->store('personal_images', 'public');
        }

        if($request->hasFile('cv_file')){
            $data['cv_file'] = $request->file('cv_file')->store('cv_files', 'public');
        }

        $personalDetail->update($data);

        return redirect()->route('personal-details.index')->with('success', 'Personal details updated successfully.');
    }

    public function destroy(PersonalDetail $personalDetail)
    {
        $personalDetail->delete();
        return redirect()->route('personal-details.index')->with('success', 'Personal details deleted successfully.');
    }
}
