<div class="row justify-content-center mb-5">
    <div class="col-md-8">
        <div class="card mt-3">
            <div class="row">
                <div class="col-10">
                    <h5 class="card-header">Formulario {{ $type === 'create' ? ' Añadir' : ' Editar' }} Coche</h5>
                </div>
                <div class="col-2">
                    <a href="{{ route('cars.index', ['status' => 'AVAILABLE']) }}"
                        class="btn btn-outline-primary btn-sm float-right my-2 mr-3">Volver</a>
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
                            id="name" value="{{ $type === 'create' ? old('name') : old('name', $car->name) }}">
                        @error('name')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="merk">Marca</label>
                        <input class="form-control @error('merk') is-invalid @enderror" type="text" name="merk"
                            id="merk" value="{{ $type === 'create' ? old('merk') : old('merk', $car->merk) }}">
                        @error('merk')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="years">Año</label>
                        <input class="form-control @error('years') is-invalid @enderror" type="number" name="years"
                            id="years" value="{{ $type === 'create' ? old('years') : old('years', $car->years) }}">
                        @error('years')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="plat_number">Número de matrícula</label>
                        <input class="form-control @error('plat_number') is-invalid @enderror" type="text"
                            name="plat_number" id="plat_number"
                            value="{{ $type === 'create' ? old('plat_number') : old('plat_number', $car->plat_number) }}">
                        @error('plat_number')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="color">Color</label>
                        <input class="form-control @error('color') is-invalid @enderror" type="text" name="color"
                            id="color" value="{{ $type === 'create' ? old('color') : old('color', $car->color) }}">
                        @error('color')
                        <small class="fw-bold invalid-feedback">{{ $message }}</small>
                        @enderror
                    </div>
                    <div class="form-group">
                        <label for="price">Precio</label>
                        <div class="input-group mb-3">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="inputGroup-sizing-default">Rp.</span>
                            </div>
                            <input type="text" class="form-control @error('price') is-invalid @enderror price"
                                name="price" aria-label="Sizing example input"
                                aria-describedby="inputGroup-sizing-default"
                                value="{{ $type === 'create' ? old('price') : old('price', $car->price) }}">
                            @error('price')
                            <small class="fw-bold invalid-feedback">{{ $message }}</small>
                            @enderror
                        </div>
                    </div>
                    @if ($type === 'create')
                    <div class="form-group">
                        <label for="image">Foto del coche</label>
                        <small class="ml-2">(*opcional)</small>
                        <input id="image" name="image" type="file"
                            class="form-control @error('image') is-invalid @enderror" value="{{ old('image') }}">
                        @error('image')
                        <small class="fw-bold text-danger">{{ $message }}</small>
                        @enderror
                    </div>
                    @else
                    <div class="form-group">
                        <div class="row">
                            <div class="col-sm-5 my-auto mx-auto text-center">
                                <label class="float-left">Foto del coche actual</label>
                                <img src="{{ $car->getImage() }}" class="rounded-circle img-thumbnail img-fluid"
                                    alt="imagen del coche" width="225" height="225">
                            </div>
                            <div class="col-sm-7 my-auto mx-auto">
                                <label for="image">Cambiar foto del coche</label>
                                <small class="ml-2">(*opcional)</small>
                                <input id="image" name="image" type="file"
                                    class="form-control @error('image') is-invalid @enderror"
                                    value="{{ old('image') }}">
                                @error('image')
                                <small class="fw-bold text-danger">{{ $message }}</small>
                                @enderror
                            </div>
                        </div>
                    </div>
                    @endif

                    <button type="submit" class="btn btn-primary btn-block mt-4" id="btnfr">
                        {{ $type === 'create' ? 'Añadir' : 'Editar' }}
                    </button>
                </form>
            </div>
        </div>
    </div>
</div>
