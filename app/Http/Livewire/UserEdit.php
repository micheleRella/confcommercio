<?php

namespace App\Http\Livewire;

use App\Models\Shop;
use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class UserEdit extends Component
{
    use Actions;

    public $user, $shops;

    protected $rules = [
        'user.name' => 'required',
        'user.email' => 'required',
        'user.permission' => 'nullable',
        'user.shop_id' => 'nullable'
    ];

    public function render()
    {
        return view('livewire.users.user-edit');
    }

    public function mount($user)
    {
        $this->user = $user;
        $this->shops = Shop::all();
    }

    public function update($id)
    {
        $user = User::find($id);
        $user->name = $this->user->name;
        $user->email = $this->user->email;
        $user->permission = $this->user->permission;
        $user->shop_id = $this->user->shop_id;
        $user->save();

        $this->notification()->success(
            $title = 'User saved',
            $description = 'Your user was successfully saved'
        );
    }
}
