@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto">

        <h1 class="h3 mb-4">Reset Password</h1>

        <div class="card">
            <div class="card-body">
                <form action="/reset-password/" method="POST">
                    @method('put')
                    @csrf
        
                    <div class="mb-3">
                        <label for="current_password" class="form-label @error('current_password') is-invalid @enderror">Masukkan Password Lama</label>
                            <input type="password" class="form-control" id="current_password" name="current_password" required>
                            @error('current_password')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                             @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="passwordNew" class="form-label @error('passwordNew') is-invalid @enderror">Masukkan password Baru</label>
                            <input type="password" class="form-control" id="passwordNew" name="passwordNew" required>
                            @error('passwordNew')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                    </div>
        
                    <div class="mb-3">
                        <label for="konfirmasiPassword" class="form-label @error('konfirmasiPassword') is-invalid @enderror">konfirmasi password</label>
                        <input type="password" class="form-control" id="konfirmasiPassword" name="konfirmasiPassword" required>
                        @error('konfirmasiPassword')
                            <div class="invalid-feedback">
                                {{ $message }}
                            </div>
                        @enderror
                    </div>

                    <button type="submit" class="btn btn-primary mb-5 float-end">Reset Password</button>

                </form>

            </div>
        </div>
    </div>
</div>



@endsection
