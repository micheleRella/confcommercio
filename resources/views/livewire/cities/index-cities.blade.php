<div>
    <div class="container mx-auto">
        <h1 class="mt-16 text-xl font-bold">Gestione Comuni</h1>
        <div class="mt-8 mb-8">
            <a href="{{route('city.create')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create new city</a>
        </div>
        @livewire('city-table')
    </div>
</div>
