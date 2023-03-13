<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShopDelete extends Component
{
    use Actions;
    
    public $shop;
    public function render()
    {
        return view('livewire.shops.shop-delete');
    }

    public function mount($shop)
    {
        $this->shop = $shop;
    }

    public function deleteDialog()
    {
        $this->dialog()->confirm([
            'title'       => 'Are you Sure?',
            'description' => 'Save the information?',
            'icon'        => 'question',
            'accept'      => [
                'label'  => 'Yes, delete it',
                'method' => 'test',
            ],
            'reject' => [
                'label'  => 'No, cancel',
                'method' => 'cancel',
            ],
        ]);
    }

    public function test()
    {
        Shop::find($this->shop)->delete();
        $this->notification()->success(
            $title = 'Shop deleted',
        );
        
    }
    public function cancel()
    {
        return;
    }
}