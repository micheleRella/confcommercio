<div>
    <form action="" wire:submit.prevent="store" method="post">
    @csrf
        <div class="container mx-auto my-16">
            <div class="w-4/5 mx-auto">
                <h1 class="text-xl font-bold">Create shop</h1>
                <hr class="my-8">
                <div class="mb-8">
                    <a href="{{route('shop.index')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md mb-8">Go to shop index</a>
                </div>
                <x-card>
                    <x-input class="mb-8" wire:model="title" label="Title" placeholder="Insert title" />
                    <x-textarea class="mb-8"  wire:model="description" label="Description" placeholder="Insert description" />
                    <x-input class="mb-8" wire:model="address" label="Address" placeholder="Insert address" />
                    <button wire:click.prevent="coordinate" class="px-4 py-2 bg-red-400 text-white mb-8">Calcola coordinate</button>
                    <x-input class="mb-8" wire:model="phone" label="Phone" placeholder="Insert phone" />
                    <x-input class="mb-8" wire:model="email" label="Email" placeholder="Insert email" suffix="@mail.com" />
                    <x-input class="mb-8" wire:model="vat_number" label="Vat number" placeholder="Insert vat_number" />
                    <x-input class="mb-8" wire:model="lat" label="Latitude" placeholder="Insert lat" />
                    <x-input class="mb-8" wire:model="long" label="Longitude" placeholder="Insert long" />
                    <div class="form-group flex flex-col space-y-4 mb-8">
                        <label for="exampleFormControlInput1">Comune:</label>
                        <select class="rounded-md border-black-400 px-4 py-2 border-2 text-black" name="" id="" class="" wire:model="city_id">
                            <option value="">Select city</option>
                            @foreach($cities as $city)
                            <option value="{{$city->id}}">{{$city->title}}</option>
                            @endforeach
                        </select>
                        @error('long') <span class="text-danger">{{ $message }}</span>@enderror
                    </div>
                    <div class="form-group flex flex-col space-y-4 mb-8">
                        <label for="exampleFormControlInput1">Utente:</label>
                        <select class="rounded-md border-black-400 px-4 py-2 border-2 text-black" name="" id="" class="" wire:model="user_id">
                            <option value="">Select user</option>
                            @foreach($users as $user)
                            <option value="{{$user->id}}">{{$user->name}}</option>
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
