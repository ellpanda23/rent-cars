<div class="row justify-content-center mb-5">
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="row no-gutters">
                <div class="col-4 my-auto mx-auto text-center">
                    <img src="{{ $car->getImage() }}" class="rounded-circle img-thumbnail img-fluid" alt="perfil del coche">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <p class="card-text">Nombre : {{ $car->name }}</p>
                                <p class="card-text">Marca : {{ $car->merk }}</p>
                                <p class="card-text">Año : {{ $car->years }}</p>
                                <p class="card-text">
                                    Número de matrícula : <span class="font-weight-bold">{{ $car->plat_number }}</span>
                                </p>
                            </div>
                            <div class="col-md-6">
                                <p class="card-text">Color : {{ $car->years }}</p>
                                <p class="card-text">
                                    Precio : <span class="font-weight-bold price">{{ currencyFormat($car->price) }}</span>
                                </p>
                                <p class="card-text">
                                    Estado :
                                    <span class="font-weight-bold font-italic{{ $car->status == 'AVAILABLE' ? ' text-primary' : ' text-success' }}">{{
                                        $car->status }}
                                    </span>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3 pl-4">
                    <p class="card-text">
                        <small class="text-muted">
                            Creado por : {{ createdUpdatedDeletedBy($car->created_by) }}
                        </small>
                    </p>
                </div>
                @if ($car->updated_by)
                <div class="col-md-4">
                    <p class="card-text">
                        <small class="text-muted">
                            Última modificación por {{ createdUpdatedDeletedBy($car->updated_by) }},
                            {{ ' ' . $car->updated_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
                @endif
                @if ($type === 'trash')
                <div class="col-md-4 text-right">
                    <p class="card-text">
                        <small class="text-muted">
                            Eliminado por : {{ createdUpdatedDeletedBy($car->deleted_by) }}
                        </small>
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
