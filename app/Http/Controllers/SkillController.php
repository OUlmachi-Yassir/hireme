<?php 

namespace App\Http\Controllers;

use App\Models\Skill;
use Illuminate\Http\Request;

class SkillController extends Controller
{
    public function edit($id)
    {
        $skill = Skill::findOrFail($id);
        return view('edit_skill', compact('skill'));
    }

    public function update(Request $request, $id)
    {
        $skill = Skill::findOrFail($id);
        $skill->update($request->all());
        return redirect()->back()->with('success', 'Skill updated successfully!');
    }
}