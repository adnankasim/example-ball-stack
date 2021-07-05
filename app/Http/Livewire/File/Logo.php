<?php

namespace App\Http\Livewire\File;

use Livewire\Component;
use App\Models\File;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Storage;
use App\Services\FileService;

class Logo extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public function render()
    {
        $logos = FileService::getLatestLogo();

        return view('livewire.file.logo', [
            'total' => $logos->count(),
            'logos' => $logos->paginate(10)
        ]);
    }

    public function destroy($id = null)
    {
        $file = FileService::destroy($id);

        session()->flash('message', "Data {$file->original_name} berhasil dihapus!");
        return redirect('file/logo');
    }

}
