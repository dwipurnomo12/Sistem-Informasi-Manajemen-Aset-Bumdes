@extends('layouts.main')

@section('content')

<style>
  td{
      font-size: 16px;
      padding-bottom: 4px;
  }
</style>

<div class="row">
    <div class="col-md-10 mx-auto">
        <a class="btn btn-secondary float-end" href="/pengadaan/" role="button"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h1 class="h3 mb-4">Detail Pengajuan</h1>
       
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-header">
                        <div class="card-title"><h3>{{ $pengadaan->nama_pengadaan }}</h3></div>           
                    </div>
                    <div class="card-body">
                      <table style="width:100%">
                        <hr>
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
</div>

@endsection
