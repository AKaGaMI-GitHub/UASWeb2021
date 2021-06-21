<?php

namespace App\Http\Controllers;

use App\Models\Datapemilik;
use Illuminate\Http\Request;

class DatapemilikController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Datapemilik::paginate(5);
        $datapemilik = Datapemilik::all();
        $title = "Data Pemilik";
        return view('admin.datapemilik', compact('title', 'datapemilik', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Data Pemilik";
        return view('admin.formdatapemilik', compact('title'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $message=[
            'required' => 'Kolom :attribute harus lengkap',
            'date' => 'Kolom :attribute harus tanggal',
            'numeric' => 'Kolom :attribute harus angka',
        ];
        $validasi=$request->validate([
            'nama_pemilik' => 'required|max:255',
            'jns_kelamin' => 'required|max:20',
            'tmpt_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|date',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric',
            'tgl_daftar' => 'required|date'
        ],$message);
        Datapemilik::create($validasi);
        return redirect('datapemilik')->with('success','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_pemilik)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_pemilik
     * @return \Illuminate\Http\Response
     */
    public function edit($id_pemilik)
    {
        $datapemilik = Datapemilik::find($id_pemilik);
        $title = "Edit Data Pemilik";
        return view('admin.formdatapemilik', compact('title', 'datapemilik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_pemilik)
    {
        $message=[
            'required' => 'Kolom :attribute harus lengkap',
            'date' => 'Kolom :attribute harus tanggal',
            'numeric' => 'Kolom :attribute harus angka',
        ];
        $validasi=$request->validate([
            'nama_pemilik' => 'required|max:255',
            'jns_kelamin' => 'required|max:20',
            'tmpt_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|date',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric',
            'tgl_daftar' => 'required|date'
        ],$message);
        Datapemilik::where('id_pemilik',$id_pemilik)->update($validasi);
        return redirect('datapemilik')->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_pemilik
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_pemilik)
    {
        Datapemilik::where('id_pemilik',$id_pemilik)->delete();
        return redirect('datapemilik')->with('success','Data berhasil dihapus');
    }
}
