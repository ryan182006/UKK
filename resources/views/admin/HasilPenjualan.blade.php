<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PDF</title>
    <style>
        table,
        th,
        td {
            border: 1px solid;
            text-align: center;
        }

        table tbody tr td ul {
            list-style: none;
        }
    </style>
</head>

<body style="padding: 20px;">
    <h1 style="text-align: center;">Vfresh</h1>
    <h2 style="text-align: center; color: #813c3c;">Total Penjualan Sayuran</h2>
    <h4 style="text-align: center;">{{ $start }} - {{ $akhir }}</h4>
    <table style="width: 100%; ">
        <thead>
            <th style="padding: 10px; background-color: skyblue;">No.</th>
            <th style="padding: 10px; background-color: skyblue;">Tanggal</th>
            <th style="padding: 10px; background-color: skyblue;">Nama Penerima</th>
            <th style="padding: 10px; background-color: skyblue;">Alamat</th>
            <th style="padding: 10px; background-color: skyblue;">Total Harga</th>
        </thead>
        <tbody>
            @foreach ($penjualans as $penjualan)
                <tr>
                    <td style="padding: 5px;">{{ $loop->iteration }}</td>
                    <td style="padding: 5px;">
                        {{ \Carbon\Carbon::createFromFormat('Y-m-d H:i:s', $penjualan->created_at)->format('Y-m-d') }}
                    </td>
                    <td style="padding: 5px;">{{ $penjualan->alamat->nama_penerima }}</td>
                    <td style="padding: 5px;">{{ $penjualan->alamat->alamat }}</td>
                    <td style="padding: 5px;">Rp. {{ number_format($penjualan->total) }}</td>
                </tr>
            @endforeach
        </tbody>
        <tfoot>
            <td colspan="4" style="padding: 10px;">Total Penjualan</td>
            <td style="padding: 10px;">Rp. {{ number_format($total) }}</td>
        </tfoot>
    </table>
</body>

</html>
