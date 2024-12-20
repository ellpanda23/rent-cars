@extends('layouts.sb-admin-2.master')

@section('title', 'Página Editar Perfil')

@section('content')
<h1>Editar Perfil</h1>

<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card mt-4">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-header">Formulario Editar Perfil</h5>
                </div>
                <div class="col-2">
                    <a href="{{ route('dashboard') }}"
                        class="btn btn-outline-primary btn-sm float-right my-2 mr-3">Volver</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('profiles.update') }}" method="POST" enctype="multipart/form-data" id="myfr">
                    @csrf
                    @method('patch')

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ old('name', $user->name) }}" {{ auth()->user()->name === 'Administrator'
                        ? ' readonly' : '' }}>
                        @error('name')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo Electrónico</label>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" value="{{ old('email', $user->email) }}">
                        @error('email')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone"
                            id="phone" value="{{ old('phone', $user->phone) }}">
                        @error('phone')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address">{{ old('address', $user->address) }}</textarea>
                        @error('address')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5 my-auto mx-auto text-center">
                                <label class="float-left">Foto de perfil actual</label>
                                <img src="{{ $user->getAvatar() }}" class="rounded-circle img-thumbnail img-fluid"
                                    alt="perfil del usuario">
                            </div>
                            <div class="col-sm-7 my-auto mx-auto">
                                <label for="image">Cambiar foto de perfil</label>
                                <input id="image" name="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ old('image') }}">
                                @error('image')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary btn-block mt-4" id="btnfr">Editar</button>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
