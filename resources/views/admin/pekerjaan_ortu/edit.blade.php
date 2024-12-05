@extends('layouts.app')
@section('content-dashboard')
    @livewire('pekerjaan-ortu.edit', ['id' => $id], key($id))
@endsection
