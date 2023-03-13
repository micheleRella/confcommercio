<div>
    <form action="" wire:submit.prevent="update({{$user->id}})" method="post">
    @csrf
        <div class="container mx-auto my-16">
            <div class="w-4/5 mx-auto">
                <h1 class="text-xl font-bold">Update user</h1>
                <hr class="my-8">
                <div class="mb-8">
                    <a href="{{route('user.index')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md mb-8">Go to user index</a>
                </div>
                <x-card>
                    <x-input class="mb-8" wire:model="user.name" label="Name" placeholder="Insert name" />
                    <x-input type="email" class="mb-8" wire:model="user.email" label="Email" placeholder="Insert email" />


                    <div class="form-group flex flex-col space-y-4 mb-8">
                        <label for="exampleFormControlInput1">Negozio:</label>
                        <select class="rounded-md dark:text-black" name="" id="" class="" wire:model="user.shop_id">
                            <option value="">Select shop</option>
                            @foreach($shops as $shop)
                            <option value="{{$shop->id}}" @if($user->permission == $shop->id) selected @endif>{{$shop->title}}</option>
                            @endforeach
                        </select>
                        @error('long') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group flex flex-col space-y-4 mb-8">
                        <label for="exampleFormControlInput1">Permessi:</label>
                        <select class="rounded-md dark:text-black" name="" id="" class="" wire:model="user.permission">
                            <option value="0" @if($user->permission == 0) selected @endif>Nessun permesso</option>
                            <option value="12" @if($user->permission == 12) selected @endif>Vendor</option>
                        </select>
                        @error('long') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="bg-sky-400 text-white px-4 py-2 mt-6">Invia</button>
                </x-card>
            </div>
        </div>
    </form>
</div>
