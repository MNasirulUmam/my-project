@extends('layouts.main')

@section('title', '| Trash Users')
@section('content') 
<div class="container">
  <div class="content mt-4">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header ">
                <strong class="card-title">Data Table</strong><br>
                <a href="{{route('users.deleteAll')}}" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Delete Permanen ?');"><i class=" fa fa-times"></i> Delete All</a>
                <a href="{{route('users.restoreAll')}}" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-reply-all"></i> Restore All</a>
            </div>
                <div class="card-body">
                   <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Fist Name</th>
                        <th>Last Name</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Company</th>
                        <th>Departement</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->username}}</td>
                          <td>{{$data->first_name}}</td>
                          <td>{{$data->last_name}}</td>
                          <td>{{$data->email}}</td>
                          <td>{{$data->phone}}</td>
                          <td>{{$data->company->name_companie}}</td>
                          <td>{{$data->departement->name_departement}}</td>
                          <td>
                            <a href="{{route('users.restore',[$data->id])}}" type="submit" class="btn btn-primary btn-sm">
                              <span class="fa fa-reply"> Restore</span>
                            </a>
                            <a href="{{route('users.deletePermanent',[$data->id])}}" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Delete Permanen ?');">
                              <span class="fa fa-trash-o"> Delate</span>
                            </a>
                          </td>
                        </tr>
                      @endforeach
                    </tbody>
                  </table>
              </div>
          </div>                      
        </div>
      </div>
    </div>
  </div>
</div>              
@endsection
  