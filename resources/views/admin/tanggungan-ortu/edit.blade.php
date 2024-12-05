@extends('layouts.app')
@section('content-dashboard')
    @livewire('tanggungan.edit', ['id' => $id], key($id))
@endsection
