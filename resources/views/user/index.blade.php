@extends('layouts.users')

@section('title', '| User')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Role User :') }} <b>{{Auth::user()->role}}</b></div>

                <div class="card-body">

                     
                    <div class="col-md-12">
                        <aside class="profile-nav alt">
                            <section class="card">
                                <div class="card-header user-header alt bg-dark">
                                    <div class="media">
                                        <a href="#">
                                            <img class="align-self-center rounded-circle mr-3" style="width:85px; height:85px;" alt="" src="{{ asset('style/images/admin.jpg') }}">
                                        </a>
                                        <div class="media-body">
                                            <h2 class="text-light display-6">{{Auth::user()->username}}</h2>
                                            <p>{{Auth::user()->departement->name_departement}}</p>
                                        </div>
                                    </div>
                                </div>
                                <ul class="list-group list-group-flush">
                                    <li class="list-group-item">
                                        <h5>First Name :{{Auth::user()->first_name}}</h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Last Name  :{{Auth::user()->last_name}}</h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Email      :{{Auth::user()->email}}</h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Phone      :{{Auth::user()->phone}}</h5>
                                    </li>
                                    <hr>
                                    
                                    <li class="list-group-item">
                                        <h5>Company     :{{Auth::user()->company->name_companie}}</h5>
                                    </li>
                                    <li class="list-group-item">
                                        <h5>Department  :{{Auth::user()->departement->name_departement}}</h5>
                                    </li>
                                </ul>
                            </section>
                        </aside>
                    </div>                
                </div>
            </div>
        </div>
    </div>
</div>
@endsection