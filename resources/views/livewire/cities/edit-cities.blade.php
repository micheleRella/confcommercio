<div>
    <form action="" wire:submit.prevent="update({{$city->id}})" method="post">
    @csrf
        <div class="container mx-auto my-16">
            <div class="w-4/5 mx-auto">
                <h1 class="text-xl font-bold">Update city</h1>
                <hr class="my-8">
                <x-card>
                    <x-input class="mb-8" wire:model="city.title" label="Title" placeholder="Insert title" />
                    <x-textarea  wire:model="city.description" label="Description" placeholder="Insert description" />
                    <button class="bg-sky-400 text-white px-4 py-2 mt-6">Invia</button>
                </x-card>
            </div>
        </div>
    </form>
</div>
