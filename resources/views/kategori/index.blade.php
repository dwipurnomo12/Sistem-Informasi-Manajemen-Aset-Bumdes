@extends('layouts.main')

@section('content')
    <a class="btn btn-primary float-end" href="/kategori/create" role="button"><i class="bi bi-tags"></i> Tambah Kategori</a>
    <h1 class="h3 mb-4">Data Kategori</h1>
   

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Kategori</th>
                                    <th>Deskripsi</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($kategories as $kategori)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $kategori->nama }}</td>
                                        <td>{!! $kategori->deskripsi !!}</td>
                                        <td>  
                                            <a href="/kategori/{{ $kategori->id }}/edit" class="btn btn-warning  mb-2"><i class="bi bi-pencil-fill"></i></a>
                                            <form id="{{ $kategori->id }}" action="/kategori/{{ $kategori->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger mb-2 swal-confirm" data-form="{{ $kategori->id }}"><i class="bi bi-trash-fill"></i></div>
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
