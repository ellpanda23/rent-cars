<div class="table-responsive {{ $type === 'trash' ? ' mt-4' : '' }}">
    <table class="table table-hover table-bordered text-center">
        <thead class="thead-dark">
            <tr>
                <th scope="col">No.</th>
                <th scope="col">No. de Factura</th>
                <th scope="col">Cliente</th>
                <th scope="col">Estado de la Transacción</th>
                <th scope="col">Acción</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($transactions as $transaction)
            <tr>
                <th scope="row">{{ $transactions->currentPage() * 10 - 10 + $loop->iteration }}</th>
                <td>{{ $transaction->invoice_number }}</td>
                <td>{{ $transaction->customer->name }}</td>
                <td class="font-weight-bold font-italic {{ $transaction->transaction_status[0] }}">
                    {{ $transaction->transaction_status[1] }}
                </td>
                <td>
                    @if ($type === 'index')
                    <a href="{{ route('transactions.show',  $transaction) }}"
                        class="btn btn-secondary btn-sm my-1">Detalle</a>
                    @can('update', $transaction)
                    <a href="{{ route('transactions.edit', $transaction) }}"
                        class="btn btn-warning btn-sm my-1">Editar</a>
                    @endcan
                    @else
                    <a href="{{ route('transactions.trash.show', $transaction->invoice_number) }}"
                        class="btn btn-secondary btn-sm my-1">Detalle</a>
                    <a href="{{ route('transactions.restore', $transaction->invoice_number) }}"
                        class="btn btn-warning btn-sm my-1"
                        onclick="return confirm('¿Estás seguro de que deseas restaurar la transacción del cliente {{ $transaction->customer->name }}?')">Restaurar</a>
                    @endif
                    @can('delete', $transaction)
                    <a href="#" class="btn btn-danger btn-sm" data-toggle="modal"
                        data-target="#deletecar{{ $transaction->invoice_number }}modal">Eliminar</a>
                    @endcan
                    @if ($transaction->updated_by)
                    <a href="{{ route('transactions.print-pdf', [$transaction, true]) }}"
                        class="btn btn-success btn-sm my-1" target="_blank">Imprimir</a>
                    @else
                    <a href="{{ route('transactions.print-pdf', $transaction) }}"
                        class="btn btn-facebook btn-sm my-1 ml-1" target="_blank">Imprimir</a>
                    @endif
                </td>

                <!-- Modal de Eliminación -->
                <div class="modal fade" id="deletecar{{ $transaction->invoice_number }}modal" tabindex="-1"
                    role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">
                                    Eliminar transacción {{ $type === 'trash' ? 'permanente' : '' }}
                                </h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Cerrar">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                <p>
                                    ¿Estás seguro de que deseas eliminar la transacción del cliente <strong>
                                        {{ $transaction->customer->name }}</strong>
                                    {{ $type === 'trash' ? ' de forma permanente' : '' }} ?
                                </p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cerrar</button>
                                <form
                                    action="{{ $type === 'index' ? route('transactions.destroy', $transaction) : route('transactions.force-delete', $transaction->invoice_number) }}"
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
                <td colspan="8">
                    <p class="font-weight-bold text-center text-monospace">
                        Los datos de la transacción {{ $type === 'trash' ? ' eliminados ' : '' }} están vacíos
                    </p>
                </td>
            </tr>
            @endforelse
        </tbody>
    </table>

    {{-- Enlaces de Paginación --}}
    <div class="mt-4">
        {{ $transactions->withQueryString()->onEachSide(2)->links() }}
    </div>
</div>
