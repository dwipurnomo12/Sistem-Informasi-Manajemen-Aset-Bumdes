@extends('layouts.app')

@section('content')
<div class="container">
    <div class="authentication-wrapper authentication-basic container-p-y">
      <div class="authentication-inner">
      
        <div class="card">
          <div class="card-body">

            <h4 class="my-4" style="text-align: center">SISTEM INFORMASI MANAJEMEN ASET</h4>

            <form action="{{ route('login') }}" method="POST" class="mb-3">
              @csrf

              <div class="mb-3">
                <label for="email" class="form-label">Masukkan Email</label>
                <input type="text" class="form-control @error('email') is-invalid @enderror" id="email" name="email" autofocus/>
              
                  @error('email')
                      <span class="invalid-feedback" role="alert">
                          <p>{{ $message }}</p>
                      </span>
                  @enderror
              </div>

              <div class="mb-3 form-password-toggle">
                  <div class="d-flex justify-content-between">
                  <label class="form-label" for="password">Masukkan Password</label>
              </div>
                <div class="input-group input-group-merge">
                  <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password" aria-describedby="password"/>
                  <span class="input-group-text cursor-pointer"><i class="bx bx-hide"></i></span>
                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <p>{{ $message }}</p>
                        </span>
                    @enderror
                </div>
              </div>

              <div class="mb-3">
                <button class="btn btn-primary d-grid w-100" type="submit">Masuk</button>
              </div>
            </form>

            <p class="text-center">
                <span>Lupa Kata Sandi ?</span>
                <span>Segera Hubungi Admin</span>
            </p>
          </div>
        </div>

      </div>
    </div>
  </div>
@endsection
    

   
