@extends('layouts.sb-admin-2.master')

@section('title', 'Página para Editar Automóvil')

@section('content')
<h1>Editar Automóvil</h1>

<x-car.car-form :route="route('cars.update', $car)" :car="$car" type="update" />
@endsection

@push('scripts')
@include('pages.cars.includes._jquery-mask-script')
@endpush
