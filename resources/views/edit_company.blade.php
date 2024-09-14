@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit a company</div>

                <div class="card-body">                    
                <form method="POST" enctype="multipart/form-data" action="{{ route('companies.update', $company->id) }}">
                        {{ csrf_field () }}   
                        @method('put')

                        <div class="row mb-3">
                            <label for="name" class="col-md-4 col-form-label text-md-end">Name</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="name" value="{{ old('name', $company->name) }}" required autocomplete="name" autofocus>                               
                            </div>
                        </div>   
                        
                        <div class="row mb-3">
                            <label for="address" class="col-md-4 col-form-label text-md-end">Address</label>

                            <div class="col-md-6">
                                <input id="address" type="text" class="form-control" name="address" value="{{ old('address', $company->address) }}" required autocomplete="address" autofocus>                               
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <label for="website" class="col-md-4 col-form-label text-md-end">Website</label>

                            <div class="col-md-6">
                                <input id="website" type="text" class="form-control" name="website" value="{{ old('website', $company->website) }}" required autocomplete="website" autofocus>                               
                            </div>
                        </div> 

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">Email Address</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email', $company->email) }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div> 
                        
                        <div class="row mb-3">     
                            <label for="logo" class="col-md-4 col-form-label text-md-end">Logo</label>

                            <div class="col-md-6">
                                <input class="form-control bg-white" type="file" id="formFile" name="logo">
                            </div>                            
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">Edit</button>                                
                            </div>
                        </div>
                    </form>
                </div>                
            </div>
        </div>
    </div>
</div>
@endsection
