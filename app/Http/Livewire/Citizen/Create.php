<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use Livewire\WithFileUploads;
use App\Services\CitizenService;
use App\Http\Requests\CitizenRequest;

class Create extends Component
{
    use WithFileUploads;

    public $citizen, $photo, $ktp, $photo_with_ktp;

    public $is_edit = false;

    public function store()
    {
        $this->validate(CitizenRequest::rules());

        CitizenService::store($this->citizen, $this->photo, $this->ktp, $this->photo_with_ktp);

        session()->flash('message', "Data {$this->citizen['name']} ({$this->citizen['nik']}) Berhasil Ditambahkan");

        return redirect('citizen');
    }

    public function render()
    {
        return view('livewire.citizen.create');
    }
}
