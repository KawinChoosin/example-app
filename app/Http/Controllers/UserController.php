<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
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

            $fileName = time() . '_' . $request->file('profile_photo')->getClientOriginalName();
            $filePath = $request->file('profile_photo')->storeAs('uploads/profile_photos', $fileName, 'public');

            $user->profile_photo = $filePath;
            $user->save();
        }

        return redirect()->route('profile.edit')->with('status', 'Profile photo updated successfully!');
    }

    public function showBio()
    {
        $user = Auth::user(); // Retrieve the currently authenticated user
        $bio = $user->bio; // Access the related bio for the user
        $personals = Personal::all(); // Retrieve all personality types

        $personalityTypeId = $user->personality_type_id;
        $personal = Personal::find($personalityTypeId); // Fetch the Personality record based on the personality_type_id

        return view('profile.show-bio', [
            'user' => $user,
            'bio' => $bio,
            'personals' => $personals,
            'personal' => $personal, // Pass the personality data to the view
        ]);
    }

    public function updateBio(Request $request)
    {
        $user = Auth::user();
        $bio = $user->bio;

        // Validate the request
        $request->validate([
            'bio' => 'required|string',
            'personality_type_id' => 'nullable|exists:personals,id',
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

        // Update the personality type
        $user->personality_type_id = $request->input('personality_type_id');
        $user->save();

        return redirect()->route('profile.show-bio')->with('status', 'Bio and personality type updated successfully!');
    }
    
    
}