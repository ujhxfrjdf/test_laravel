<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Company;
use App\Models\Employee;

class EmployeeController extends Controller
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
        return view ('employee')->with(
            ['employees'=>Employee::leftJoin("companies","employees.company_id", "companies.id")->select('employees.*', 'companies.name AS company')->orderByDesc('company_id')->paginate(10)]
        );
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view ('add_employee')->with(['companies'=>Company::get()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|unique:employees|string|max:255',
            'email' => 'required|unique:employees',
        ]);

        $newEmployee = new Employee();

        $newEmployee->name = $request->input('name');
        $newEmployee->surname = $request->input('surname');        
        $newEmployee->phone = $request->input('phone');
        $newEmployee->email = $request->input('email');   
        $newEmployee->company_id = $request->input('company');   
        
        $newEmployee->save();        

        return redirect('/employees');  
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
    public function edit(string $id)
    {
        return view ('edit_employee')->with(['employee'=>Employee::findOrFail($id), 'companies'=>Company::get()]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'surname' => 'required|string|max:255',
            'phone' => 'required|string|max:255',
            'email' => 'required',
        ]);

        $newEmployee = Employee::findOrFail($id);

        $newEmployee->name = $request->input('name');
        $newEmployee->surname = $request->input('surname');        
        $newEmployee->phone = $request->input('phone');
        $newEmployee->email = $request->input('email');   
        $newEmployee->company_id = $request->input('company');   
        
        $newEmployee->save();        

        return redirect('/employees');  
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Employee::where('id', $id)->delete();        
        return redirect('/employees');
    }

    public function showcompany(string $id)
    {
        return view ('employee')->with(
            ['employees'=>Employee::leftJoin("companies","employees.company_id", "companies.id")->select('employees.*', 'companies.name AS company')->where('employees.company_id', $id)->paginate(10)]
        );
    }
}
