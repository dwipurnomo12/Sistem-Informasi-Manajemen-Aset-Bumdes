@extends('layouts.main')


@section('content')
    @if(auth()->user()->roles === 'kepalausaha')
        <h1 class="h3 mb-4">Cetak Laporan {{ auth()->user()->lokasi->nama_lokasi }}</h1>
    @else
        <h1 class="h3 mb-4">Cetak Laporan {{ auth()->user()->roles}}</h1>
    @endif
    
    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">

                        <div class="form-group">
                            <form id="cetak-form" method="GET" action="{{ route('cetak') }}" target="_blank" onsubmit="return validateForm()">

                                <div class="row my-3">
                                    <div class="col-md-3">
                                        <label for="tgl-mulai" class="form-label">Tanggal Mulai</label>
                                        <input type="date" id="tgl-mulai" name="tgl_mulai" class="form-control">
                                    </div>
                                    <div class="col-md-3">
                                        <label for="tgl-selesai" class="form-label">Tanggal Selesai</label>
                                        <input type="date" id="tgl-selesai" name="tgl_selesai" class="form-control">
                                    </div>
                                    <div class="col">
                                        <button type="submit" class="btn btn-primary float-end"> <i class="bi bi-printer"></i> Cetak </button>
                                    </div>
                                </div>

                              
                             </form>
                        </div>
                              
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Kategori</th>
                                    <th>Lokasi</th>
                                    <th>Tgl. Upload</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($laporans as $laporan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>             
                                        <td>{{ $laporan->kode_barang }}</td>
                                        <td>{{ $laporan->nama }}</td>
                                        <td>{{ $laporan->kategori->nama }}</td>
                                        <td>{{ $laporan->lokasi->nama_lokasi }}</td>
                                        <td>{{ $laporan->tanggal }}</td>
                                    </tr>  
                                @endforeach                     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        $(document).ready(function() {
            var table = $('#table_id').DataTable({
                "order": [[5, "asc"]]
            });

            $('#tanggal-mulai, #tanggal-selesai').change(function() {
                var tanggalMulai = $('#tanggal-mulai').val();
                var tanggalSelesai = $('#tanggal-selesai').val();
                table.columns(5).search('').draw();
                table.columns(5).search(tanggalMulai + ' - ' + tanggalSelesai).draw();
            });
        });
   </script>
   
   <script>
        function validateForm() {
        var tglMulai = document.getElementById("tgl-mulai").value;
        var tglSelesai = document.getElementById("tgl-selesai").value;

        if (!tglMulai || !tglSelesai) {
            Swal.fire(
                'Ooppss',
                'Harap Masukan Kolom Tanggal Mulai Dan Selesai Terlebih Dahulu',
                'warning'
            )
            return false;
        }
        return true;
    }
   </script>
       
@endsection
