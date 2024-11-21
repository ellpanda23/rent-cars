@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Automóviles')

@section('content')
<h1 class="mb-3">Lista de Automóviles</h1>

<div class="row justify-content-center">
    <div class="col-md-12">
        <x-car.car-search-bar :route="route('cars.index')" type="index" />

        <a href="{{ route('cars.create') }}" class="btn btn-primary btn-block my-4">Agregar Automóvil</a>

        @if (auth()->user()->name === 'Administrador')
        <a href="{{ route('cars.trash') }}" class="btn btn-warning btn-block my-4">Datos de Automóviles Eliminados</a>
        @endif

        <x-car.car-list :cars="$cars" type="index" />
    </div>
</div>
@endsection

@push('styles')
@include('pages.cars.includes._select2-style')
@endpush

@push('scripts')
@include('pages.cars.includes._select2-script')
@include('pages.cars.includes._jquery-mask-script')
@endpush
