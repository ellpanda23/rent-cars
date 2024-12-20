@extends('layouts.sb-admin-2.master')

@section('title', 'Página Agregar Administrador')

@section('content')
<h1>Agregar Administrador</h1>

<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-header">Formulario para Agregar Administrador</h5>
                </div>
                <div class="col-2">
                    <a href="{{ route('admins.index') }}"
                        class="btn btn-outline-primary btn-sm float-right my-2 mr-3">Volver</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admins.store') }}" method="POST" enctype="multipart/form-data" id="myfr">
                    @csrf

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name') }}">
                        @error('name')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" value="{{ old('email') }}">
                        @error('email')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror" type="text" name="nik" id="nik"
                            value="{{ old('nik') }}">
                        @error('nik')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone"
                            id="phone" value="{{ old('phone') }}">
                        @error('phone')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address">{{ old('address') }}</textarea>
                        @error('address')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="image">Foto de Perfil del Administrador</label>
                        <small class="ml-2">(*opcional)</small>
                        <input id="image" name="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                        @error('image')
                        <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4" id="btnfr">Agregar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
