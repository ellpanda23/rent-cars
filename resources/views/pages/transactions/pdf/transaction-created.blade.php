<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    @include('pages.transactions.includes._bootstrap-4-styles')
    <title>Nota de Transacción</title>
</head>

<body class="py-3">
    <h1 class="text-center">NOTA DE TRANSACCIÓN</h1>
    <h5 class="text-center">No. de Factura : {{ $transaction->invoice_number }}</h5>

    <div class="row justify-content-center mt-5">
        <div class="col-md-8">
            <div class="table-responsive">
                <table class="table">
                    <tr>
                        <th scope="row" class="text-left">Nombre del Cliente</th>
                        <td class="pl-5">{{ $transaction->customer->name }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">Detalles del Vehículo</th>
                        <td>
                            <ul>
                                @foreach ($transaction->cars as $car)
                                <li>
                                    {{ $car->name }} {{ $car->color }} {{ $car->years }} {{ $car->plat_number }}
                                </li>
                                @endforeach
                            </ul>
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">Fecha de Alquiler</th>
                        <td class="pl-5">{{ $transaction->start_date_with_day }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">Fecha de Finalización</th>
                        <td class="pl-5">{{ $transaction->finish_date_with_day }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">Estado del Pago</th>
                        <td class="pl-5 font-weight-bold">
                            {{ $transaction->status !== 'COMPLETED' ? 'Anticipo' : 'PAGADO' }}
                        </td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">Precio Total</th>
                        <td class="pl-5">{{ currencyFormat($transaction->total_price) }}</td>
                    </tr>
                    <tr>
                        <th scope="row" class="text-left">Monto del Anticipo</th>
                        <td class="pl-5">{{ currencyFormat($transaction->payment_amount) }}</td>
                    </tr>
                </table>

                <p class="font-weight-bold" style="margin-top: 75px;">Responsable</p>
                <br>
                <p class="font-weight-bold mt-5">{{ createdUpdatedDeletedBy($transaction->created_by) }}</p>
            </div>
        </div>
    </div>

    @include('pages.transactions.includes._bootstrap-4-scripts')
</body>

</html>
