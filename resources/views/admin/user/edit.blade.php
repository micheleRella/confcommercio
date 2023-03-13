
@extends('layouts.app')
@section('content')
<div>
    @livewire('user-edit', ['user' => $user])
</div>
@endsection