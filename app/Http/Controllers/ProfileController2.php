<?php

namespace App\Http\Controllers;

use App\Models\Profile;
use Illuminate\Http\Request;

class ProfileController2 extends Controller
{
    public function edit()
    {
    $profile = auth()->user()->profile;
    return view('profile.edit', compact('profile'));
    }

    public function update(Request $request)
    {
        $profile = auth()->user()->profile;
        $profile->update($request->all());
        return redirect()->back()->with('success', 'Profile updated successfully!');
    }
}
