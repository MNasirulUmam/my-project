@extends('layouts.main')

@section('title', '| Cerate Company')
@section('content') 
<div class="container">
    <div class="content mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="card">
                      <div class="card-header">{{ __('Create Company') }}</div>
                        <div class="card-body card-block">
                            <form action="{{route('company.store')}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="name_companie" name="name_companie" placeholder="Name Companie" class="form-control @error('name_companie') is-invalid @enderror" value="{{ old('name_companie') }}">
                                    @error('name_companie')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="email" id="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}">
                                    @error('email')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-picture-o"></i></div>
                                <input type="file" id="logo" name="logo" class="form-control @error('logo') is-invalid @enderror" value="{{ old('logo') }}">
                                    @error('logo')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-chain"></i></div>
                                <input type="text" id="website_url" name="website_url" placeholder="Website Url" class="form-control @error('website_url') is-invalid @enderror" value="{{ old('website_url') }}">
                                    @error('website_url')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-actions form-group"><button type="submit" class="btn btn-success btn-sm">Submit</button></div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection