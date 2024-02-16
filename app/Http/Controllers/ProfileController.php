<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileUpdateRequest;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\View\View;
use App\Models\Profile;
use App\Models\User;
use Symfony\Component\HttpKernel\Profiler\Profile as ProfilerProfile;

class ProfileController extends Controller
{
    /**
     * Display the user's profile form.
     */

     public function index()
    {
        $current_userid = Auth()->user()->id;
        $userinfo = User::where('id','=',$current_userid)->first();
        $userprofile = Profile::where('user_id','=',$current_userid)->first();
    }


    public function edit(Request $request): View
    {
        $current_userid = Auth()->user()->id;
        $userinfo = User::where('id','=',$current_userid)->first();
        $userprofile = Profile::where('user_id','=',$current_userid)->first();
        return view('profile.edit', [
            'user' => $request->user(),
        ]);
    }

    /**
     * Update the user's profile information.
     */
    public function update(ProfileUpdateRequest $request): RedirectResponse
    {
        $request->user()->fill($request->validated());

        if ($request->user()->isDirty('email')) {
            $request->user()->email_verified_at = null;
        }

        $request->user()->save();

        return Redirect::route('profile.edit')->with('status', 'profile-updated');
    }

    /**
     * Delete the user's account.
     */
    public function destroy(Request $request): RedirectResponse
    {
        $request->validateWithBag('userDeletion', [
            'password' => ['required', 'current_password'],
        ]);

        $user = $request->user();

        Auth::logout();

        $user->delete();

        $request->session()->invalidate();
        $request->session()->regenerateToken();

        return Redirect::to('/');
    }





    public function infoForm()
    {
        return view('info');
    }

    public function saveProfile(Request $request)
    {

        $imageName = null; 
        if ($request->hasFile('profile_picture')) {
            
            $imageName = time() . '.' . $request->file('profile_picture')->getClientOriginalExtension();
            $request->file('profile_picture')->move(public_path('images'), $imageName);
        }

        $profile = new Profile();
        $profile->user_id = Auth::id();
        $profile->profile_picture = $imageName;
        $profile->industry = $request->input('industry');
        $profile->address = $request->input('address');
        $profile->contact_information = $request->input('contact_information');
        $profile->save();

        return redirect()->route('dashboard');
    }

    public function showProfile()
    {
        $user = Auth::user();
        $profile = $user->profile;

        return view('profile', compact('user', 'profile'));
    
    }
    public function showResume()
{
    $user = Auth::user();
    $profile = $user->profile;

    return view('profile.resume', compact('user', 'profile'));
}
public function editProfile()
{
    $user = auth()->user();
    $profile = $user->profile;

    return view('my_profile.edit', compact('user', 'profile'));
}

public function updateProfile(Request $request)
{
    $user = auth()->user();
    $profile = $user->profile;

    $profile->update($request->only(['industry', 'address', 'contact_information']));

    return redirect()->route('my_profile.edit')->with('success', 'Profile updated successfully!');
}

    
}
