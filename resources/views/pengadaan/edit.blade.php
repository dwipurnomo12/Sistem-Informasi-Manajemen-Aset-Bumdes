@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto">
        <a class="btn btn-secondary float-end" href="/pengadaan/" role="button"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h1 class="h3 mb-4">Edit Pengajuan Barang</h1>
       
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="/pengadaan/{{ $pengadaan->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label for="tanggal_pengajuan" class="form-label">Tanggal Pengajuan</label>
                                <input class="form-control" type="text" value="{{ $pengadaan->tanggal_pengajuan }}" aria-label="Disabled input example" name="tanggal_pengajuan" disabled readonly>
                            </div>

                            <div class="mb-3">
                                <label for="nama_pengadaan" class="form-label">Judul Pengajuan</label>
                                <input type="text" class="form-control @error('nama_pengadaan') is-invalid @enderror" id="nama_pengadaan" name="nama_pengadaan" value="{{ old('nama_pengadaan', $pengadaan->nama_pengadaan) }}">
                                @error('nama_pengadaan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="quantity" class="form-label">Quantity</label>
                                <input type="number" class="form-control @error('quantity') is-invalid @enderror" id="quantity" name="quantity" value="{{ old('quantity', $pengadaan->quantity) }}">
                                @error('quantity')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <select class="form-select" aria-label="Default select example" id="lokasi" name="lokasi_id">
                                    @foreach ($lokasis as $lokasi)
                                        @if (old('lokasi_id', $pengadaan->lokasi_id) == $lokasi->id)
                                            <option value="{{ $lokasi->id }}" selected>{{ $lokasi->nama_lokasi }}</option>
                                        @else
                                            <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="text" cols="30" rows="10">{{ old('deskripsi', $pengadaan->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <button type="submit" class="btn btn-primary float-end">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function previewImage(){
        preview.src=URL.createObjectURL(event.target.files[0]);
    }
</script>



@endsection
