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
        
        $imageName = null; 

    
    if ($request->hasFile('logo')) {
        
        $imageName = time() . '.' . $request->file('logo')->getClientOriginalExtension();
        $request->file('logo')->move(public_path('images'), $imageName);
    }

        $enterprise = new Enterprise();
        $enterprise->user_id = auth()->id(); 
        $enterprise->logo = $imageName; 
        $enterprise->slogan = $request->input('slogan');
        $enterprise->industrie = $request->input('industrie');
        $enterprise->discreption = $request->input('discreption');
        $enterprise->save(); 

        return redirect()->route('dashboard');
    }
}

