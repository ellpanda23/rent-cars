@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Detalles del Cliente')

@section('content')
<div class="row">
    <div class="col-md-6 text-left">
        <h1>Detalles del Cliente</h1>

    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('customers.index') }}" class="btn btn-dark">Regresar</a>
    </div>
</div>

<x-customer.customer-detail :customer="$customer" type="show" />
@endsection
