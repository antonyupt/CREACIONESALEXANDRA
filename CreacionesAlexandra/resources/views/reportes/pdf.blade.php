<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <style>

        body{
            font-family: Arial, sans-serif;
        }

        table{
            width:100%;
            border-collapse: collapse;
        }

        th,td{
            border:1px solid #000;
            padding:8px;
        }

        th{
            background:#eee;
        }

    </style>

</head>
<body>

<h2>
    CREACIONES ALEXANDRA
</h2>

<h3>
    REPORTE DE VENTAS
</h3>

<table>

    <thead>

        <tr>

            <th>ID</th>
            <th>Cliente</th>
            <th>Fecha</th>
            <th>Total</th>

        </tr>

    </thead>

    <tbody>

        @foreach($ventas as $venta)

        <tr>

            <td>{{ $venta->id }}</td>

            <td>
                {{ $venta->cliente->nombre ?? '-' }}
            </td>

            <td>
                {{ $venta->fecha }}
            </td>

            <td>
                S/ {{ number_format($venta->total,2) }}
            </td>

        </tr>

        @endforeach

    </tbody>

</table>

<br>

<h3>
    Total Vendido:
    S/ {{ number_format($totalVentas,2) }}
</h3>

</body>
</html>