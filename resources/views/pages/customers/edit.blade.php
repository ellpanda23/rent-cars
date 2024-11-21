@extends('layouts.sb-admin-2.master')

@section('title', 'Página de Editar Cliente')

@section('content')
<h1>Editar Cliente</h1>

<x-customer.customer-form :route="route('customers.update', $customer)" :customer="$customer" type="update" />
@endsection
