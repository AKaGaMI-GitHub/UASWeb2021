<x-template-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="tl-3xl bg-green-700 p-4 shadow text-2xl text-white font-bold mt-3">
        {{$title}}
    </div>
    <div>
        <div class="col-span-6 p-3">
            <a href="{{route('transaksi.create')}}"><button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-3 rounded">+ Tambah Data</button></a>
        </div>
        <table class="w-full p-5 mt-2">
            <thead>
                <tr class="font-bold text-center text-black">
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Nama Hewan</th>
                    <th>Jenis Hewan</th>
                    <th>Keluhan</th>
                    <th>Tindakan</th>
                    <th>Tanggal Berkunjung</th>
                    <th>Nama Dokter</th>
                    <th>Harga</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @if (!empty($data) && $data->count())
                @foreach ($data as $transaksi => $item)
                <tr class="text-center text-black">
                    <td>{{$no}}</td>
                    <td>{{$item->nama_pemilik}}</td>
                    <td>{{$item->nama_hewan}}</td>
                    <td>{{$item->jns_hewan}}</td>
                    <td>{{$item->keluhan}}</td>
                    <td>{{$item->tindakan}}</td>
                    <td>{{$item->tgl_berkunjung}}</td>
                    <td>{{$item->nama_dokter}}</td>
                    <td>Rp. {{$item->harga}}</td>
                    <td>
                        <form action="{{route('transaksi.destroy',$item->id_transaksi)}}" method="POST">
                            <a href="{{route('transaksi.edit',$item->id_transaksi)}}" class="bg-yellow-400 py-1 px-4 hover:bg-yellow-600 rounded text-white font-bold">Edit</a>
                            <input type="submit" value="Delete" class="bg-red-600 hover:bg-red-800 text-white font-bold py-1 px-4 rounded"></input>
                            @csrf
                            @method('DELETE') 
                        </form>
                    </td>
                </tr>
                <?php $no++ ;?>
                @endforeach
                @else
                    <tr>
                        <td><h2>Tidak ada data!</h2></td>
                    </tr>
                @endif
            </tbody>
        </table>
    </div>
</x-template-layout>