@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Detalles del Automóvil')

@section('content')
<div class="row">
    <div class="col-md-6 text-left">
        <h1>Detalles del Automóvil</h1>
    </div>
    <div class="col-md-6 text-right">
        <a href="{{ route('cars.index') }}" class="btn btn-dark">Volver</a>
    </div>
</div>

<x-car.car-detail :car="$car" type="show" />
@endsection
