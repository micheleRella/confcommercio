
@extends('layouts.app')
@section('content')
<div>
    @livewire('edit-cities', ['city' => $city])
</div>
@endsection