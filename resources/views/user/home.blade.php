@extends('layouts.main')
@section('breadcrumbs', '')
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
</div>
@endsection
