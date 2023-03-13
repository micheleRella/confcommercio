<div>
    <form action="" wire:submit.prevent="store" method="post">
    @csrf
        <div class="container mx-auto my-16">
            <div class="w-4/5 mx-auto">
                <h1 class="text-xl font-bold">Create city</h1>
                <hr class="my-8">
                <div class="mb-8">
                    <a href="{{route('city.index')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md mb-8">Go to city index</a>
                </div>
                <x-card>
                    <x-input class="mb-8" wire:model="title" label="Title" placeholder="Insert title" />
                    <x-textarea  wire:model="description" label="Description" placeholder="Insert description" />
                    <button class="bg-sky-400 text-white px-4 py-2 mt-6">Invia</button>
                </x-card>
            </div>
        </div>
    </form>
</div>
