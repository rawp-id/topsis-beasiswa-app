@extends('layouts.app')
@section('content-dashboard')
    {{-- @dd($id) --}}
    @livewire('nilai.edit', ['id' => $id], key($id))
@endsection
