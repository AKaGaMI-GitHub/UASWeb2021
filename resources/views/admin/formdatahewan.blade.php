<x-template-layout>
    <x-slot name="header">
        {{ __('Dashboard') }}
    </x-slot>
    <div class="tl-3xl bg-green-700 p-4 shadow text-2xl text-white font-bold mt-3">
        {{$title}}
    </div>
    <div>
        <form action="{{(isset($datahewan))?route('datahewan.update', $datahewan->id_hewan):route('datahewan.store')}}" method="POST">
            @csrf
            @if(isset($datahewan))
                @method('PUT')
                @else @method('POST')
            @endif
            <div class="px-4 py-5 space-y-4 sm:p-6">
                <label for="nama_hewan" class="block text-sm text-lg text-black font-bold">
                    Nama Hewan
                </label>
                <div>
                    <input type="text" value="{{(isset($datahewan))?$datahewan->nama_hewan:old('nama_hewan')}}" name="nama_hewan" id="nama_hewan" placeholder="Masukan Nama Hewan!" class="@error('nama_hewan') border-red-600 @enderror focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full">
                </div>
                <label for="jns_hewan" class="block text-sm text-lg text-black font-bold">
                    Jenis Hewan
                </label>
                <div>
                    <select name="jns_hewan" id="jns_hewan" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                    <option value="{{(isset($datahewan))?$datahewan->jns_hewan:old('jns_hewan')}}">{{(isset($datahewan))?$datahewan->jns_hewan:old('jns_hewan')}}</option>
                    @foreach ($jenishewan as $items) 
                        <option value="{{$items->jns_hewan}}">{{$items->jns_hewan}}</option>
                    @endforeach
                    </select>
                </div>
                <label for="jns_kelamin" class="block text-sm text-lg text-black font-bold">
                    Jenis Kelamin 
                </label>
                <div>
                    <select id="jns_kelamin" name="jns_kelamin" class="focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                        <option value="{{(isset($datahewan))?$datahewan->jns_kelamin:old('jns_kelamin')}}">{{(isset($datahewan))?$datahewan->jns_kelamin:old('jns_kelamin')}}</option>
                        <option value="Jantan">Jantan</option>
                        <option value="Betina">Betina</option>
                    </select>
                </div>
                <label for="tgl_lhr" class="block text-sm text-lg text-black font-bold">
                    Tanggal Lahir
                </label>
                <div class="rounded">
                    <input type="date" value="{{(isset($datahewan))?$datahewan->tgl_lhr:old('tgl_lhr')}}" name="tgl_lhr" id="tgl_lhr" class="focus:ring-green-500 focus:border-green-500 rounded">
                </div>
                <label for="nama_pemilik" class="block text-lg text-black font-bold">
                    Nama Pemilik
                </label>
                <select id="nama_pemilik" name="nama_pemilik" class="livesearch form-control focus:ring-green-500 focus:border-green-500 rounded flex-1 block w-full df">
                    <option value="{{(isset($datahewan))?$datahewan->nama_pemilik:old('nama_pemilik')}}">{{(isset($datahewan))?$datahewan->nama_pemilik:old('nama_pemilik')}}</option>
                    @foreach ($datapemilik as $item)
                        <option value="{{$item->nama_pemilik}}">{{$item->nama_pemilik}}</option>
                    @endforeach
                </select>
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
