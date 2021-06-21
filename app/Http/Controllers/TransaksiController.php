<?php

namespace App\Http\Controllers;

use App\Models\Datadokter;
use App\Models\Transaksi;
use App\Models\Datahewan;
use App\Models\Jenishewan;
use App\Models\Datapemilik;
use App\Models\Tindakan;
use Illuminate\Http\Request;

class TransaksiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = Transaksi::paginate(5);
        $datatransaksi = Transaksi::all();
        $title = "Data Transaksi";
        return view('admin.transaksi', compact('data','title','datatransaksi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $title = "Form Transaksi";
        $datahewan = Datahewan::all();
        $jenishewan = Jenishewan::all();
        $datapemilik = Datapemilik::all();
        $datadokter = Datadokter::all();
        $tindakan = Tindakan::all();
        return view('admin.formtransaksi', compact('title','jenishewan','datapemilik','datahewan','datadokter','tindakan'));
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
            'nama_pemilik' => 'required',
            'nama_hewan' => 'required',
            'jns_hewan' => 'required',
            'keluhan' => 'required|max:255',
            'tindakan' => 'required',
            'tgl_berkunjung' => 'required|date',
            'nama_dokter' => 'required',
            'harga' => 'required|numeric'
        ],$message);
        Transaksi::create($validasi);
        return redirect('transaksi')->with('success','Data Berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id_transaksi
     * @return \Illuminate\Http\Response
     */
    public function show($id_transaksi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id_transaksi
     * @return \Illuminate\Http\Response
     */
    public function edit($id_transaksi)
    {
        $title = "Edit Transaksi";
        $transaksi = Transaksi::find($id_transaksi);
        $datahewan = Datahewan::all();
        $jenishewan = Jenishewan::all();
        $datapemilik = Datapemilik::all();

        $datadokter = Datadokter::all();
        $tindakan = Tindakan::all();
        return view('admin.formtransaksi', compact('title','transaksi','jenishewan','datapemilik','datahewan','datadokter','tindakan'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id_transaksi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id_transaksi)
    {
        $message=[
            'required' => 'Kolom :attribute harus lengkap',
            'date' => 'Kolom :attribute harus tanggal',
            'numeric' => 'Kolom :attribute harus angka',
        ];
        $validasi=$request->validate([
            'nama_pemilik' => 'required',
            'nama_hewan' => 'required',
            'jns_hewan' => 'required',
            'keluhan' => 'required|max:255',
            'tindakan' => 'required',
            'tgl_berkunjung' => 'required|date',
            'nama_dokter' => 'required',
            'harga' => 'required|numeric'
        ],$message);
        Transaksi::where('id_transaksi',$id_transaksi)->update($validasi);
        return redirect('transaksi')->with('success','Data berhasil diedit');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id_transaksi
     * @return \Illuminate\Http\Response
     */
    public function destroy($id_transaksi)
    {
        Transaksi::where('id_transaksi',$id_transaksi)->delete();
        return redirect('transaksi')->with('success','Data berhasil dihapus');
    }
}
