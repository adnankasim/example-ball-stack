<?php

namespace App\Http\Livewire\Bureau;

use Livewire\Component;
use App\Models\Bureau;
use Livewire\WithFileUploads;
use App\Http\Requests\BureauRequest;
use App\Services\BureauService;

class Edit extends Component
{
    use WithFileUploads;

    public Bureau $bureau;

    public $logo;

    public function mount()
    {
        $this->rules = BureauRequest::rules();
    }

    public function hydrate()
    {
        $this->rules = BureauRequest::rules();
    }

    public function update()
    {
        $this->validate(BureauRequest::rules());

        $bureau = BureauService::update($this->bureau->id, $this->bureau, $this->logo);

        session()->flash('message', "Data {$bureau->name} ({$bureau->short_name}) Berhasil Diperbaharui");

        return redirect('bureau');
    }

    public function render()
    {
        return view('livewire.bureau.edit');
    }
}
