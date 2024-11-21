@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Detalle de Cliente')

@section('content')
<div class="row">
    <div class="col-md-6 text-left">
        <h1>Detalle del Cliente Eliminado</h1>

    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('customers.trash') }}" class="btn btn-dark">Volver</a>
    </div>
</div>

<x-customer.customer-detail :customer="$customer" type="trash" />
@endsection
