<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-header">Formulario {{ $type === 'create' ? ' Agregar' : ' Editar' }} Cliente</h5>
                </div>
                <div class="col-2">
                    <a href="{{ route('customers.index') }}"
                        class="btn btn-outline-primary btn-sm float-right my-2 mr-3">Regresar</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ $route }}" method="POST" enctype="multipart/form-data" id="myfr">
                    @csrf

                    @if ($type === 'update')
                    @method('PATCH')
                    @endif

                    <div class="form-group">
                        <label for="name">Nombre</label>
                        <input class="form-control @error('name') is-invalid @enderror" type="text" name="name"
                            id="name" value="{{ $type === 'create' ? old('name') : old('name', $customer->name) }}">
                        @error('name')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="nik">NIK</label>
                        <input class="form-control @error('nik') is-invalid @enderror" type="text" name="nik" id="nik"
                            value="{{ $type === 'create' ? old('nik') : old('nik', $customer->nik) }}">
                        @error('nik')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="phone">Teléfono</label>
                        <input class="form-control @error('phone') is-invalid @enderror" type="text" name="phone"
                            id="phone" value="{{ $type === 'create' ? old('phone') : old('phone', $customer->phone) }}">
                        @error('phone')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="email">Correo electrónico</label>
                        <small class="ml-2">(*opcional)</small>
                        <input class="form-control @error('email') is-invalid @enderror" type="email" name="email"
                            id="email" value="{{ $type === 'create' ? old('email') : old('email', $customer->email) }}">
                        @error('email')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="address">Dirección</label>
                        <textarea class="form-control @error('address') is-invalid @enderror" name="address"
                            id="address">{{ $type === 'create' ? old('address') : old('address', $customer->address) }}</textarea>
                        @error('address')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    @if ($type === 'create')
                    <div class="form-group">
                        <label for="image">Foto de Perfil del Cliente</label>
                        <small class="ml-2">(*opcional)</small>
                        <input id="image" name="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                        @error('image')
                        <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @else
                    <div class="row">
                        <div class="col-sm-5 my-auto mx-auto text-center">
                            <label class="float-left">Foto de Perfil del Cliente Actual</label>
                            <img src="{{ $customer->getAvatar() }}" class="rounded-circle img-thumbnail img-fluid"
                                alt="perfil del cliente">
                        </div>
                        <div class="col-sm-7 my-auto mx-auto">
                            <label for="image">Cambiar Foto de Perfil</label>
                            <small class="ml-2">(*opcional)</small>
                            <input id="image" name="image" type="file"
                                class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                            @error('image')
                            <small class="fw-bold text-danger">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-block mt-4" id="btnfr">
                        {{ $type === 'create' ? 'Agregar' : 'Actualizar' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
