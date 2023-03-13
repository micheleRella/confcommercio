<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use WireUi\Traits\Actions;


class EditCities extends Component
{
    use Actions;

    public $city;

    protected $rules = [
        'city.title' => 'required',
        'city.description' => 'required'
    ];

    public function render()
    {
        return view('livewire.cities.edit-cities');
    }

    public function mount($city)
    {
        $this->city = $city;
    }

    public function update($id)
    {
        $city = City::find($id);
        $city->title = $this->city->title;
        $city->description = $this->city->description;
        $city->save();

        $this->notification()->success(
            $title = 'City saved',
            $description = 'Your city was successfully saved'
        );
    }
}
