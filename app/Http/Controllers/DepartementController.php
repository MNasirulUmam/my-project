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
            'name_departement'  => 'required|min: 2',
            'description'       => 'required|min: 5',
        ]);
        $data   = $request->all();
        $depart  = Departement::create($data);
        if($depart) {
            return redirect()->route('departement.index')->with(['success' => 'Data Berhasil Disimpan!']);
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
        return view('admin.departement.edit',compact('data'))->with(['success' => 'Data Berhasil Disimpan!']);
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
            'name_departement' => 'min: 2',
            'description'      => 'min: 5',
        ]);
        $depart = Departement::findOrFail($id);
        $data   = $request->all();
        $depart->update($data);
        if($depart){
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
        $departem = Departement::findOrFail($id);
        $departem->delete();
        return redirect()->route('departement.index')->with(['warning' => 'Data Berhasil Hapus Sementara']);
    }
    public function getDeleteDepartement()
    {
        $datas = Departement::onlyTrashed()->get();
        return view('admin.departement.trash', compact('datas'));
    }

    public function restore($id)
    {

        $depart = Departement::onlyTrashed()->where('id', $id);
        $depart->restore();

        if ($depart) {
            return redirect()->route('departement.trash')->with(['success' => 'Data Berhasil Direstore!']);
        } else {
            return redirect()->route('departement.trash')->with(['error' => 'Data Gagal Direstore!']);
        
        }
    }

    public function restoreAll()
    {
        
        $dem= Departement::onlyTrashed();
        $dem->restore();

        if ($dem) {
            return redirect()->route('departement.index')->with(['success'  => 'Semua Data Berhasil Direstore!']);
        } else {
            return redirect()->route('departement.trash')->with(['error'    => 'Data Gagal Direstore!']);
        }
            
    }

    public function deletePermanent($id)
    {
        
        $depart = Departement::onlyTrashed()->where('id',$id);
        $depart->forceDelete();

        if ($siswas) {
            return redirect()->route('departement.trash')->with(['success'   => 'Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('departement.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        } 
    }

    public function deleteAll()
    {

        $dem = Departement::onlyTrashed();
        $dem->forceDelete();

        if ($dem) {
            return redirect()->route('departement.index')->with(['success'   => 'Semua Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('departement.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        }
    }
}
