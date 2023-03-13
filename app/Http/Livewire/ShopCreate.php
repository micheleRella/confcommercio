<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShopCreate extends Component
{
    use Actions;
    
    public $shop, $title, $description, $cities, $users, $address, $phone, $city_id, $user_id, $vat_number, $lat, $long, $email;
 
    public function mount()
    {
        $this->cities = City::all();
        $this->users = User::all();
;    }

    protected $rules = [
        'title' => 'required',
        'description' => 'required',
        'address' => 'required',
        'phone' => 'required',
        'email' => 'nullable',
        'city_id' => 'nullable',
        'user_id' => 'nullable',
        'vat_number' => 'nullable',
        'lat' => 'nullable',
        'long' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.shops.shop-create');
    }

    public function store()
    {
        $validatedData = $this->validate();
        Shop::create($validatedData);
        redirect()->route('shop.index');
    }

    public function save(): void
    {
        
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'acceptLabel' => 'Yes, save it',
            'method'      => 'store',
            'params'      => 'Saved',
        ]);
    }

    public function coordinate()
    {
        $geocode = app('geocoder')->geocode($this->address)->get();
        $lat = $geocode[0]->getCoordinates()->getLatitude();
        $long = $geocode[0]->getCoordinates()->getLongitude();
        $this->lat = $lat;
        $this->long = $long;
    }
}
