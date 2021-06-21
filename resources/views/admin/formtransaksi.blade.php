<x-template-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="tl-3xl bg-green-700 p-4 shadow text-2xl text-white font-bold mt-3">
        {{$title}}
    </div>
    <div>
        <form action="{{(isset($transaksi))?route('transaksi.update', $transaksi->id_transaksi):route('transaksi.store')}}" method="POST">
            @csrf
            @if(isset($transaksi))
                @method('PUT')
                @else @method('POST')
            @endif
            <div class="px-4 py-5 space-y-4 sm:p-6">
                <label for="nama_pemilik" class="block text-sm text-lg text-black font-bold">
                    Nama Pemilik
                </label>
                <select id="nama_pemilik" name="nama_pemilik" class="livesearch form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                    <option value="{{(isset($transaksi))?$transaksi->nama_pemilik:old('nama_pemilik')}}">{{(isset($transaksi))?$transaksi->nama_pemilik:old('nama_pemilik')}}</option>
                    @foreach ($datahewan as $itema)
                        <option value="{{$itema->nama_pemilik}}">{{$itema->nama_pemilik}}</option>
                    @endforeach
                </select>
                <label for="nama_hewan" class="block text-sm text-lg text-black font-bold">
                    Nama Hewan
                </label>
                <select id="nama_hewan" name="nama_hewan" class="form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                    <option value="{{(isset($transaksi))?$transaksi->nama_hewan:old('nama_hewan')}}">{{(isset($transaksi))?$transaksi->nama_hewan:old('nama_hewan')}}</option>
                    @foreach ($datahewan as $hewan)
                        <option value="{{$hewan->nama_hewan}}">{{$hewan->nama_hewan}}</option>
                    @endforeach
                </select>
                <label for="jns_hewan" class="block text-sm text-lg text-black font-bold">
                    Jenis Hewan
                </label>
                <select id="jns_hewan" name="jns_hewan" class="form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                    <option value="{{(isset($transaksi))?$transaksi->jns_hewan:old('jns_hewan')}}">{{(isset($transaksi))?$transaksi->jns_hewan:old('jns_hewan')}}</option>
                    @foreach ($jenishewan as $jnshewan)
                        <option value="{{$jnshewan->jns_hewan}}">{{$jnshewan->jns_hewan}}</option>
                    @endforeach
                </select>
                <label for="keluhan" class="block text-sm text-lg text-black font-bold">
                    Keluhan
                </label>
                <input type="text" value="{{(isset($transaksi))?$transaksi->keluhan:old('keluhan')}}" id="keluhan" name="keluhan" class="form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df" placeholder="Masukan Keluhan!">
                <label for="tindakan" class="block text-sm text-lg text-black font-bold">
                    Tindakan
                </label>
                    <select id="tindakan" name="tindakan" class="form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                        <option value="{{(isset($transaksi))?$transaksi->tindakan:old('tindakan')}}">{{(isset($transaksi))?$transaksi->tindakan:old('tindakan')}}</option>
                        @foreach ($tindakan as $tindakans)
                            <option value="{{$tindakans->tindakan}}">{{$tindakans->tindakan}}</option>
                        @endforeach
                    </select>  
                <label for="tgl_berkunjung" class="block text-sm text-lg text-black font-bold">
                    Tanggal Berkunjung
                </label>
                <div class="rounded">
                    <input type="datetime-local" value="{{(isset($transaksi))?$transaksi->tgl_berkunjung:old('tgl_berkunjung')}}" name="tgl_berkunjung" id="tgl_berkunjung" class="focus:ring-green-500 focus:border-green-500">
                </div>
                <label for="dokter" class="block text-sm text-lg text-black font-bold">
                    Nama Dokter
                </label>
                <select id="nama_dokter" name="nama_dokter" class="form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                    <option value="{{(isset($transaksi))?$transaksi->nama_dokter:old('nama_dokter')}}">{{(isset($transaksi))?$transaksi->nama_dokter:old('nama_dokter')}}</option>
                    @foreach($datadokter as $itemb)
                        <option value="{{$itemb->nama_dokter}}">{{$itemb->nama_dokter}}</option>
                    @endforeach
                </select>
                <label for="harga" class="block text-sm text-lg text-black font-bold">
                    Harga
                </label>
                <input type="text" value="{{(isset($transaksi))?$transaksi->harga:old('harga')}}" id="harga" name="harga" class="form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df" placeholder="Masukan Harga (Hanya Angka)!">
                <button type="submit" class="inline-flex justify-center bg-green-500 hover:bg-green-700 text-white py-2 px-5 rounded">
                    Submit
                </button>
            </div>
        </form>
    </div>
    <script>
        $('#nama_pemilik').select2({
            width: '100%',
            placeholder: "Pilih Nama Pemilik",
            allowClear: true
        });
     </script>
</x-template-layout>