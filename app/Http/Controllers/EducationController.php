<?php
namespace App\Http\Controllers;

use App\Models\Education;
use Illuminate\Http\Request;

class EducationController extends Controller
{
    public function edit($id)
    {
        $education = Education::findOrFail($id);
        return view('edit_education', compact('education'));
    }

    public function update(Request $request, $id)
    {
        $education = Education::findOrFail($id);
        $education->update($request->all());
        return redirect()->back()->with('success', 'Education updated successfully!');
    }
}