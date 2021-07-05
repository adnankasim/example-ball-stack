<?php

namespace App\Http\Livewire\Bureau;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Http\Requests\BureauRequest;
use App\Services\BureauService;

class Create extends Component
{
    use WithFileUploads;

    public $bureau;

    public $logo;

    public function store()
    {
        $this->validate(BureauRequest::rules());

        BureauService::store($this->bureau, $this->logo);

        session()->flash('message', "Data {$this->bureau['name']} ({$this->bureau['short_name']}) Berhasil Ditambahkan");

        return redirect('bureau');
    }

    public function render()
    {
        return view('livewire.bureau.create');
    }
}
