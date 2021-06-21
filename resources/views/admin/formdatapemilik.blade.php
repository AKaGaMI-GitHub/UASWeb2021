<x-template-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="tl-3xl bg-green-700 p-4 shadow text-2xl text-white font-bold mt-3">
        {{$title}}
    </div>
    <div>
        <form action="{{(isset($datapemilik))?route('datapemilik.update', $datapemilik->id_pemilik):route('datapemilik.store')}}" method="POST">
            @csrf
            @if(isset($datapemilik))
                @method('PUT')
                @else @method('POST')
            @endif
            <div class="px-4 py-5 space-y-4 sm:p-6">
                <label for="nama_pemilik" class="block text-sm text-lg text-black font-bold">
                    Nama Pemilik
                </label>
                <div class="rounded">
                    <input type="text" value="{{(isset($datapemilik))?$datapemilik->nama_pemilik:old('nama_pemilik')}}" name="nama_pemilik" id="nama_pemilik" placeholder="Masukan Nama Pemilik" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <label for="jns_kelamin" class="block text-sm text-lg text-black font-bold">
                    Jenis Kelamin
                </label>
                <select class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df" name="jns_kelamin" id="jns_kelamin">
                    <option value="{{(isset($datapemilik))?$datapemilik->jns_kelamin:old('jns_kelamin')}}">{{(isset($datapemilik))?$datapemilik->jns_kelamin:old('jns_kelamin')}}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label for="tmpt_lhr" class="block text-sm text-lg text-black font-bold">
                    Tempat Lahir
                </label>
                <div class="rounded">
                    <input type="text" value="{{(isset($datapemilik))?$datapemilik->tmpt_lhr:old('tmpt_lhr')}}" name="tmpt_lhr" id="tmpt_lhr" placeholder="Masukan Tempat Lahir" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <label for="tgl_lhr" class="block text-sm text-lg text-black font-bold">
                    Tanggal Lahir
                </label>
                <div class="rounded">
                    <input type="date" value="{{(isset($datapemilik))?$datapemilik->tgl_lhr:old('tgl_lhr')}}" name="tgl_lhr" id="tgl_lhr" class="focus:ring-green-500 focus:border-green-500 rounded">
                </div>
                <label for="alamat" class="block text-sm text-lg text-black font-bold">
                    Alamat
                </label>
                <textarea placeholder="Masukan Alamat!" name="alamat" id="alamat" rows="3" cols="50" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">{{(isset($datapemilik))?$datapemilik->alamat:old('alamat')}}</textarea>
                <label for="no_telp" class="block text-sm text-lg text-black font-bold">
                    Nomer Telpon
                </label>
                <div class="rounded">
                    <input type="text" value="{{(isset($datapemilik))?$datapemilik->no_telp:old('no_telp')}}" name="no_telp" id="no_telp" placeholder="Masukan Nomer Telpon! (Hanya Angka)" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <label for="agama" class="block text-sm text-lg text-black font-bold">
                    Tanggal Daftar
                </label>
                <div class="rounded">
                    <input type="date" value="{{(isset($datapemilik))?$datapemilik->tgl_daftar:old('tgl_daftar')}}" name="tgl_daftar" id="tgl_daftar" class="focus:ring-green-500 focus:border-green-500 rounded">
                </div>
                <button type="submit" class="inline-flex justify-center bg-green-500 hover:bg-green-700 text-white py-2 px-5 rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-template-layout>