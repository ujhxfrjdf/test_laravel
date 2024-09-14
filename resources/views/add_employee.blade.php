@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Create a new employee</div>

                <div class="card-body">                    
                <form method="POST" enctype="multipart/form-data" action="{{ route('employees.store') }}">
                        {{ csrf_field () }}   

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>                               
                            </div>
                        </div>   
                        
                        <div class="row mb-3">
                            <label for="surname" class="col-md-4 col-form-label text-md-end">Surname</label>

                            <div class="col-md-6">
                                <input id="surname" type="text" class="form-control" name="surname" value="{{ old('surname') }}" required autocomplete="surname" autofocus>                               
                            </div>
                        </div> 
                        
                        <div class="row mb-3">     
                            <label for="company" class="col-md-4 col-form-label text-md-end">Company</label>      

                            <div class="col-md-6">
                                <select class="form-select bg-white" id="floatingSelect" name="company">
                                    @foreach ($companies as $company)                            
                                        <option value="{{ $company->id }}">{{ $company->name }}</option>
                                    @endforeach                              
                                </select>                                
                            </div>                                                         
                        </div>

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <label for="phone" class="col-md-4 col-form-label text-md-end">Phone</label>

                            <div class="col-md-6">
                                <input id="phone" type="text" class="form-control" name="phone" value="{{ old('phone') }}" required autocomplete="phone" autofocus>                               
                            </div>
                        </div>                         

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Create</button>                                
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
