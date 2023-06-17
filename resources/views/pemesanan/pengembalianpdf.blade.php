<!DOCTYPE html>
<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
    <style>
        /* Gaya CSS untuk PDF */
        body {
            font-family: Arial, sans-serif;
        }
        h1 {
            font-size: 18px;
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
        }
        th, td {
            padding: 8px;
            text-align: left;
            border-bottom: 1px solid #ddd;
        }
    </style>
</head>
<body>
    <h1>Nota Pemesanan</h1>

    <table>
        <thead>
            <tr>
                <th>No.</th>
                <th>Kode Pemesanan</th>
                <th>Atas Nama</th>
                <th>List Barang</th>
                <th>Tanggal Selesai</th>
                <th>Tanggal Kembali</th>
                <th>Total Denda</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($kode_pemesanan_data as $key => $item)
                <tr>
                    <td>{{ $key + 1 }}</td>
                    <td>{{ $item->kode_pemesanan }}</td>
                    <td>{{ $item->user_name }}</td>
                    <td>
                        @foreach ($pemesanan as $barang)
                            @if ($barang->kode_pemesanan === $item->kode_pemesanan)
                                <ul>
                                    <li>
                                        Nama Barang: {{ $barang->nama }}
                                        <br>
                                        Jumlah Barang: {{ $barang->jumlah_pesanan }}
                                    </li>
                                </ul>
                            @endif
                        @endforeach
                    </td>
                    <td>{{ $item->tanggal_selesai }}</td>
                    <td>{{ $item->tanggal_kembali }}</td>
                    <td>{{ $item->total_denda }}</td>
                   
                </tr>
            @endforeach
        </tbody>
    </table>
</body>
</html>
