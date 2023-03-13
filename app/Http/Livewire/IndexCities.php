<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use WireUi\Traits\Actions;

class IndexCities extends Component
{
    use Actions;

    protected $listeners = ['deleteDialog'];

    public function render()
    {
        return view('livewire.cities.index-cities');
    }

    public function delete($id)
    {
        City::find($id)->delete();
        $this->notification()->success(
            $title = 'City deleted',
        );
        $this->emit('deleted');
    }

    public function deleteDialog($id)
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'acceptLabel' => 'Yes, save it',
            'method'      => 'delete',
            'params'      => $id,
        ]);
    }

}
