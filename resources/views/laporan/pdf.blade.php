<!DOCTYPE html>
<html lang="en">
<style>
    .center {
        margin-left: auto;
        margin-right: auto;
    }

    table {
        text-align: center;
    }

</style>

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Laporan Pendapatan</title>

    <link rel="stylesheet" href="{{ asset('/AdminLTE-2/bower_components/bootstrap/dist/css/bootstrap.min.css') }}">
</head>

<body>
    <h3>
        <center>Laporan Pendapatan</center>
    </h3>
    <h4>
        <center>
            Tanggal {{ tanggal_indonesia($awal, false) }}
            s/d
            Tanggal {{ tanggal_indonesia($akhir, false) }}
        </center>
    </h4>

    <table border="1" cellspacing="0" cellpadding="5" class="table center">
        <thead>
            <tr>
                <th width="5%">No</th>
                <th>Tanggal</th>
                <th>Penjualan</th>
                <th>Pembelian</th>
                <th>Pengeluaran</th>
                <th>Pendapatan</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($data as $row)
            <tr>
                @foreach ($row as $col)
                <td>{{ $col }}</td>
                @endforeach
            </tr>
            @endforeach
        </tbody>
    </table>
</body>

</html>
