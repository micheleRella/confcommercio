<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use WireUi\Traits\Actions;

class UserIndex extends Component
{
    use Actions;

    protected $listeners = ['deleteDialog'];

    public function render()
    {
        return view('livewire.users.user-index');
    }

    public function delete($id)
    {
        User::find($id)->delete();
        $this->notification()->success(
            $title = 'User deleted',
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
