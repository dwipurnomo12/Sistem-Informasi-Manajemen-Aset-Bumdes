<!DOCTYPE html>
<html>
<head>
    <title>Label Barang</title>
    <style>

        /* style untuk tabel */
        table {
            width: 100%;
            border-collapse: collapse;
        }

        th, td {
            /* padding: 5px; */
            border: 1px solid black;
            /* text-align: left; */
        }

        th {
            /* width: 100px; */
        }

    </style>
</head>
<body>
    <table>
        <tr> 
            <td rowspan="4"><img src="data:image/png;base64,{{ $logoInstansi }}" alt="Logo Instansi" style="width: 150px; height: 150px; text-align:center;"></td>
            <th>Kode Barang</th>
            <td>{{ $barang->kode_barang }}</td>
            <td rowspan="4"><img src="data:image/png;base64,{{$qrCode}}" style="width: 150px; height: 150px; text-align:center;"></td>
        </tr>
        <tr>
            <th>Lokasi</th>
            <td>{{ $barang->lokasi->nama_lokasi }}</td>
        </tr>
        <tr>
            <th>Tanggal Penambahan </th>
            <td>{{ $barang->tanggal }}</td>
        </tr>
        <tr>
            <th>Bumdes</th>
            <td>Mitra Sehati Karangmulyo</td>
        </tr>
    </table>
    
</body>
</html>
