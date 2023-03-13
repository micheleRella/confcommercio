<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class UserCreate extends Component
{
    use Actions;
    
    public $user, $email, $password, $shop_id, $shops, $name, $permission;
 
    public function mount()
    {
        $this->shops = Shop::all();
    }

    protected $rules = [
        'name' => 'required',
        'email' => 'required',
        'password' => 'required',
        'shop_id' => 'nullable',
    ];

    public function render()
    {
        return view('livewire.users.user-create');
    }

    public function store()
    {
        $validatedData = $this->validate();
        $validatedData['permission'] = '12';
        User::create($validatedData);
        redirect()->route('user.index');
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
