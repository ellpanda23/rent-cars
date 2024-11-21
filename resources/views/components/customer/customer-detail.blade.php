<div class="row justify-content-center mb-5">
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="row no-gutters">
                <div class="col-4 my-auto mx-auto text-center">
                    <img src="{{ $customer->getAvatar() }}" class="rounded-circle img-thumbnail img-fluid"
                        alt="perfil del cliente">
                </div>
                <div class="col-8">
                    <div class="card-body">
                        <h3 class="card-title">{{ $customer->name }}</h3>
                        <p class="card-text">NIK : {{ $customer->nik }}</p>
                        <p class="card-text">Teléfono : {{ $customer->phone }}</p>
                        <p class="card-text">Correo electrónico : {{ $customer->email }}</p>
                        <span class="card-text d-block">Dirección :</span>
                        <small class="">{{ $customer->address }}</small>
                    </div>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3 pl-4">
                    <p class="card-text">
                        <small class="text-muted">
                            Creado por : {{ createdUpdatedDeletedBy($customer->created_by) }}
                        </small>
                    </p>
                </div>
                @if ($customer->updated_by)
                <div class="col-md-4">
                    <p class="card-text">
                        <small class="text-muted">
                            Última modificación por {{ createdUpdatedDeletedBy($customer->updated_by) }},
                            {{ ' ' . $customer->updated_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
                @endif
                @if ($type === 'trash')
                <div class="col-md-4 text-right">
                    <p class="card-text">
                        <small class="text-muted">
                            Eliminado por : {{ createdUpdatedDeletedBy($customer->deleted_by) }}
                        </small>
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
