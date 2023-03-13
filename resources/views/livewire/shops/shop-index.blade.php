<div>
    <div class="container mx-auto">
        <h1 class=" text-xl font-bold mt-8 mb-8">Gestione Negozi</h1>
        <div class="mt-8 mb-8 flex w-full">
            <div class="lg:w-1/2 mt-16">
                <a href="{{route('shop.create')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create new shop</a>
            </div>
            <div class="lg:w-1/2 mt-16">
                <x-card class="flex justify-center flex-col">
                    <h2 class=" text-lg font-bold mb-8">Import with csv</h2>
                    <form action="{{route('shop.import')}}" method="post" enctype="multipart/form-data">
                        @csrf
                        <input type="file" name="file">
                        <button class="px-4 py-2 bg-sky-400 text-white rounded-md">Invia</button>
                    </form>
                </x-card>
            </div>
        </div>
        @livewire('shop-table')
        
    </div>
</div>
