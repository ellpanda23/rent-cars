@extends('layouts.sb-admin-2.master')

@section('title', 'Página para Agregar Automóvil')

@section('content')
<h1>Agregar Automóvil</h1>

<x-car.car-form :route="route('cars.store')" :car="null" type="create" />
@endsection

@push('scripts')
@include('pages.cars.includes._jquery-mask-script')
@endpush
