@extends('layouts.main')

@section('content')
    <a class="btn btn-primary float-end" href="/lokasi/create" role="button"><i class="bi bi-geo-alt"></i> Tambah Lokasi</a>
    <h1 class="h3 mb-4">Data Lokasi</h1>
   

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Lokasi</th>
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($lokasis as $lokasi)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $lokasi->nama_lokasi }}</td>
                                        <td>{!! $lokasi->deskripsi !!}</td>
                                        <td>  
                                            <a href="/lokasi/{{ $lokasi->id }}/edit" class="btn btn-warning  mb-2"><i class="bi bi-pencil-fill"></i></a>
                                            <form id="{{ $lokasi->id }}" action="/lokasi/{{ $lokasi->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger mb-2 swal-confirm" data-form="{{ $lokasi->id }}"><i class="bi bi-trash-fill"></i></div>
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
