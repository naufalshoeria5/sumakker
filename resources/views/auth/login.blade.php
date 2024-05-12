<x-guest-layout>

    <x-slot:title> Sumakker - Login </x-slot>
    <x-slot:description>Surat Masuk dan Surat Keluar di Staff Pabanrenproggar</x-slot>

    <x-auth-session-status class="mb-4" :status="session('status')" />

    @pushOnce('styles')
        <style>
            .btn-color{
                background-color: #0e1c36;
                color: #fff;
            }
            .profile-image-pic{
                height: 200px;
                width: 200px;
                object-fit: cover;
            }

            .cardbody-color{
                background-color: #ebf2fa;
            }

            a{
                text-decoration: none;
            }
        </style>
    @endPushOnce
    <div class="container">
        <div class="row">
          <div class="col-md-6 offset-md-3">
            <h2 class="text-center text-dark mt-5"><a href="/" class="text-decoration-none" style="color: #2c4e80">SUMAKKER</a></h2>
            <div class="card my-5">
                <form class="card-body cardbody-color p-lg-5" method="POST" action="{{ route('login') }}">
                    @csrf
                    @error('failed')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror

                <div class="text-center">
                  <img src="/assets/images/logo/logo_kodiklat.webp" class="img-fluid profile-image-pic img-thumbnail rounded-circle my-3"
                    width="200px" alt="profile">
                </div>

                <div class="form-group position-relative has-icon-left">
                  <input type="text" class="form-control @error('username') is-invalid @enderror" id="username"
                    placeholder="Username" name="username" value="{{ old('userbane') }}">
                    <div class="form-control-icon">
                        <i class="bi bi-person"></i>
                    </div>
                </div>
                <div class="form-group position-relative has-icon-left">
                    <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" placeholder="password">
                    <div class="form-control-icon">
                        <i class="bi bi-shield-lock"></i>
                    </div>
                    @error('password')
                        <div class="invalid-feedback">
                            <i class="bx bx-radio-circle"></i>
                            {{ $message }}
                        </div>
                    @enderror
                </div>
                <button class="btn btn-primary btn-block btn-md shadow-lg mt-2">Log in</button>
            </form>
            </div>

          </div>
        </div>
      </div>
</x-guest-layout>

