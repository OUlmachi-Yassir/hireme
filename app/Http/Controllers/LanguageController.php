<?php


namespace App\Http\Controllers;

use App\Models\Language;
use Illuminate\Http\Request;

class LanguageController extends Controller
{
    public function edit($id)
    {
        $language = Language::findOrFail($id);
        return view('edit_language', compact('language'));
    }

    public function update(Request $request, $id)
    {
        $language = Language::findOrFail($id);
        $language->update($request->all());
        return redirect()->back()->with('success', 'Language updated successfully!');
    }

    public function store(Request $request)
    {
        $request->validate([
            'language' => 'required|string|max:255',
            'proficiency' => 'required|string|max:255',

        ]);

        $language = new Language();
        $language->fill($request->all());
        $language->user_id = auth()->id();
        $language->save();
       

        return redirect()->back()->with('success', 'Language added successfully!');
    }
}