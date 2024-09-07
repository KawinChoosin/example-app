<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User; //add this line
use Illuminate\Support\Facades\Auth; //add this line
use Illuminate\Support\Facades\Storage; //add this line
use App\Models\UserBio;
use App\Models\Personal;

class UserController extends Controller
{
    public function updateProfilePhoto(Request $request)
    {
        $request->validate([
            'profile_photo' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $user = Auth::user();

        if ($request->file('profile_photo')) {
            // Delete old photo if exists
            if ($user->profile_photo) {
                Storage::disk('public')->delete($user->profile_photo);
            }

            $fileName = time().'_'.$request->file('profile_photo')->getClientOriginalName();
            $filePath = $request->file('profile_photo')->storeAs('uploads/profile_photos', $fileName, 'public');

            $user->profile_photo = $filePath;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('status', 'profile-photo-updated');
    }
    public function showBio()
{
    $user = Auth::user(); // Retrieve the currently authenticated user
    $bio = $user->bio; // Access the related bio for the user
    $personals = Personal::all(); // Fetch all records from the personals table
    $selectedPersonals = $user->personals->pluck('id')->toArray(); // Get selected personals for the user

    return view('profile.show-bio', compact('user', 'bio', 'personals', 'selectedPersonals'));
}


    public function updateBio(Request $request)
{
    $user = Auth::user();
    $bio = $user->bio;

    // Validate the request
    $request->validate([
        'bio' => 'required|string',
        'personals' => 'array|nullable',
        'personals.*' => 'exists:personals,id'
    ]);

    // Update or create the bio
    if ($bio) {
        $bio->update([
            'bio' => $request->input('bio'),
        ]);
    } else {
        $user->bio()->create([
            'bio' => $request->input('bio'),
        ]);
    }

    // Sync selected personals
    $user->personals()->sync($request->input('personals', []));

    return redirect()->route('profile.show-bio')->with('status', 'Bio updated successfully!');
}

}
