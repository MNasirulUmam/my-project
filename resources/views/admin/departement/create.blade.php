@extends('layouts.main')

@section('title', '| Create Departement')
@section('content') 
<div class="container">
    <div class="content mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="card">
                      <div class="card-header">Cerate Departemeny</div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="name_departement" name="name_departement" placeholder="Name Departement" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-align-justify"></i></div>
                                <input type="text" id="description" name="description" placeholder="Description" class="form-control">
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