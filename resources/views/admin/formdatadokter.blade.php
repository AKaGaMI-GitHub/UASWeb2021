<x-template-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="tl-3xl bg-green-700 p-4 shadow text-2xl text-white font-bold mt-3">
        {{$title}}
    </div>
    <div>
        <form action="{{(isset($datadokter))?route('datadokter.update', $datadokter->id_dokter):route('datadokter.store')}}" method="POST">
            @csrf
            @if(isset($datadokter))
                @method('PUT')
                @else @method('POST')
            @endif
            <div class="px-4 py-5 space-y-4 sm:p-6">
                <label for="nama_dokter" class="block text-sm text-lg text-black font-bold">
                    Nama Dokter
                </label>
                <div class="rounded">
                    <input type="text" value="{{(isset($datadokter))?$datadokter->nama_dokter:old('nama_dokter')}}" name="nama_dokter" id="nama_dokter" placeholder="Masukan Nama Dokter" class="@error('nama_dokter') border-red-600 @enderror focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <div class="text-xs text-red-500"> @error('nama_dokter') {{$message}} @enderror</div>
                <label for="tmpt_lhr" class="block text-sm text-lg text-black font-bold">
                    Tempat Lahir
                </label>
                <div class="rounded">
                    <input type="text" value="{{(isset($datadokter))?$datadokter->tmpt_lhr:old('tmpt_lhr')}}" name="tmpt_lhr" id="tmpt_lhr" placeholder="Masukan Tempat Lahir" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <label for="tgl_lhr" class="block text-sm text-lg text-black font-bold">
                    Tanggal Lahir
                </label>
                <div class="rounded">
                    <input type="date" value="{{(isset($datadokter))?$datadokter->tgl_lhr:old('tgl_lhr')}}" name="tgl_lhr" id="tgl_lhr" class="focus:ring-green-500 focus:border-green-500 rounded">
                </div>
                <label for="jns_kelamin" class="block text-sm text-lg text-black font-bold">
                    Jenis Kelamin
                </label>
                <select class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full" name="jns_kelamin" id="jns_kelamin">
                    <option value="{{(isset($datadokter))?$datadokter->jns_kelamin:old('jns_kelamin')}}">{{(isset($datadokter))?$datadokter->jns_kelamin:old('jns_kelamin')}}</option>
                    <option value="Laki-Laki">Laki-Laki</option>
                    <option value="Perempuan">Perempuan</option>
                </select>
                <label for="alamat" class="block text-sm text-lg text-black font-bold">
                    Alamat
                </label>
                <textarea placeholder="Masukan Alamat!" name="alamat" id="alamat" rows="3" cols="50" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">{{(isset($datadokter))?$datadokter->alamat:old('alamat')}}</textarea>
                <label for="no_telp" class="block text-sm text-lg text-black font-bold">
                    Nomer Telpon
                </label>
                <div class="rounded">
                    <input type="text" value="{{(isset($datadokter))?$datadokter->no_telp:old('no_telp')}}" name="no_telp" id="no_telp" placeholder="Masukan Nomer Telpon! (Hanya Angka)" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <label for="agama" class="block text-sm text-lg text-black font-bold">
                    Agama
                </label>
                <select class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full" name="agama" id="agama">
                    <option value="{{(isset($datadokter))?$datadokter->agama:old('agama')}}">{{(isset($datadokter))?$datadokter->agama:old('agama')}}</option>
                    <option value="Islam">Islam</option>
                    <option value="Hindu">Hindu</option>
                    <option value="Buddha">Buddha</option>
                    <option value="Protestan">Protestan</option>
                    <option value="Katholik">Katholik</option>
                    <option value="Kong Hu Cu">Kong Hu Cu</option>
                </select>
                <label for="status" class="block text-sm text-lg text-black font-bold">
                    Status Kerja
                </label>
                <select class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full" name="status" id="status">
                    <option value="{{(isset($datadokter))?$datadokter->status:old('status')}}">{{(isset($datadokter))?$datadokter->status:old('status')}}</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Cuti">Cuti</option>
                    <option value="Tidak Aktif">Tidak Aktif</option>
                </select>
                <button type="submit" class="inline-flex justify-center bg-green-500 hover:bg-green-700 text-white py-2 px-5 rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
</x-template-layout>