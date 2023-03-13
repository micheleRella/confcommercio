<?php

namespace App\Http\Livewire;

use App\Models\City;
use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShopEdit extends Component
{
    use Actions;

    public $shop, $title, $description, $cities, $users, $address, $phone, $city_id, $user_id, $vat_number, $lat, $long, $email;

    protected $rules = [
        'shop.title' => 'required',
        'shop.description' => 'required',
        'shop.address' => 'required',
        'shop.phone' => 'required',
        'shop.email' => 'nullable',
        'shop.vat_number' => 'nullable',
        'shop.lat' => 'nullable',
        'shop.long' => 'nullable',
        'shop.user_id' => 'nullable',
        'shop.city_id' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.shops.shop-edit');
    }

    public function mount($shop)
    {
        $this->cities = City::all();
        $this->users = User::all();
        $this->shop = $shop;
    }

    public function update($id)
    {
        $shop = Shop::find($id);
        $shop->title = $this->shop->title;
        $shop->description = $this->shop->description;
        $shop->email = $this->shop->email;
        $shop->address = $this->shop->address;
        $shop->phone = $this->shop->phone;
        $shop->vat_number = $this->shop->vat_number;
        $shop->lat = $this->shop->lat;
        $shop->long = $this->shop->long;
        $shop->user_id = $this->shop->user_id;
        $shop->city_id = $this->shop->city_id;
        $shop->save();

        $this->notification()->success(
            $title = 'Shop saved',
            $description = 'Your shop was successfully saved'
        );
    }
}
