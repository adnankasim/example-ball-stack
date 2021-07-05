<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use App\Models\Citizen;
use Illuminate\Support\Str;
use App\Services\CitizenService;

class Detail extends Component
{
    public $citizen, $photo, $ktp, $photo_with_ktp;

    public function mount(Citizen $citizen)
    {
        if(isset($citizen->files)){
            $this->photo = $citizen->files->filter(function ($q) {
                return Str::startsWith($q['original_name'], 'photo_profile_');
            })->first();
            $this->ktp = $citizen->files->filter(function ($q) {
                return Str::startsWith($q['original_name'], 'ktp_');
            })->first();
            $this->photo_with_ktp = $citizen->files->filter(function ($q) {
                return Str::startsWith($q['original_name'], 'photo_with_ktp_');
            })->first();
        }
    }

    public function render()
    {
        if(!($this->citizen->user->validated_at)) session()->flash('warning', "Data '{$this->citizen->full_name}' belum divalidasi!");
        else session()->forget('warning');

        return view('livewire.citizen.detail');
    }

    public function destroy($id = null)
    {
        $citizen = CitizenService::destroy($id);

        session()->flash('message', "Data {$citizen->full_name} berhasil dihapus!");

        return redirect('citizen');
    }

    public function validation($id = null)
    {
        $citizen = CitizenService::validation($id);

        session()->flash('message', "Data {$citizen->full_name} berhasil divalidasi!");

        return redirect("citizen/{$citizen->id}");
    }

    public function activation($id = null)
    {
        $citizen = CitizenService::activation($id);

        $message = $citizen->user->is_active ? "Nonaktifkan!" : "Aktifkan!";

        session()->flash('message', "User {$citizen->full_name} berhasil di {$message}");

        return redirect("citizen/{$citizen->id}");
    }

}
