<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use App\Models\Citizen;
use Livewire\WithFileUploads;
use App\Services\CitizenService;
use App\Http\Requests\CitizenRequest;

class Edit extends Component
{
    use WithFileUploads;

    public Citizen $citizen;
    public $photo, $ktp, $photo_with_ktp;

    public $is_edit = true;

    public function mount(Citizen $citizen)
    {
        $this->rules = CitizenRequest::updateRules();
        $this->citizen['name'] = $citizen->full_name;
        $this->citizen['username'] = $citizen->user->username;
        $this->citizen['phone'] = $citizen->user->phone;
        $this->citizen['email'] = $citizen->user->email;
    }

    public function hydrate()
    {
        $this->rules = CitizenRequest::updateRules();
    }

    public function update()
    {
        $this->validate(CitizenRequest::updateRules());

        CitizenService::update($this->citizen, $this->photo, $this->ktp, $this->photo_with_ktp);

        session()->flash('message', "Data {$this->citizen['name']} ({$this->citizen['id']}) Berhasil Diperbaharui");

        return redirect('citizen');
    }

    public function render()
    {
        return view('livewire.citizen.edit');
    }
}
