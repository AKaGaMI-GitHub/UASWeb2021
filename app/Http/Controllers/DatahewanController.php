<?php

namespace App\Http\Controllers;

use App\Models\Datahewan;
use App\Models\Jenishewan;
use App\Models\Datapemilik;
use Illuminate\Http\Request;

class DatahewanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Datahewan::paginate(5);
        $datahewan = Datahewan::all();
        $title = "Data Hewan";
        return view('admin.datahewan', compact('title','datahewan', 'data'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Input Data Hewan";
        $jenishewan = Jenishewan::all();
        $datapemilik = Datapemilik::all();
        return view('admin.formdatahewan', compact('title','jenishewan','datapemilik'));
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
        ];
        $validasi=$request->validate([
            'nama_hewan' => 'required',
            'jns_hewan' => 'required',
            'jns_kelamin' => 'required',
            'tgl_lhr' => 'required|date',
            'nama_pemilik' => 'required'
        ],$message);
        Datahewan::create($validasi);
        return redirect('datahewan')->with('success','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_hewan
     * @return \Illuminate\Http\Response
     */
    public function show($id_hewan)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_hewan
     * @return \Illuminate\Http\Response
     */
    public function edit($id_hewan)
    {
        $datahewan = Datahewan::find($id_hewan);
        $jenishewan = Jenishewan::all();
        $datapemilik = Datapemilik::all();
        $title = "Edit Data Hewan";
        return view('admin.formdatahewan',compact('title','datahewan','jenishewan','datapemilik'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_hewan
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_hewan)
    {
        $message=[
            'required' => 'Kolom :attribute harus lengkap',
            'date' => 'Kolom :attribute harus tanggal',
            'numeric' => 'Kolom :attribute harus angka',
        ];
        $validasi=$request->validate([
            'nama_hewan' => 'required|max:255',
            'jns_hewan' => 'required',
            'jns_kelamin' => 'required|max:30',
            'tgl_lhr' => 'required|date',
            'nama_pemilik' => 'required'
        ],$message);

        Datahewan::where('id_hewan',$id_hewan)->update($validasi);
        return redirect('datahewan')->with('success', 'Data Berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_hewan
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_hewan)
    {
        Datahewan::where('id_hewan',$id_hewan)->delete();
        return redirect('datahewan')->with('Data berhasil dihapus');
    }
}
