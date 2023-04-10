<!DOCTYPE html>
<html>
<head>


	<title>Laporan Keuangan</title>
    <style>
		.container {
			margin: 0 auto;
			width: 100%;
			max-width: 800px;
			font-family: Arial, sans-serif;
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
			font-weight: bold;
		}
		.header h1 {
			margin: 0;
			font-size: 24px;
		}
		.header p {
			margin: 0;
			font-size: 14px;
		}
		.card {
			border: 1px solid #ccc;
			padding: 20px;
			margin-bottom: 20px;
		}
		.card-header {
			margin-bottom: 10px;
			font-weight: bold;
			font-size: 18px;
		}
		.badge {
			font-size: 14px;
			padding: 5px 10px;
			border-radius: 5px;
			font-weight: bold;
			text-transform: capitalize;
		}
		.bg-warning {
			background-color: #ffc107;
			color: #000;
		}
		.bg-success {
			background-color: #28a745;
			color: #fff;
		}
		.bg-danger {
			background-color: #dc3545;
			color: #fff;
		}
		.table {
			margin-bottom: 20px;
			border-collapse: collapse;
			width: 100%;
			font-size: 14px;
		}
		.table th, .table td {
			border: 1px solid #ccc;
			padding: 10px;
			text-align: center;
		}
		.table th {
			background-color: #f1f1f1;
			font-weight: bold;
			text-transform: capitalize;
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

		<h2 style="text-align: center"> Pengadaan Barang </h2>
        <div class="row">
            <div class="col">
                <div class="card" style="text-align: center">
                    <div class="card-header d-flex">
                        <h1>{{ $pengadaan->nama_pengadaan }}</h1>
                    </div>
                    <div class="card-body">
                      <table style="width:100%">
                        <tr>
                            <td><b>Status</b></td>
                            <td>:</td>
                            <td>
                              @if ($status->status == 'pending')
                                <span class="badge bg-warning text-dark">{{ $status->status }}</span>
                              @elseif ($status->status == 'disetujui')
                                <span class="badge bg-success">{{ $status->status }}</span>
                              @else
                                <span class="badge bg-danger">{{ $status->status }}</span>
                              @endif
                            </td>
                        </tr>
                        <tr>
                            <td><b>Tanggal Pengajuan</b></td>
                            <td>:</td>
                            <td>{{ $pengadaan->tanggal_pengajuan }}</td>
                        </tr>
                        <tr>
                            <td><b>Quantity</b></td>
                            <td>:</td>
                            <td>{{ $pengadaan->quantity }}</td>
                        </tr>
                        <tr>
                            <td><b>Lokasi</b></td>
                            <td>:</td>
                            <td>{{ $pengadaan->lokasi->nama_lokasi}}</td>
                        </tr>
                        <tr>
                            <td><b>Deskripsi</b></td>
                            <td>:</td>
                            <td><br>{!! $pengadaan->deskripsi !!}</td>
                        </tr>
                        <tr>
                            <td><b>Catatan</b></td>
                            <td>:</td>
                            <td>{!! $status->catatan !!}</td>
                      </tr>
                    </table>
                </div>
            </div>
        </div>
	</div>
</body>
</html>
