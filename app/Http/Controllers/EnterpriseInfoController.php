<?php

namespace App\Http\Controllers;

use App\Models\Enterprise;
use Illuminate\Http\Request;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

class EnterpriseInfoController extends Controller
{


    public function entrepriseinfo()
    {
        return view('/enterprise-info');
    }
    public function store(Request $request)
    {
        $request->validate([
            'logo' => 'nullable|image',
            'slogan' => 'nullable|string|max:255',
            'industrie' => 'nullable|string|max:255',
            'discreption' => 'nullable|string',
        ]);
        
        $imageName = null; // Initialize imageName variable

    // Check if logo file is uploaded
    if ($request->hasFile('logo')) {
        // Store the image and get the image name
        $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path('images'), $imageName);
    }

        $enterprise = new Enterprise();
        $enterprise->user_id = auth()->id(); // Assuming you are using authentication
        $enterprise->logo = $imageName; // Save the image name
        $enterprise->slogan = $request->input('slogan');
        $enterprise->industrie = $request->input('industrie');
        $enterprise->discreption = $request->input('discreption');
        $enterprise->save(); 

        return redirect()->route('dashboard');
    }
}

