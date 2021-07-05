<?php

namespace App\Http\Livewire\Citizen;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\Citizen;
use App\Services\CitizenService;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';

    public $name = '';
    public $is_validated = '';
    public $is_active = '';

    public $page = 1;

    protected $queryString = [
        'name' => ['except' => ''],
        'is_validated' => ['except' => ''],
        'is_active' => ['except' => ''],
        'page' => ['except' => 1],
    ];

    public function searching()
    {
        $this->render();
    }

    public function render()
    {
        $not_validated = Citizen::whereHas('user', function ($query) {
            $query->whereNull('validated_at');
        })->count();
        if ($not_validated) {
            session()->flash('warning', "Ada {$not_validated} data yang belum divalidasi!");
        }

        $citizens = CitizenService::getLatest($this->name, $this->is_active, $this->is_validated);

        return view('livewire.citizen.index', [
            'total' => $citizens->count(),
            'citizens' => $citizens->paginate(10),
        ]);
    }

    public function destroy($id = null)
    {
        $citizen = CitizenService::destroy($id);

        session()->flash('message', "Data {$citizen->full_name} berhasil dihapus!");
    }

    public function validation($id = null)
    {
        $citizen = CitizenService::validation($id);

        session()->flash('message', "Data {$citizen->full_name} berhasil divalidasi!");

        return redirect("citizen");
    }

    public function activation($id = null)
    {
        $citizen = CitizenService::activation($id);

        session()->flash('message', "User {$citizen->full_name} berhasil di Aktivasi!");

        return redirect("citizen");
    }

}
