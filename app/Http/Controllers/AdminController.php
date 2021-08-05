<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Auth;
use App\Models\User;
use App\Models\Departement;
use App\Models\Companie;

class AdminController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        $depatements = Departement::count();
        $companies = Companie::count();
        $users = User::count();
        return view('admin.home', compact('user', 'depatements','companies','users'));
    }
}
