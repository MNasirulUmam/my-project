@extends('layouts.main')

@section('title', '| Users')
@section('content') 
<div class="container">
  <div class="content mt-4">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header ">
                <strong class="card-title">Data Table</strong><br>
                <a href="{{route('users.create')}}" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create</a>
                <a href="{{route('users.trash')}}" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-shopping-cart"></i> Restore</a>
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
                          <td>{{$data->companie->name_companie}}</td>
                          <td>{{$data->departement->name_departement}}</td>
                          <td>
                            <a href="{{route('users.edit',[$data->id])}}" type="submit" class="btn btn-primary btn-sm">
                              <span class="fa fa-edit"> Edit</span>
                            </a>
                            <form action="{{route('users.destroy', [$data->id]) }}" method="POST" class="d-inline">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class=" btn btn-danger btn-sm" onclick= "return confirm('Apakah anda ingin menghapus item.?'); event.preventDefault();
                                document.getElementById('delete-item').submit();">
                                <span class="fa fa-trash"> Delete</span>
                                </button>
                            </form>
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
  