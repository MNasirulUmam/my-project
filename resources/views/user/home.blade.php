@extends('layouts.main')

@section('title', '| Home User')
@section('content')
<div class="col-sm-12">
    <div class="card-header">Dashboard {{ $user->username }}</div>
    <div class="content">
        @if (session('status'))
            <div class="alert alert-success" role="alert">
                {{ session('status') }}
            </div>
        @endif

        <p><strong>Selamat Datang {{ $user->username }}!</strong> Anda telah melakukan login sebagai {{ $user->role }}</p>
    </div>
    <div class="alert  alert-success alert-dismissible fade show" role="alert">
        <span class="badge badge-pill badge-success center">Success</span>  Selamat Datang {{ $user->username }}
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
        </button>
    </div>
    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-layout-grid2 text-primary border-primary"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Company</div>
                        <div class="stat-digit">{{$companies}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-harddrives text-danger border-danger"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total Departement</div>
                        <div class="stat-digit">{{$depatements}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-lg-4 col-md-6">
        <div class="card">
            <div class="card-body">
                <div class="stat-widget-one">
                    <div class="stat-icon dib"><i class="ti-user text-success border-success"></i></div>
                    <div class="stat-content dib">
                        <div class="stat-text">Total User</div>
                        <div class="stat-digit">{{$users}}</div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
