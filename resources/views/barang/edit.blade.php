@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto">
        <a class="btn btn-secondary float-end" href="/barang/" role="button"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h1 class="h3 mb-4">Edit Barang</h1>
       
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="/barang/{{ $barang->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label for="nama" class="form-label">Nama Barang</label>
                                <input type="text" class="form-control @error('nama') is-invalid @enderror" id="nama" name="nama" value="{{ old('nama', $barang->nama) }}">
                                @error('nama')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="harga" class="form-label">Harga</label>
                                <input type="number" class="form-control @error('harga') is-invalid @enderror" id="harga" name="harga" step="0.01" value="{{ old('harga', $barang->harga) }}">
                                @error('harga')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="deskripsi" class="form-label">Deskripsi</label>
                                <textarea name="deskripsi" id="text" cols="30" rows="10">{{ old('deskripsi', $barang->deskripsi) }}</textarea>
                                @error('deskripsi')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="gambar" class="form-label @error('gambar') is-invalid @enderror">Gambar</label>
                                <input type="file" class="form-control" id="gambar" name="gambar" onchange="previewImage()">
                                @if($barang->gambar)
                                    <img src="{{ asset('storage/' . $barang->gambar) }}" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 500px; overflow:hidden; border: 1px solid black;">
                                @else
                                    <img src="" class="img-preview img-fluid mb-3 mt-2" id="preview" style="max-height: 250px; overflow:hidden; border: 1px solid black;">
                                @endif
                                    
                                @error('gambar')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="kategori" class="form-label">Kategori</label>
                                <select class="form-select" aria-label="Default select example" id="kategori" name="kategori_id">
                                    @foreach ($kategoris as $kategori)
                                        @if (old('kategori_id', $barang->kategori_id) == $kategori->id)
                                            <option value="{{ $kategori->id }}" selected>{{ $kategori->nama }}</option>
                                        @else
                                            <option value="{{ $kategori->id }}">{{ $kategori->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>
                           
                            <div class="mb-3">
                                <label for="lokasi" class="form-label">Lokasi</label>
                                <select class="form-select" aria-label="Default select example" id="lokasi" name="lokasi_id">
                                    @foreach ($lokasis as $lokasi)
                                        @if (old('lokasi_id', $barang->lokasi_id) == $lokasi->id)
                                            <option value="{{ $lokasi->id }}" selected>{{ $lokasi->nama_lokasi }}</option>
                                        @else
                                            <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
                                        @endif
                                    @endforeach
                                </select>
                            </div>

                            <div class="mb-3">
                                <label for="satuan" class="form-label">satuan</label>
                                <select class="form-select" aria-label="Default select example" id="satuan" name="satuan_id">
                                    @foreach ($satuans as $satuan)
                                        @if (old('satuan_id', $barang->satuan_id) == $satuan->id)
                                            <option value="{{ $satuan->id }}" selected>{{ $satuan->nama }}</option>
                                        @else
                                            <option value="{{ $satuan->id }}">{{ $satuan->nama }}</option>
                                        @endif
                                    @endforeach
                                </select>
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
