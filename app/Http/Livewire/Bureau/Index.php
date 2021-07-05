<?php

namespace App\Http\Livewire\Bureau;

use Livewire\Component;
use Livewire\WithPagination;
use App\Services\BureauService;

class Index extends Component
{
use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $search = '', $page = 1;

    protected $queryString = [
        'search' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function searching()
    {
        $this->render();
    }

    public function render()
    {
        $bureaus = BureauService::getLatest($this->search);

        return view('livewire.bureau.index', [
            'total' => $bureaus->count(),
            'bureaus' => $bureaus->paginate(10),
        ]);
    }

    public function destroy($id = null)
    {
        $bureau = BureauService::destroy($id);

        session()->flash('message', "Data {$bureau->name} ({$bureau->short_name}) berhasil dihapus!");
    }

}
