<?php
// app/Http/Controllers/CvController.php

namespace App\Http\Controllers;

use App\Models\Cv;
use App\Models\Skill;
use App\Models\Experience;
use App\Models\Education;
use App\Models\Language;
use Illuminate\Http\Request;

class CvController extends Controller
{
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string|max:255',
            'description' => 'required|string',
            'skills.*.name' => 'nullable|string|max:255',
            'experiences.*.title' => 'nullable|string|max:255',
            'educations.*.degree' => 'nullable|string|max:255',
            'languages.*.language' => 'nullable|string|max:255',
        ]);

        // Créer le CV
        $cv = Cv::create([
            'title' => $request->title,
            'description' => $request->description,
        ]);

        // Ajouter les compétences
        if ($request->has('skills')) {
            foreach ($request->skills as $skill) {
                $cv->skills()->create(['name' => $skill['name']]);
            }
        }

        // Ajouter les expériences
        if ($request->has('experiences')) {
            foreach ($request->experiences as $experience) {
                $cv->experiences()->create(['title' => $experience['title']]);
            }
        }

        // Ajouter les formations
        if ($request->has('educations')) {
            foreach ($request->educations as $education) {
                $cv->educations()->create(['degree' => $education['degree']]);
            }
        }

        // Ajouter les langues
        if ($request->has('languages')) {
            foreach ($request->languages as $language) {
                $cv->languages()->create(['language' => $language['language']]);
            }
        }

        return redirect()->route('cvs.show', $cv->id);
    }
}
