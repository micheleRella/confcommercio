<div>
    <form action="" wire:submit.prevent="store" method="post">
    @csrf
        <div class="container mx-auto my-16">
            <div class="w-4/5 mx-auto">
                <h1 class="text-xl font-bold">Create user</h1>
                <hr class="my-8">
                <div class="mb-8">
                    <a href="{{route('user.index')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md mb-8">Go to user index</a>
                </div>
                <x-card>
                    <x-input class="mb-8" wire:model="name" label="Name" placeholder="Insert name" />
                    <x-input type="email" class="mb-8" wire:model="email" label="Email" placeholder="Insert email" />
                    <x-inputs.password label="Password" class="mb-8" wire:model="password"/>


                    <div class="form-group flex flex-col space-y-4">
                        <label for="exampleFormControlInput1">Negozio:</label>
                        <select class="rounded-md dark:text-black" name="" id="" class="" wire:model="shop_id">
                            <option value="">Select shop</option>
                            @foreach($shops as $shop)
                            <option value="{{$shop->id}}">{{$shop->title}}</option>
                            @endforeach
                        </select>
                        @error('long') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <button class="bg-sky-400 text-white px-4 py-2 mt-6">Invia</button>
                </x-card>
            </div>
        </div>
    </form>
</div>
