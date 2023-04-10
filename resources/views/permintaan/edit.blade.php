@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto">
        <a class="btn btn-secondary float-end" href="/permintaan/" role="button"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h1 class="h3 mb-4">Kirim Catatan</h1>
       
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="/permintaan/{{ $status->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <input type="hidden" name="id" value="{{ $status->id }}">
                            <input type="hidden" name="permintaan_id" value="{{ $status->pengadaan_id }}">
                            <div class="modal-body">
                                <div class="mb-3">
                                    <label for="catatan" class="form-label">Tambah Catatan</label>
                                    <textarea class="form-control @error('catatan') is-invalid @enderror" id="catatan" name="catatan" rows="3">{{ old('catatan', $status->catatan) }}</textarea>
                                </div>
                                @error('catatan')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror

                            <button type="submit" class="btn btn-primary float-end">Simpan</button>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection

  
