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
        <a class="btn btn-secondary float-end" href="/barang/" role="button"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h1 class="h3 mb-4">Detail Barang</h1>
       
        <div class="row">
            <div class="col-md-4">
                <div class="card mb-4">
                    <img src="{{ asset('storage/'. $barang->gambar) }}" alt="gambar barang" class="card-img-top">
                </div>
                <div class="card-mb-4">
                    <img src="{{ asset('storage/qrcode-barang/'. $barang->kode_barang . '.png') }}" alt="qr-code" style="width: 250px; height: 250px; display: block; margin: 0 auto;">
                </div>
            </div>
            <div class="col-md-8">
                <div class="card">
                    <div class="card-body">
                        <div class="card-title">{{ $barang->nama }}</div>
                        <hr>
                        <table style="width:100%">
                            <tr>
                                <td><b>Kode Barang</b></td>
                                <td>:</td>
                                <td>{{ $barang->kode_barang }}</td>
                            </tr>
                            <tr>
                                <td><b>Harga Pembelian</b></td>
                                <td>:</td>
                                <td>Rp. {{ $barang->harga }}</td>
                            </tr>
                            <tr>
                                <td><b>Tanggal Penambahan</b></td>
                                <td>:</td>
                                <td>{{ $barang->tanggal }}</td>
                            </tr>
                            <tr>
                                <td><b>Kategori</b></td>
                                <td>:</td>
                                <td>{{ $barang->kategori->nama}}</td>
                            </tr>
                            <tr>
                                <td><b>Satuan</b></td>
                                <td>:</td>
                                <td>{{ $barang->satuan->nama}}</td>
                            </tr>
                            <tr>
                                <td><b>Deskripsi</b></td>
                                <td>:</td>
                                <td><br>{!! $barang->deskripsi !!}</td>
                            </tr>
                        </table>
                    </div>
                    <div class="card-footer">
                        <a class="btn btn-primary" href="/barang/label/{{ $barang->id }}" target="_blank" role="button"><i class="bi bi-printer"></i>&nbsp; Cetak Label</a>
                    </div>
                </div>
            </div>
        </div>
        
    </div>
</div>

@endsection
