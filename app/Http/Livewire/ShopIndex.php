<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use Livewire\Component;
use WireUi\Traits\Actions;

class ShopIndex extends Component
{
    use Actions;

    protected $listeners = ['deleteDialog'];

    public function render()
    {
        return view('livewire.shops.shop-index');
    }

    public function delete($id)
    {
        Shop::find($id)->delete();
        $this->notification()->success(
            $title = 'Shop deleted',
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
