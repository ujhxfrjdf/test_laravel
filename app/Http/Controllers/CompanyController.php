<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;

class CompanyController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {        
        return view ('company')->with(['companies'=>Company::orderByDesc('id')->paginate(10)]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('add_company');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'website' => 'required|unique:companies|string|max:255',
            'email' => 'required|unique:companies',
        ]);

        $newCompany = new Company();

        $newCompany->name = $request->input('name');
        $newCompany->address = $request->input('address');
        $newCompany->website = $request->input('website');
        $newCompany->email = $request->input('email');
        
        if ($request->hasFile('logo')) {
            $filename = rand().$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path("/images"), $filename);
        }

        else{
            $filename = 'logo.png';
        }
        $newCompany->logo = $filename;
        
        $newCompany->save();        

        return redirect('/companies');  
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        return view ('edit_company')->with(['company'=>Company::findOrFail($id)]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required',
            'website' => 'required|string|max:255',
            'email' => 'required',
        ]);

        $newCompany = Company::findOrFail($id);

        $newCompany->name = $request->input('name');
        $newCompany->address = $request->input('address');
        $newCompany->website = $request->input('website');
        $newCompany->email = $request->input('email');
        
        if ($request->hasFile('logo')) {
            $filename = rand().$request->file('logo')->getClientOriginalName();
            $request->file('logo')->move(public_path("/images"), $filename);
        }

        else{
            $filename = $newCompany->logo;
        }
        $newCompany->logo = $filename;
        
        $newCompany->save();        

        return redirect('/companies'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        Company::where('id', $id)->delete();        
        return redirect('/companies'); 
    }
}
