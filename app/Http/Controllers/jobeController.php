<?php

namespace App\Http\Controllers;

use App\Models\Jobe;
use App\Models\Enterprise;
use Illuminate\Http\Request;

class jobeController extends Controller
{

    public function index()
    {
        $jobes = Jobe::all();
        return view('myPost', compact('jobes'));
    }
    
    public function anotherPgae()
    {
        $jobes = Jobe::all();
        return view('dashboard', compact('jobes'));
    }
    public function create()
    {
        $enterprises = Enterprise::all();
        return view('myPost', compact('enterprises'));
    }

    public function store(Request $request)
{
    // Validate the incoming request data
    $validatedData = $request->validate([
        'titre' => 'required',
        'discreption' => 'required',
        'competence' => 'required',
        'type' => 'required|in:à distance,hybride,à temps plein',
    ]);

    // Get the enterprise ID of the authenticated user
    $enterpriseId = auth()->user()->entreprise->id;

    // Create a new Jobe instance and save it to the database
    Jobe::create([
        'enterprise_id' => $enterpriseId,
        'titre' => $validatedData['titre'],
        'discreption' => $validatedData['discreption'],
        'competence' => $validatedData['competence'],
        'type' => $validatedData['type'],
    ]);

    // Redirect back with success message
    return back()->with('success', 'Job post created successfully!');
}


public function ajaxSearch(Request $request)
    {
        $query = $request->input('q');

        // Perform your search query here based on the $query variable
        $results = Jobe::where('titre', 'like', "%$query%")
                       ->orWhere('competence', 'like', "%$query%")
                       ->orWhere('type', 'like', "%$query%")
                       ->get();

        return response()->json($results);
    }


}

