@extends('layouts.main')

@section('content')
    <a class="btn btn-primary float-end" href="/pengadaan/create" role="button"><i class="bi bi-hand-index"></i></i> Tambah Pengajuan</a>
    <h1 class="h3 mb-4">Data Pengajuan Pengadaan barang</h1>
   

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Pengajuan</th>
                                    <th>Status</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($pengadaans as $pengadaan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>                      
                                        <td>{{ $pengadaan->nama_pengadaan }}</td>   
                                        <td>
                                            @if ($pengadaan->status == 'pending')
                                                <span class="badge bg-warning text-dark">{{ $pengadaan->status }}</span>
                                            @elseif ($pengadaan->status == 'disetujui')
                                                <span class="badge bg-success">{{ $pengadaan->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $pengadaan->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/pengadaan/{{ $pengadaan->id }}" class="btn btn-success mb-2"><i class="bi bi-eye-fill"></i></a>
                                            <a href="/pengadaan/{{ $pengadaan->id }}/edit" class="btn btn-warning  mb-2"><i class="bi bi-pencil-fill"></i></a>
                                            <form id="{{ $pengadaan->id }}" action="/pengadaan/{{ $pengadaan->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger mb-2 swal-confirm" data-form="{{ $pengadaan->id }}"><i class="bi bi-trash-fill"></i></div>
                                            </form>
                                        </td>
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
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>

@endsection
