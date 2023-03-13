
@extends('layouts.app')
@section('content')
<div>
    @livewire('shop-edit', ['shop' => $shop])
</div>
@endsection