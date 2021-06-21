<x-template-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="tl-3xl bg-green-700 p-4 shadow text-2xl text-white font-bold mt-3">
        {{$title}}
    </div>
    <div>
        <div class="col-span-6 p-3">
            <a href="{{route('datapemilik.create')}}"><button class="bg-green-700 hover:bg-green-800 text-white font-bold py-2 px-3 rounded">+ Tambah Data</button></a>
        </div>
        <table class="w-full p-5 mt-2">
            <thead>
                <tr class="font-bold text-center text-black">
                    <th>No</th>
                    <th>Nama Pemilik</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Alamat</th>
                    <th>No Telphone</th>
                    <th>Tanggal Daftar</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                <?php $no = 1; ?>
                @if (!empty($data) && $data->count())
                @foreach ($data as $datapemilik => $item)
                <tr class="text-center text-black">
                    <td>{{$no}}</td>
                    <td>{{$item->nama_pemilik}}</td>
                    <td>{{$item->jns_kelamin}}</td>
                    <td>{{$item->tmpt_lhr}}, {{$item->tgl_lhr}}</td>
                    <td>{{$item->alamat}}</td>
                    <td>{{$item->no_telp}}</td>
                    <td>{{$item->tgl_daftar}}</td>
                    <td>
                        <form action="{{route('datapemilik.destroy',$item->id_pemilik)}}" method="POST">
                            <a href="{{route('datapemilik.edit',$item->id_pemilik)}}" class="bg-yellow-400 py-1 px-4 hover:bg-yellow-600 rounded text-white font-bold">Edit</a>
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
        <div class="p-4">
            {!! $data->links() !!}
        </div>
    </div>
</x-template-layout>