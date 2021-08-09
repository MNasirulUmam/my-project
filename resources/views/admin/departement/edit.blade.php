@extends('layouts.main')

@section('title', '| Edit Departement')
@section('content')
<div class="container">
    <div class="content mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="card">
                      <div class="card-header">{{ __('Edit Departement') }}</div>
                        <div class="card-body card-block">
                            <form action="{{route('departement.update',[$data->id])}}" method="POST" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="name_departement" name="name_departement" placeholder="Name Departement" class="form-control @error('name_departement') is-invalid @enderror" value="{{ old('name_departement',$data->name_departement)}}">
                                    @error('name_departement')
                                        <div class="alert alert-danger mt-2">{{ $message }}</div>
                                    @enderror
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="text" id="description" name="description" placeholder="Description" class="form-control @error('description') is-invalid @enderror" value="{{ old('description',$data->description)}}">
                                    @error('description')
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