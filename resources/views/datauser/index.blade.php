@extends('layouts.main')

@section('content')
    <a class="btn btn-primary float-end" href="/datauser/create" role="button"><i class="bi bi-person-add"></i> Tambah User</a>
    <h1 class="h3 mb-4">Data User</h1>
   

    <div class="row">
        <div class="col">
            <div class="card">
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="table_id" class="display">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>Email</th>
                                    <th>Jabatan</th>
                                    <th>Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($datauser as $user)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>
                                        <td>{{ $user->name }}</td>
                                        <td>{{ $user->email }}</td>
                                        <td>{{ $user->roles }}</td>
                                        <td>
                                            <a href="/datauser/{{ $user->id }}/edit" class="btn btn-warning  mb-2"><i class="bi bi-pencil-fill"></i></a>
                                            <form id="{{ $user->id }}" action="/datauser/{{ $user->id }}" method="POST" class="d-inline">
                                                @method('delete')
                                                @csrf
                                                <div class="btn btn-danger mb-2 swal-confirm" data-form="{{ $user->id }}"><i class="bi bi-trash-fill"></i></div>
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
