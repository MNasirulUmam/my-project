<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\Companie;
use App\Models\Department;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

use Illuminate\Http\Request;

class CompanieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $datas = Companie::all();
        return view('admin.company.index',compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.company.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'name_companie'  => 'required|min: 5',
            'email'          => 'required|email',
            'logo'           => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'website_url'    => 'required|min: 5',
       
        ]);
        //upload image
        $image = $request->file('logo');
        $image->storeAs('public/image', $image->hashName());

        $data = Companie::create([
            'name_companie'  => $request->name_companie,
            'email'          => $request->email,
            'logo'           => $image->hashName(),
            'website_url'    => $request->website_url,
            
        ]);
        if($data){
            return redirect()->route('company.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else{
            return redirect()->route('company.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        // return view('admin.show-Company', compact('datas'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $data = Companie::findOrFail($id);
        return view('admin.company.edit',compact('data'))->with(['success' => 'Data Berhasil Disimpan!']);
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
        $validated = $request->validate([
            'name_companie'  => 'required|min: 5',
            'email'          => 'required|email',
            'logo'           => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'website_url'    => 'required|min: 5',
       
        ]);
        $companies = Companie::findOrFail($id); //mencari user berdasarkan id Companie

        if($request->file('logo') == "") {

            $companies->update([
                'name_companie'  => $request->name_companie,
                'email'          => $request->email,
                'website_url'    => $request->website_url,
                
            ]);
    
        } else {
    
            //hapus old image
            Storage::disk('local')->delete('public/image/'.$companies->image);
    
            //upload new image
            $image = $request->file('logo');
            $image->storeAs('public/image', $image->hashName());
    
            $companies->update([
                'logo'           => $image->hashName(),
                'name_companie'  => $request->name_companie,
                'email'          => $request->email,
                'website_url'    => $request->website_url,
                
            ]);
    
        }
        if($companies){
            return redirect()->route('company.index')->with(['info' => 'Anda menambahkan item baru']);
        }else{
            return redirect()->route('company.index')->with(['error' => 'Data Gagal Disimpan!']);
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
        $companies = Companie::findOrFail($id);
        $companies->delete();
        return redirect()->route('company.index')->with(['warning' => 'Data Berhasil Hapus Sementara']);
         
    }

    public function getDeleteCompanie()
    {
        $datas = Companie::onlyTrashed()->get();
        return view('admin.company.trash', compact('datas'));
    }

    public function restore($id)
    {

        $company = Companie::onlyTrashed()->where('id', $id);
        $company->restore();

        if ($company) {
            return redirect()->route('company.trash')->with(['success' => 'Data Berhasil Direstore!']);
        } else {
            return redirect()->route('company.trash')->with(['error' => 'Data Gagal Direstore!']);
        
        }
    }

    public function restoreAll()
    {
        
        $compan= Companie::onlyTrashed();
        $compan->restore();

        if ($compan) {
            return redirect()->route('company.index')->with(['success'  => 'Semua Data Berhasil Direstore!']);
        } else {
            return redirect()->route('company.trash')->with(['error'    => 'Data Gagal Direstore!']);
        }
            
    }

    public function deletePermanent($id)
    {
        
        $siswas = Companie::onlyTrashed()->where('id',$id);
        $siswas->forceDelete();

        if ($siswas) {
            return redirect()->route('company.trash')->with(['success'   => 'Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('company.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        } 
    }

    public function deleteAll()
    {

        $compan = Companie::onlyTrashed();
        $compan->forceDelete();

        if ($compan) {
            return redirect()->route('company.index')->with(['success'   => 'Semua Data Berhasil Dihapus Permanen!']);
        } else {
            return redirect()->route('company.trash')->with(['error'     => 'Data Gagal Dihapus!']);
        }
    }
}
