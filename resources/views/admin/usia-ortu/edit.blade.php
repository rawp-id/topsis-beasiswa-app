@extends('layouts.app')
@section('content-dashboard')
    @livewire('usia-ortu.edit', ['id' => $id], key($id))
@endsection
