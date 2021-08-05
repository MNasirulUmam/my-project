@extends('layouts.main')

@section('title', '| Departement')
@section('content') 
<div class="container">
  <div class="content mt-4">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong>
            </div>
                <div class="card-body">
                  <table id="bootstrap-data-table" class="table table-striped table-bordered">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Description</th>
                        <th class="text-center">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach($datas as $data)
                        <tr>
                          <th scope="row">{{$loop->iteration}}</th>
                          <td>{{$data->name_departement}}</td>
                          <td>{{$data->description}}</td>
                          <td class="text-center">
                            <button href="" type="submit" class="btn btn-primary btn-sm">
                              <span class="fa fa-edit"> Edit</span>
                            </button>
                            <button href="" type="submit" class="btn btn-danger btn-sm" onclick="return confirm('yakin hapus data ?');">
                              <span class="fa fa-trash-o"> Delate</span>
                            </button>
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
  