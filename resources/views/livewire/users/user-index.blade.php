<div>
    <div class="container mx-auto">
        <h1 class="mt-16 text-xl font-bold">Gestione Utenti</h1>
        <div class="mt-8 mb-8">
            <a href="{{route('user.create')}}" class="px-4 py-2 bg-blue-600 text-white rounded-md">Create new Vendor</a>
        </div>
        @livewire('user-table')
    </div>
</div>
