@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Detalles del Automóvil Eliminado')

@section('content')
<div class="row">
    <div class="col-md-6 text-left">
        <h1>Detalles del Automóvil Eliminado</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('cars.trash') }}" class="btn btn-dark">Volver</a>
    </div>
</div>

<x-car.car-detail :car="$car" type="trash" />
@endsection

@push('scripts')
@include('pages.cars.includes._jquery-mask-script')
@endpush
