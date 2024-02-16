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

    public function store(Request $request)
    {
        $request->validate([
            'degree' => 'required|string|max:255',
            'institution' => 'required|string|max:255',
            'field_of_study' => 'required|string|max:255',
        ]);
     
        $education = new Education();
        $education->fill($request->all());
        $education->user_id = auth()->id();
        $education->save();

        return redirect()->back()->with('success', 'Education added successfully!');
    }
}