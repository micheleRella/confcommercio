<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\City;
use App\Models\Shop;
use WireUi\Traits\Actions;

class VendorShopEdit extends Component
{
    
    use Actions;

    public $shop, $cities, $city_id;
    public $updateMode = false;

    protected $rules = [
        'shop.title' => 'required',
        'shop.description' => 'required',
        'shop.address' => 'required',
        'shop.phone' => 'required',
        'shop.email' => 'nullable',
        'shop.vat_number' => 'nullable',
        'shop.lat' => 'nullable',
        'shop.long' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.vendors.vendor-shop-edit');
    }

    public function mount($shop)
    {
        $this->shop = $shop;
        $this->cities = City::all();
    }
    
    public function update()
    {
        $validatedDate = $this->validate([
            'shop.title' => 'required',
            'shop.description' => 'required',
            'shop.address' => 'required',
            'shop.phone' => 'required',
            'shop.email' => 'nullable',
            'shop.vat_number' => 'nullable',
            'shop.lat' => 'nullable',
            'shop.long' => 'nullable',
        ]);
  
        $post = $this->shop;
        $post->update($validatedDate);
  
        $this->notification()->success(
            $title = 'Shop updated',
            $description = 'Done'
        );
    }

    public function showDialog(): void
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Update the information?',
            'acceptLabel' => 'Yes, update it',
            'method'      => 'update',
            'params'      => 'Saved',
        ]);

        
    }
}
