@extends('layouts.sb-admin-2.master')

@section('title', 'Página del Tablero')

@section('content')
    <div class="container-fluid">

        <!-- Encabezado de la Página -->
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <h1 class="h3 mb-0 text-gray-800">Tablero</h1>
        </div>

        <!-- Fila de Contenido -->
        <div class="row justify-content-around">

            <div class="col-xl-4 col-md-4">
                <div class="row">
                    <!-- Tarjeta de Clientes -->
                    <div class="col-12 mb-3 mb-lg-5 mb-md-5">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <a href="{{ route('customers.index') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                                Clientes
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ countOfAllCustomers() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-user fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>

                    <!-- Tarjeta de Automóviles -->
                    <div class="col-12 mt-lg-4 mt-md-4">
                        <div class="card border-left-success shadow h-100 py-2">
                            <a href="{{ route('cars.index') }}" class="text-decoration-none">
                                <div class="card-body">
                                    <div class="row no-gutters align-items-center">
                                        <div class="col mr-2">
                                            <div class="text-xs font-weight-bold text-success text-uppercase mb-1">
                                                Automóviles
                                            </div>
                                            <div class="h5 mb-0 font-weight-bold text-gray-800">{{ countOfAllCars() }}
                                            </div>
                                        </div>
                                        <div class="col-auto">
                                            <i class="fas fa-car fa-3x"></i>
                                        </div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-xl-6 col-md-6">
                <!-- Tarjeta de Detalles de Transacciones -->
                <div class="card shadow mb-4">
                    <div class="card-header py-3">
                        <h6 class="m-0 font-weight-bold text-primary">Estado de las Transacciones</h6>
                    </div>
                    <div class="card-body">
                        <a href="{{ route('transactions.index', ['status' => '>']) }}"
                           class="text-decoration-none text-dark">
                            <h4 class="small font-weight-bold mb-4">Transacciones EN CURSO
                                <span class="float-right">{{ countOfTransactionStatus('>') }}</span>
                            </h4>
                        </a>
                        <a href="{{ route('transactions.index', ['status' => '<']) }}"
                           class="text-decoration-none text-dark">
                            <h4 class="small font-weight-bold mb-4">Transacciones ATRASADAS
                                <span class="float-right">{{ countOfTransactionStatus('<') }}</span>
                            </h4>
                        </a>
                        <a href="{{ route('transactions.index', ['status' => 'COMPLETED']) }}"
                           class="text-decoration-none text-dark">
                            <h4 class="small font-weight-bold mb-4">Transacciones COMPLETADAS
                                <span class="float-right">{{ countOfTransactionStatus('COMPLETED') }}</span>
                            </h4>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
