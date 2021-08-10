<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Companie;
use App\Models\Departement;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;
use Auth;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = User::all();
        return view('admin.users.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $companies = Companie::select('id', 'name_companie')->get();
        $departements = Departement::select('id', 'name_departement')->get();
        return view('admin.users.create', compact('companies', 'departements'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
       $user = $request->validate([
            'username'   => ['required', 'string', 'max:255','unique:users'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'phone'      => ['required', 'string', 'digits_between:10,15'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
            'company_id'    => ['required', 'not_in:0'],
            'departement_id'=> ['required', 'not_in:0'],
        ]);

        $user['password'] = hash::make($request->password);

        User::create($user);
        if($user){
            return redirect()->route('users.index')->with(['info' => 'Anda menambahkan item baru']);
        }else{
            return redirect()->route('users.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = User::findOrFail($id);
        $companies = Companie::select('id', 'name_companie')->get();
        $departements = Departement::select('id', 'name_departement')->get();
        return view('admin.users.edit',compact('companies', 'departements','data'))->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = $request->validate([
            'username'   => ['required', 'string', 'max:255'],
            'first_name' => ['required', 'string', 'max:100'],
            'last_name'  => ['required', 'string', 'max:100'],
            'email'      => ['required', 'string', 'email', 'max:255'],
            'phone'      => ['required', 'string', 'digits_between:10,15'],
            'password'   => ['required', 'string', 'min:8', 'confirmed'],
            'company_id'    => ['required', 'not_in:0'],
            'departement_id'=> ['required', 'not_in:0'],
        ]);

        $user['password'] = hash::make($request->password);
        $employers= User::findOrFail($id);
        $employers->update($user);
        if($user){
            return redirect()->route('users.index')->with(['success' => 'Data berhasil Disimpan']);
        }else{
            return redirect()->route('users.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $users = User::findOrFail($id);
        $users ->delete();
        return redirect()->route('users.index')->with(['warning' => 'Data Berhasil Hapus Sementara']);
    }
    public function getDeleteUser()
    {
        $datas = User::onlyTrashed()->get();
        return view('admin.users.trash', compact('datas'));
    }

    public function restore($id)
    {

        $user = User::onlyTrashed()->where('id', $id);
        $user->restore();

        if ($user) {
            return redirect()->route('users.trash')->with(['success' => 'Data Berhasil Direstore!']);
        } else {
            return redirect()->route('users.trash')->with(['error' => 'Data Gagal Direstore!']);
        
        }
    }

    public function restoreAll()
    {
        
        $users = User::onlyTrashed();
        $users->restore();

        if ($users) {
            return redirect()->route('users.index')->with(['success'  => 'Semua Data Berhasil Direstore!']);
        } else {
            return redirect()->route('users.trash')->with(['error'    => 'Data Gagal Direstore!']);
        }
            
    }

    public function deletePermanent($id)
    {
        
        $user = User::onlyTrashed()->where('id',$id);
        $user->forceDelete();

        if ($user) {
            return redirect()->route('users.trash')->with(['success'   => 'Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('users.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        } 
    }

    public function deleteAll()
    {

        $users = User::onlyTrashed();
        $users->forceDelete();

        if ($users) {
            return redirect()->route('users.index')->with(['success'   => 'Semua Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('users.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        }
    }
}
