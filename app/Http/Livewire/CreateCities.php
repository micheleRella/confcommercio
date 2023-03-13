<?php

namespace App\Http\Livewire;

use App\Models\City;
use Livewire\Component;
use WireUi\Traits\Actions;

class CreateCities extends Component
{
    use Actions;
    
    public $city;
    public $title;
    public $description;
 
    public function mount()
    {
        
    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
    ];

    public function render()
    {
        return view('livewire.cities.create-cities');
    }

    public function store()
    {
        $validatedData = $this->validate();
        City::create($validatedData);
        redirect()->route('city.index');
    }

    public function save(): void
    {
        
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'acceptLabel' => 'Yes, save it',
            'method'      => 'save',
            'params'      => 'Saved',
        ]);
    }
}
