@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Companies</div>

                <div class="card-body">
                    <a href="/companies/create">
                        <button type="submit" class="btn btn-success mb-3">Create a new company</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col"></th>
                                    <th scope="col">Logo</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Address</th>
                                    <th scope="col">Website</th>
                                    <th scope="col">Email</th>  
                                    <th scope="col"></th>                        
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($companies as $company)                        
                                    <tr>
                                        <td>
                                            <div class="text-center">
                                                <a href="{{ route('employees.showcompany', $company->id) }}">                                
                                                    <button type="button" class="btn btn-sm rounded-pill btn-outline-secondary w-100">Employees</button>
                                                </a>
                                            </div>  
                                        </td>

                                        <td><img class="rounded-circle flex-shrink-0" src="{{ asset('images/' . $company->logo) }}"  alt="" style="width: 40px; height: 40px;"></td>
                                        
                                        <td>{{ $company->name }}</td>
                                        <td>{{ $company->address }}</td> 
                                        <td>{{ $company->website }}</td>
                                        <td>{{ $company->email }}</td>

                                        <td>
                                            <div class="text-center">
                                                <a href="{{ route('companies.edit', $company->id) }}">                                
                                                    <button type="button" class="btn btn-sm rounded-pill btn-outline-primary w-100 mb-3">Edit</button>
                                                </a>
                                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST">
                                                    <input type="hidden" name="_method" value="DELETE">
                                                    <input type="hidden" name="_token" value="{{ csrf_token() }}">
                                                    <input type="submit" class="btn btn-sm rounded-pill btn-outline-danger w-100" value="Delete">
                                                </form>
                                            </div>  
                                        </td>                        
                                    </tr>
                                @endforeach                                
                            </tbody>
                        </table>
                    </div>                                   
                </div>                  
                {{ $companies->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection
