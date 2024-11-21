@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Agregar Cliente')

@section('content')
<h1>Agregar Cliente</h1>

<x-customer.customer-form :route="route('customers.store')" :customer="null" type="create" />
@endsection
