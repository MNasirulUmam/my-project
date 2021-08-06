@extends('layouts.main')

@section('title', '| Create User')
@section('content') 
<div class="container">
    <div class="content mt-4">
        <div class="animated fadeIn">
            <div class="row">
                <div class="col-lg-12" >
                    <div class="card">
                      <div class="card-header">Cerate Users</div>
                        <div class="card-body card-block">
                            <form action="" method="post" class="">
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-user"></i></div>
                                <input type="text" id="username" name="username" placeholder="Username" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-arrow-circle-o-left"></i></div>
                                <input type="text" id="first_name" name="first_name" placeholder="First Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-arrow-circle-o-right"></i></div>
                                <input type="text" id="last_name" name="last_name" placeholder="Last Name" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-envelope"></i></div>
                                <input type="text" id="email" name="email" placeholder="Email" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-phone-square"></i></div>
                                <input type="text" id="phone" name="phone" placeholder="Phone" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-building-o"></i></div>
                                <input type="text" id="company_id" name="company_id" placeholder="Company Id" class="form-control">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="input-group">
                                <div class="input-group-addon"><i class="fa fa-tasks"></i></div>
                                <input type="text" id="departement_id" name="departement_id" placeholder="Departement Id" class="form-control">
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