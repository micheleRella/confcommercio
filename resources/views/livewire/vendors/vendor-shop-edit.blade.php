<div>
    <form action="" wire:submit.prevent="update({{$shop->id}})" method="post">
    @csrf
        <div class="container mx-auto my-16">
            <div class="w-4/5 mx-auto">
                <h1 class="text-xl font-bold">Update shop</h1>
                <hr class="my-8">
                
                <x-card>
                    <x-input class="mb-8" wire:model="shop.title" label="Title" placeholder="Insert title" />
                    <x-textarea class="mb-8"  wire:model="shop.description" label="Description" placeholder="Insert description" />
                    <x-input class="mb-8" wire:model="shop.address" label="Address" placeholder="Insert address" />
                    <x-input class="mb-8" wire:model="shop.phone" label="Phone" placeholder="Insert phone" />
                    <x-input class="mb-8" wire:model="shop.email" label="Email" placeholder="Insert email" suffix="@mail.com" />
                    <x-input class="mb-8" wire:model="shop.vat_number" label="Vat number" placeholder="Insert vat_number" />
                    <x-input class="mb-8" wire:model="shop.lat" label="Latitude" placeholder="Insert lat" />
                    <x-input class="mb-8" wire:model="shop.long" label="Longitude" placeholder="Insert long" />
                    

                    <button class="bg-sky-400 text-white px-4 py-2 mt-6">Invia</button>
                </x-card>
            </div>
        </div>
    </form>
</div>
