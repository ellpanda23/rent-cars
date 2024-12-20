@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Transacciones')

@section('content')
<h1 class="mb-3">Lista de Transacciones</h1>

<div class="row justify-content-center">
    <div class="col-md-12">

        <x-transaction.transaction-search-bar :route="route('transactions.index')" />

        <a href="{{ route('transactions.create') }}" class="btn btn-primary btn-block my-4">Crear Transacción</a>

        {{-- @if (auth()->user()->name === 'Administrator')
        <a href="{{ route('cars.trash') }}" class="btn btn-warning btn-block my-4">Datos de Coches Eliminados</a>
        @endif --}}

        <x-transaction.transaction-list :transactions="$transactions" type="index" />
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
