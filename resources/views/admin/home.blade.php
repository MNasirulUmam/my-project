@extends('layouts.main')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard {{ $user->username }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p><strong>Selamat datang {{ $user->username }}!</strong> Anda telah melakukan login sebagai {{ $user->role }}</p>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
