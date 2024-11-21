<div class="row justify-content-center mb-5">
    <div class="col-md-10">
        <div class="card mt-3">
            <div class="row no-gutters">
                <div class="card-body">
                    <p class="card-text">No. de Factura : {{ $transaction->invoice_number }}</p>
                    <p class="card-text">Cliente : {{ $transaction->customer->name }}</p>
                    <span class="card-text">Tipo de Vehículo :</span>
                    <ul>
                        @foreach ($transaction->cars as $car)
                        <li>{{ $car->name }} {{ $car->color }} {{ $car->years }} {{ $car->plat_number }}</li>
                        @endforeach
                    </ul>
                    <p class="card-text">
                        Fecha de Alquiler : <span class="font-weight-bold">{{ $transaction->start_date_with_day }}</span>
                    </p>
                    <p class="card-text">
                        Fecha de Finalización : <span class="font-weight-bold">{{ $transaction->finish_date_with_day }}</span>
                    </p>
                    @if ($transaction->updated_by)
                    <p class="card-text">
                        Fecha de Devolución : <span class="font-weight-bold">
                            {{ $transaction->return_date_with_day }}</span>
                    </p>
                    @endif
                    <p class="card-text">
                        Estado del Pago : <span class="font-weight-bold price">{{ $transaction->status }}</span>
                    </p>
                    @if ($transaction->total_late && $transaction->updated_by)
                    <p class="card-text">
                        Total de Retraso : <span class="font-weight-bold price">
                            {{ $transaction->total_late }} días
                        </span>
                    </p>
                    <p class="card-text">
                        Total de Multa : <span class="font-weight-bold price">
                            {{ currencyFormat($transaction->penalty_amount) }}</span>
                    </p>
                    @endif
                    <p class="card-text">
                        Total del Precio {{ $transaction->total_late && $transaction->updated_by ? '( + Total de Multa)' : '' }}
                        :
                        <span class="font-weight-bold price">{{ currencyFormat($transaction->total_price)}}</span>
                    </p>
                    <p class="card-text">
                        Monto Pagado : <span class="font-weight-bold price">
                            {{ currencyFormat($transaction->payment_amount) }}</span>
                    </p>
                    <p class="card-text">
                        Estado de la Transacción:
                        <span class="font-weight-bold font-italic {{ $transaction->transaction_status[0] }}">
                            {{ $transaction->transaction_status[1] }}
                        </span>
                    </p>
                </div>
            </div>
            <div class="row my-3">
                <div class="col-md-3 pl-4">
                    <p class="card-text">
                        <small class="text-muted">
                            Creado por : {{ createdUpdatedDeletedBy($transaction->created_by) }}
                        </small>
                    </p>
                </div>
                @if ($transaction->updated_by)
                <div class="col-md-4">
                    <p class="card-text">
                        <small class="text-muted">
                            Última modificación por {{ createdUpdatedDeletedBy($transaction->updated_by) }},
                            {{ ' ' . $transaction->updated_at->diffForHumans() }}
                        </small>
                    </p>
                </div>
                @endif
                @if ($type === 'trash')
                <div class="col-md-4 text-right">
                    <p class="card-text">
                        <small class="text-muted">
                            Eliminado por : {{ createdUpdatedDeletedBy($transaction->deleted_by) }}
                        </small>
                    </p>
                </div>
                @endif
            </div>
        </div>
    </div>
</div>
