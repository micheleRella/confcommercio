
@extends('layouts.app')
@section('content')
<div >
    @livewire('vendor-shop-edit', ['shop' => $shop], key($shop->id))
</div>
@endsection