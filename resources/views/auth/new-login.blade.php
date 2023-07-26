<x-guest-layout>

<x-auth-session-status class="mb-4" :status="session('status')" />

<div class="col-lg-5 col-12">
    <div id="auth-left">
        <div class="auth-logo">
            <a href="index.html"><img src="/assets/images/logo/logo_kodiklat.webp" alt="Logo"></a>
        </div>
        {{ $errors }}
        <h1 class="auth-title">Log in.</h1>
        <p class="auth-subtitle mb-5">Log in with your data that you entered during registration.</p>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="text" class="form-control form-control-xl" id="username" value="{{ old('username') }}" name="username" placeholder="Username" autofocus>
                <div class="form-control-icon">
                    <i class="bi bi-person"></i>
                </div>
            </div>
            <div class="form-group position-relative has-icon-left mb-4">
                <input type="password" name="password" id="password" class="form-control form-control-xl" placeholder="Password">
                <div class="form-control-icon">
                    <i class="bi bi-shield-lock"></i>
                </div>
            </div>
            <button class="btn btn-primary btn-block btn-lg shadow-lg mt-5">Log in</button>
        </form>
        <div class="text-center mt-5 text-lg fs-4">
            <p class="text-gray-600">Don't have an account? <a href="auth-register.html"
                    class="font-bold">Sign
                    up</a>.</p>
            <p><a class="font-bold" href="auth-forgot-password.html">Forgot password?</a>.</p>
        </div>
    </div>
</div>
<div class="col-lg-7 d-none d-lg-block">
    <div id="auth-right">
        <img src="/assets/image/bg/kodiklat.jpg" alt="">
    </div>
</div>
</x-guest-layout>
