@extends('layouts.app')
@section('content-dashboard')
    {{-- @dd($id) --}}
    @livewire('kriteria.edit', ['id' => $id], key($id))
@endsection
