@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Detalles de la Transacción')

@section('content')
<div class="row">
    <div class="col-md-6 text-left">
        <h1>Detalles de la Transacción</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('transactions.index') }}" class="btn btn-dark">Regresar</a>
    </div>
</div>

<x-transaction.transaction-detail :transaction="$transaction" type="show" />
@endsection
