@extends('layouts.main')

@section('content')
    <h1 class="h3 mb-4">Data Permintaan Pengadaan barang</h1>

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
                                    <th>Detail</th>
                                    <th>Opsi</th>   
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($permintaans as $permintaan)
                                    <tr>
                                        <td>{{ $loop->iteration }}</td>                      
                                        <td>{{ $permintaan->nama_pengadaan }}</td>
                                        <td>
                                            @if ($permintaan->status == 'pending')
                                                <span class="badge bg-warning text-dark">{{ $permintaan->status }}</span>
                                            @elseif ($permintaan->status == 'disetujui')
                                                <span class="badge bg-success">{{ $permintaan->status }}</span>
                                            @else
                                                <span class="badge bg-danger">{{ $permintaan->status }}</span>
                                            @endif
                                        </td>
                                        <td>
                                            <a href="/permintaan/{{ $permintaan->id }}" class="btn btn-secondary d-inline mb-2"><i class="bi bi-eye-fill"></i></a>
                                        </td>

                                        @if (auth()->user()->roles === 'direktur')
                                            <td>
                                                @if ($permintaan->status == 'pending')
                                                <form id="form-{{ $permintaan->id }}"  action="/permintaan/{{ $permintaan->id }}/setuju" method="POST" class="d-inline">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="btn btn-success mb-2 pengajuan-confirm" data-form="form-{{ $permintaan->id }}"><i class="bi bi-check-square"></i></div>
                                                </form>
                                                <form id="form-{{ $permintaan->id }}-tolak" action="/permintaan/{{ $permintaan->id }}/tolak" method="POST" class="d-inline">
                                                    @method('PUT')
                                                    @csrf
                                                    <div class="btn btn-danger mb-2 tolak-confirm" data-form="form-{{ $permintaan->id }}-tolak"><i class="bi bi-x-square"></i></div>
                                                </form>
                                                @else
                                                    <a href="/permintaan/{{ $permintaan->id }}/edit" class="btn btn-primary d-inline mb-2"><i class="bi bi-plus-square-fill"></i> Kirim Catatan</a>
                                                @endif
                                            </td>
                                        @else
                                           <td>
                                                <a class="btn btn-primary" href="/permintaan/laporan-pengadaan/{{ $permintaan->id }}" target="_blank" role="button"><i class="bi bi-printer"></i>&nbsp; Cetak</a>                    
                                           </td>
                                        @endif
                                        
                                    </tr>  
                                @endforeach                     
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>

    {{-- @include('permintaan/edit') --}}

    <script>
        $(document).ready( function () {
        $('#table_id').DataTable();
    } );
    </script>

    {{-- <script>
        $(document).ready(function(){
            $('.pengajuan-confirm, .tolak-confirm').click(function(event){
                event.preventDefault();
                var formId = $(this).attr('data-form');
                document.getElementById(formId).submit();
            });
        });
    </script> --}}

    


@endsection





