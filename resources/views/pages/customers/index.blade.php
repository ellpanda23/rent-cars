@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Clientes')

@section('content')
<h1>Datos del Cliente</h1>

<div class="row justify-content-center mt-3">
    <div class="col-md-10">

        <x-customer.customer-search-bar :route="route('customers.index')" />

        <a href="{{ route('customers.create') }}" class="btn btn-primary btn-block mb-4 mt-2">Añadir Cliente</a>

        @if (auth()->user()->name === 'Administrador')
        <a href="{{ route('customers.trash') }}" class="btn btn-warning btn-block my-4">Datos de Clientes Eliminados</a>
        @endif

        <x-customer.customer-list :customers="$customers" type="index" />
    </div>
</div>
@endsection
