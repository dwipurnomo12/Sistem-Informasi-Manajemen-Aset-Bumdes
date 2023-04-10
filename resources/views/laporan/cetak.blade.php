<!DOCTYPE html>
<html>
<head>
	<title>Laporan Keuangan</title>
	<style>
		.container {
			margin: 0 auto;
			width: 100%;
			max-width: 800px;
		}
		.logo {
			float: left;
			width: 100px;
			height: 100px;
			margin-right: 20px;
		}
		.header {
			text-align: center;
			margin-bottom: 25px;
		}
		.header h1, .header p {
			margin: 0;
		}
		.table {
			margin-bottom: 50px;
			border-collapse: collapse;
			width: 100%;
		}
		.table th, .table td {
			border: 1px solid #000;
			padding: 10px;
			text-align: center;
		}
		.table th {
			background-color: #ccc;
		}
		.table tfoot td {
			text-align: right;
		}
	</style>
</head>
<body>
	<div class="container">
		<div class="logo">
			<img src="data:image/png;base64,{{ $logoInstansi }}" alt="Logo Instansi" style="width:100px" height="100px">
		</div>
		<div class="header">
			<h1>Badan usaha Milik Desa Mitra Sehati</h1>
			<p>Karangmulyo, RT.01, RW.02. Kec. Purwodadi, Kab. Purworejo</p>
		</div>

		<h3 style="text-align: center">
			@if(auth()->user()->roles === 'kepalausaha')
				<h3 class="h3 mb-4">Laporan Data Aset {{ auth()->user()->lokasi->nama_lokasi }}</h3>
			@else
				<h3 class="h3 mb-4">Laporan Data Aset </h3>
			@endif
		</h3>
		<table class="table">
			<thead>
				<tr>
					<th>No</th>
					<th>Kode Barang</th>
					<th>Nama Barang</th>
                    <th>Tanggal Pembelian</th>
					<th>Kategori</th>
					<th>Lokasi</th>
				</tr>
			</thead>
			<tbody>
                @foreach ($laporans as $laporan)
                <tr>
                    <td>{{ $loop->iteration }}</td>             
                    <td>{{ $laporan->kode_barang }}</td>
                    <td>{{ $laporan->nama }}</td>
                    <td>{{ $laporan->tanggal }}</td>
                    <td>{{ $laporan->kategori->nama }}</td>
                    <td>{{ $laporan->lokasi->nama_lokasi }}</td>
                </tr>  
                @endforeach  
			</tbody>
		</table>
	</div>
</body>
</html>