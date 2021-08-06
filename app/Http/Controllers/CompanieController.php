<?php

namespace App\Http\Controllers;
use App\Models\Companie;
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
            'email'          => 'required',
            'logo'         => 'required|file|image|mimes:jpeg,png,jpg|max:2048',
            'website_url'    => 'required|min: 5',
       
        ]);
        //upload image
        $image = $request->file('logo');
        $image->storeAs('public/image', $image->hashName());

        $data = Companie::create([
            'name_companie'     => $request->name_companie,
            'email'   => $request->email,
            'logo'     => $image->hashName(),
            'website_url' =>$request->website_url,
            
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
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
