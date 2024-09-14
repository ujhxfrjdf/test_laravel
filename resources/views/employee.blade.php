@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Employees</div>

                <div class="card-body">
                    <a href="/employees/create">
                        <button type="submit" class="btn btn-success mb-3">Create a new employee</button>
                    </a>
                    <div class="table-responsive">
                        <table class="table text-start align-middle table-bordered table-hover mb-0">
                            <thead>
                                <tr>
                                    <th scope="col">Company</th> 
                                    <th scope="col">Name</th>
                                    <th scope="col">Surname</th>
                                    <th scope="col">Email</th>
                                    <th scope="col">Phone</th>                                     
                                    <th scope="col"></th>                        
                                </tr>
                            </thead>

                            <tbody>
                                @foreach ($employees as $employee)                        
                                    <tr>
                                        <td>{{ $employee->company }}</td>
                                        <td>{{ $employee->name }}</td>
                                        <td>{{ $employee->surname }}</td> 
                                        <td>{{ $employee->email }}</td>
                                        <td>{{ $employee->phone }}</td>

                                        <td>
                                            <div class="text-center">
                                                <a href="{{ route('employees.edit', $employee->id) }}">                                
                                                    <button type="button" class="btn btn-sm rounded-pill btn-outline-primary w-100 mb-3">Edit</button>
                                                </a>
                                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST">
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
                {{ $employees->links() }} 
            </div>
        </div>
    </div>
</div>
@endsection
