@extends('layouts.main')

@section('title', '| Trash Departement')
@section('content')
<div class="container">
  <div class="content mt-4">
    <div class="animated fadeIn">
      <div class="row">
        <div class="col-md-12">
          <div class="card">
            <div class="card-header">
                <strong class="card-title">Data Table</strong><br>
                <a href="{{route('departement.deleteAll')}}" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Delete Permanen ?');"><i class=" fa fa-times"></i> Delete All</a>
                <a href="{{route('departement.restoreAll')}}" type="button" class="btn btn-secondary btn-sm"><i class="fa fa-reply-all"></i> Restore All</a>
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
                            <a href="{{route('departement.restore',[$data->id])}}" type="button" class="btn btn-primary btn-sm">
                              <span class="fa fa-reply"> Restore</span>
                            </a>
                            <a href="{{route('departement.deletePermanent',[$data->id])}}" type="button" class="btn btn-danger btn-sm" onclick="return confirm('Apakah Anda Yakin Delete Permanen ?');">
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