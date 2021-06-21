<?php

namespace App\Http\Livewire;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Datadokter;

class DatadokterLW extends Component
{
    use WithPagination;

    public $searchTerm;

    public function render()
    {
        $searchTerm = '%'.$this->searchTerm. '%';
        $datadokterlw = Datadokter::where('nama_dokter','LIKE',$searchTerm)
            ->orWhere('jns_kelamin','LIKE',$searchTerm)
            ->orWhere('tmpt_lhr','LIKE',$searchTerm)
            ->orWhere('agama','LIKE',$searchTerm)
            ->orWhere('status','LIKE',$searchTerm)
            ->orderBy('id_dokter','DESC')->paginate(5);
        return view('admin.datadokter', ['datadokters'=>$datadokterlw]);
    }
}
