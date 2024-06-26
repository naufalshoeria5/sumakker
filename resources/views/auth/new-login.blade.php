<x-guest-layout>

    <x-slot:title> Sumakker - Login </x-slot>
    <x-slot:description>Surat Masuk dan Surat Keluar di Staff Pabanrenproggar</x-slot>

    <x-auth-session-status class="mb-4" :status="session('status')" />

<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="/" class="d-flex align-items-center gap-4 text-decoration-none" style="flex-direction: column">
                <img src="/assets/images/logo/logo_kodiklat.webp" style="height: 5rem" alt="Logo">
                <h1 style="text-wrap: nowrap">KODIKLAT TNI AD</h1>
            </a>
        </div>
        <p class="auth-subtitle mb-5" style="font-size: 1.2rem">
            Selamat Datang di <br> SUMAKKER (Sistem Surat Masuk & Surat Keluar) <br>
            Staf Pabanrenproggar
        </p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            @error('failed')
                <div class="alert alert-danger">{{ $message }}</div>
            @enderror
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl @error('username') is-invalid
                @enderror" id="username" value="{{ old('username') }}" name="username" placeholder="Username" autofocus>
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
                @error('username')
                    <div class="invalid-feedback">
                        <i class="bx bx-radio-circle"></i>
                        {{ $message }}
                    </div>
                @enderror
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-xl @error('password') is-invalid @enderror" placeholder="Password">
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
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
        </form>
    </div>
</div>
<div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right">
        {{-- <img src="/assets/images/bg/kodiklat.jpg" alt=""> --}}
    </div>
</div>
</x-guest-layout>
