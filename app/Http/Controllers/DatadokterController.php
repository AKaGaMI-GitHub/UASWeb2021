<?php

namespace App\Http\Controllers;

use App\Models\Datadokter;
use Illuminate\Http\Request;

class DatadokterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {   
        $data = Datadokter::paginate(5);
        $datadokter = Datadokter::all();
        $title = "Data Dokter";
        return view('admin.datadokter', compact('title','datadokter', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Data Dokter";
        return view('admin.formdatadokter',compact('title'));
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
            'nama_dokter' => 'required|max:255',
            'tmpt_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|date',
            'jns_kelamin' => 'required|max:20',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric',
            'agama' => 'required|max:255',
            'status' => 'required|max:20'
        ],$message);
        Datadokter::create($validasi);
        return redirect('datadokter')->with('success','Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id_dokter)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id_dokter)
    {
        $datadokter = Datadokter::find($id_dokter);
        $title = "Edit Data Dokter";
        return view('admin.formdatadokter',compact('title','datadokter'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_dokter)
    {
        $message=[
            'required' => 'Kolom :attribute harus lengkap',
            'date' => 'Kolom :attribute harus tanggal',
            'numeric' => 'Kolom :attribute harus angka',
        ];
        $validasi=$request->validate([
            'nama_dokter' => 'required|max:255',
            'tmpt_lhr' => 'required|max:255',
            'tgl_lhr' => 'required|date',
            'jns_kelamin' => 'required|max:20',
            'alamat' => 'required|max:255',
            'no_telp' => 'required|numeric',
            'agama' => 'required|max:255',
            'status' => 'required|max:20'
        ],$message);
        Datadokter::where('id_dokter',$id_dokter)->update($validasi);
        return redirect('datadokter')->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_dokter)
    {
        Datadokter::where('id_dokter',$id_dokter)->delete();
        return redirect('datadokter')->with('success','Data berhasil dihapus');
    }
}
