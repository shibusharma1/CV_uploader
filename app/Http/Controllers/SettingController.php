<?php
namespace App\Http\Controllers;

use App\Models\Setting;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class SettingController extends Controller
{
    public function edit()
    {
        $setting = Setting::first() ?? new Setting();
        return view('admin.settings.edit', compact('setting'));
    }

    public function update(Request $request)
    {
        $validated = $request->validate([
            'app_name' => 'required|string|max:255',
            'logo' => 'image|mimes:jpg,jpeg,png,gif,webp|nullable',
            'fav_icon' => 'image|mimes:jpg,jpeg,png,ico|nullable',
            'smtp_host' => 'nullable|string',
            'smtp_port' => 'nullable|numeric',
            'smtp_username' => 'nullable|string',
            'smtp_password' => 'nullable|string',
            'smtp_encryption' => 'nullable|string',
            'smtp_from_address' => 'nullable|email',
            'smtp_from_name' => 'nullable|string',
        ]);

        $setting = Setting::first() ?? new Setting();

        if ($request->hasFile('logo')) {
            if ($setting->logo) Storage::delete($setting->logo);
            $validated['logo'] = $request->file('logo')->store('settings', 'public');
        }

        if ($request->hasFile('fav_icon')) {
            if ($setting->fav_icon) Storage::delete($setting->fav_icon);
            $validated['fav_icon'] = $request->file('fav_icon')->store('settings', 'public');
        }

        $setting->fill($validated)->save();

        return back()->with('success', 'Settings updated successfully.');
    }
}
