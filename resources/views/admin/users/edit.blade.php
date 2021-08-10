@extends('layouts.main')

@section('title', '| Create Edit')
@section('content') 
<div class="container">
    <div class="content mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="card">
                      <div class="card-header">{{ __('Edit Users') }}</div>
                        <div class="card-body card-block">
                            <form action="{{route('users.update',[$data->id])}}" method="POST" class="">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="username" name="username" placeholder="Username" class="form-control @error('username') is-invalid @enderror" value="{{ $data->username}}">
                                @error('username')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-arrow-circle-o-left"></i></div>
                                <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control @error('first_name') is-invalid @enderror" value="{{ $data->first_name}}">
                                @error('first_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-arrow-circle-o-right"></i></div>
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control @error('last_name') is-invalid @enderror" value="{{ $data->last_name}}">
                                @error('last_name')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="text" id="email" name="email" placeholder="Email" class="form-control @error('email') is-invalid @enderror" value="{{ $data->email }}">
                                @error('email')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control @error('phone') is-invalid @enderror" value="{{ $data->phone}}">
                                @error('phone')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-unlock-alt"></i></div>
                                <input type="password" id="password" name="password" placeholder="password" class="form-control @error('password') is-invalid @enderror" value="{{ $data->password}}">
                                @error('password')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-key"></i></div>
                                <input type="password" id="password-confirm" name="password_confirmation" placeholder="Password Confirmation" class="form-control @error('password_confirmation') is-invalid @enderror" value="{{ $data->password_confirmation}}">
                                @error('password_confirmation')
                                    <div class="alert alert-danger mt-2">{{ $message }}</div>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                <select class="form-control @error('company') is-invalid @enderror" name="company_id" id="select_company" required>
                                    <option value="">-- Select Company --</option>
                                    @foreach($companies as $company)
                                        <option value="{{$company->id}}">{{$company->name_companie}}</option>
                                    @endforeach
                                </select>
                                @error('company')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                <select class="form-control @error('departement') is-invalid @enderror" name="departement_id" id="select_department" required>
                                    <option value="">-- Select Department --</option>
                                    @foreach($departements as $department)
                                        <option value="{{$department->id}}">{{$department->name_departement}}</option>
                                    @endforeach
                                </select>

                                @error('departments')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
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