@extends('layouts.app')
@section('content-dashboard')
    @livewire('penghasilan-ortu.edit', ['id' => $id], key($id))
@endsection
