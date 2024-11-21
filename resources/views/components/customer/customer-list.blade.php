<div class="table-responsive">
    <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">Nombre</th>
                <th scope="col">Correo electrónico</th>
                <th scope="col">Teléfono</th>
                <th scope="col">Dirección</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($customers as $customer)
            <tr>
                <th scope="row">{{ $customers->currentPage() * 10 - 10 + $loop->iteration }}</th>
                <td>{{ $customer->name }}</td>
                <td>{{ $customer->email ?: '-' }}</td>
                <td>{{ $customer->phone }}</td>
                <td>{{ $customer->address }}</td>
                <td>
                    @if ($type === 'index')
                    <a href="{{ route('customers.show', $customer) }}" class="btn btn-success btn-sm my-1">Detalle</a>
                    <a href="{{ route('customers.edit', $customer) }}" class="btn btn-warning btn-sm my-1">Editar</a>
                    @else
                    <a href="{{ route('customers.trash.detail', $customer->phone) }}"
                        class="btn btn-success btn-sm my-1">Detalle</a>
                    <a href="{{ route('customers.restore', $customer->phone) }}" class="btn btn-warning btn-sm my-1"
                        onclick="return confirm('¿Estás seguro de que quieres restaurar el cliente {{ $customer->name }}?')">Restaurar</a>
                    @endif
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#deletecustomer{{ $customer->phone }}modal">
                        {{ $type === 'index' ? 'Eliminar' : 'Eliminar permanentemente' }}
                    </a>
                </td>

                <!-- Modal de eliminación -->
                <div class="modal fade" id="deletecustomer{{ $customer->phone }}modal" tabindex="-1" role="dialog"
                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Eliminar cliente {{ $type === 'trash' ? ' permanentemente' : '' }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    ¿Estás seguro de que quieres eliminar al cliente {{ $type === 'trash' ? ' de forma permanente'
                                    : '' }}
                                    <strong>{{ $customer->name }}</strong>?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <form
                                    action="{{ $type === 'index' ? route('customers.destroy', $customer) : route('customers.force-delete', $customer->phone) }}"
                                    method="post" id="myfr">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-danger" id="btnfr">Enviar</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </tr>
            @empty
            <tr>
                <td colspan="6">
                    <p class="font-weight-bold text-center text-monospace">
                        Los datos del cliente {{ $type === 'trash' ? 'eliminados' : '' }} no están disponibles
                    </p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Enlaces de paginación --}}
    <div class="mt-4">
        {{ $customers->withQueryString()->onEachSide(2)->links() }}
    </div>
</div>
