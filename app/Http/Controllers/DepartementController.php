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

class DepartementController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Departement::all();
        return view('admin.departement.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.departement.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name_departement'  => 'required|min: 2|unique:departements',
            'description'       => 'required|min: 5',
        ]);
        
        $departement  = Departement::create($request->all());
        if($departement) {
            return redirect()->route('departement.index')->with('success', 'Data Company Berhasil Dihapus Sementara');
        }else{
            return redirect()->route('departement.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $data = Departement::findOrFail($id);
        return view('admin.departement.edit',compact('data'));
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
        $request->validate([
            'name_departement' => 'required|string|min: 2|unique:departements',
            'description'      => 'required|string|min: 5',
        ]);
        $departement = Departement::findOrFail($id);
        $departement->update($request->all());
        if($departement){
            return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('departement.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $departement = Departement::findOrFail($id);
        $departement->delete();
        return redirect()->route('departement.index')->with(['warning' => 'Data Berhasil Hapus Sementara']);
    }
    public function getDeleteDepartement()
    {
        $datas = Departement::onlyTrashed()->get();
        return view('admin.departement.trash', compact('datas'));
    }

    public function restore($id)
    {

        $departement = Departement::onlyTrashed()->where('id', $id);
        $departement->restore();

        if ($departement) {
            return redirect()->route('departement.trash')->with(['success' => 'Data Berhasil Direstore!']);
        } else {
            return redirect()->route('departement.trash')->with(['error' => 'Data Gagal Direstore!']);
        
        }
    }

    public function restoreAll()
    {
        
        $departement= Departement::onlyTrashed();
        $departement->restore();

        if ($departement) {
            return redirect()->route('departement.index')->with(['success'  => 'Semua Data Berhasil Direstore!']);
        } else {
            return redirect()->route('departement.trash')->with(['error'    => 'Data Gagal Direstore!']);
        }
            
    }

    public function deletePermanent($id)
    {
        
        $departement = Departement::onlyTrashed()->where('id',$id);
        $departement->forceDelete();

        if ($departement) {
            return redirect()->route('departement.trash')->with(['success'   => 'Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('departement.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        } 
    }

    public function deleteAll()
    {

        $departement = Departement::onlyTrashed();
        $departement->forceDelete();

        if ($departement) {
            return redirect()->route('departement.index')->with(['success'   => 'Semua Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('departement.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        }
    }
}
