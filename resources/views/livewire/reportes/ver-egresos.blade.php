<div>

    <table class="table">
        <thead>
            <tr>
                <th>Nombre</th>
                <th>Monto</th>
                <th>Fecha</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($movimientos as $movimiento)

                @if($movimiento->tipo == 0)

                    <tr>
                        <td>{{ $movimiento->nombre }}</td>
                        <td>${{ $movimiento->monto }}</td>
                        <td>{{ $movimiento->fecha }}</td>
                    </tr>

                @endif

            @endforeach
        </tbody>
    </table>

    {{$movimientos->links()}}
</div>
