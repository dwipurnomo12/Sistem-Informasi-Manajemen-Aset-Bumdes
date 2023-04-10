@extends('layouts.main')

@section('content')

<div class="row">
    <div class="col-md-10 mx-auto">
        <a class="btn btn-secondary float-end" href="/datauser/" role="button"><i class="bi bi-arrow-left"></i> Kembali</a>
        <h1 class="h3 mb-4">User Pengguna</h1>
       
        <div class="row">
            <div class="col">
                <div class="card">
                    <div class="card-body">
                        <form action="/datauser/{{ $user->id }}" method="POST" enctype="multipart/form-data">
                            @method('put')
                            @csrf

                            <div class="mb-3">
                                <label for="name" class="form-label">Nama</label>
                                <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', $user->name )}}">
                                @error('name')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" value="{{ old('email', $user->email )}}">
                                @error('email')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <div class="mb-3">
                                <label for="roles" class="form-label">Jabatan</label>
                                <select class="form-select @error('roles') is-invalid @enderror" aria-label="Default select example" name="roles" id="roles">
                                    @if(old('roles', $user->roles) == $user->roles)
                                        <option value="{{ $user->roles }}">{{ $user->roles }}</option>
                                    @endif
                                </select>
                                @error('roles')
                                    <div class="invalid-feedback">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            {{-- <input type="hidden" name="password" id="password" value="{{ old('password', $user->password) }}"> --}}

                            <div class="mb-3">
                                <label for="lokasi" class="form-label" id="lokasiLabel">Lokasi</label>
                                <select class="form-select" aria-label="Default select example" id="lokasi" name="lokasi_id">
                                    @foreach ($lokasis as $lokasi)
                                        @if (old('lokasi_id', $user->lokasi_id) == $lokasi->id)
                                            <option value="{{ $lokasi->id }}" selected>{{ $lokasi->nama_lokasi }}</option>
                                        @else
                                            <option value="{{ $lokasi->id }}">{{ $lokasi->nama_lokasi }}</option>
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
    const togglePassword = document.querySelector('#togglePassword');
    const password = document.querySelector('#password');

    togglePassword.addEventListener('click', function (e) {
        const type = password.getAttribute('type') === 'password' ? 'text' : 'password';
        password.setAttribute('type', type);
        this.querySelector('i').classList.toggle('bi-eye-fill');
        this.querySelector('i').classList.toggle('bi-eye-slash-fill');
    });
</script>


<script>
    var lokasiLabel = document.getElementById('lokasiLabel')
    var roles = document.getElementById('roles');
    var lokasi_id = document.getElementById('lokasi');

    if(roles.value === "kepalausaha"){
        lokasiLabel.style.display = "block";
        lokasi_id.style.display = "block";
    } else {
        lokasiLabel.style.display = "none";
        lokasi_id.style.display = "none";
    }

    roles.addEventListener("change", function(){
        if(roles.value === "kepalausaha"){
            lokasiLabel.style.display = "block";
            lokasi_id.style.display = "block";
        } else {
            lokasiLabel.style.display = "none";
            lokasi_id.style.display = "none";
        }
    })
</script>





@endsection
