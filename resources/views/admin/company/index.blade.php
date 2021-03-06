@extends('layouts.main')

@section('title', '| Company')
@section('content') 
<div class="container">
  <div class="content mt-4">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong><br>
                <a href="{{route('company.create')}}" type="button" class="btn btn-success btn-sm"><i class="fa fa-plus"></i> Create</a>
                <a href="{{route('company.trash')}}" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-shopping-cart"></i> Restore</a>
            </div>
                <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Email</th>
                        <th>Logo</th>
                        <th>Website Url</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->name_companie}}</td>
                          <td>{{$data->email}}</td>
                          <td class="text-center">
                              <img src="{{ Storage::url('public/image/') .$data->logo }} " class="rounded" style="width: 150px">
                          </td>
                          <td>{{$data->website_url}}</td>
                          <td class="text-center col-3">
                            <a href="{{route('company.edit',[$data->id])}}" type="button" class="btn btn-primary btn-sm">
                              <span class="fa fa-edit"> Edit</span>
                            </a>
                            <form action="{{ route('company.destroy', [$data->id]) }}" method="POST" class="d-inline">
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
  