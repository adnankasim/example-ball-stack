<?php

namespace App\Http\Livewire\Bureau;

use Livewire\Component;
use App\Models\Bureau;
use App\Services\BureauService;

class Detail extends Component
{
    public Bureau $bureau;

    public function render()
    {
        return view('livewire.bureau.detail');
    }

    public function destroy($id = null)
    {
        $bureau = BureauService::destroy($id);

        session()->flash('message', "Data {$bureau->name} ({$bureau->short_name}) berhasil dihapus!");

        return redirect('bureau');
    }
}
