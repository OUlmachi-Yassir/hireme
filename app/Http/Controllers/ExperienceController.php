<?php

namespace App\Http\Controllers;

use App\Models\Experience;
use Illuminate\Http\Request;

class ExperienceController extends Controller
{
    public function edit($id)
    {
        $experience = Experience::findOrFail($id);
        return view('edit_experience', compact('experience'));
    }

    public function update(Request $request, $id)
    {
        $experience = Experience::findOrFail($id);
        $experience->update($request->all());
        return redirect()->back()->with('success', 'Experience updated successfully!');
    }
}