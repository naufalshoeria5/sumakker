<x-app-layout>

    <x-slot:title> Sumakker - Tambah Pengguna</x-slot>
    <x-slot:description>Surat Masuk & Surat Keluar</x-slot>

    @pushOnce('styles')
        {{-- Custom CSS --}}
        <link rel="stylesheet" href="/assets/vendors/dropify/dist/css/dropify.min.css">
    @endPushOnce

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah Pengguna</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/users">Pengguna</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah Pengguna</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        <!-- Basic Horizontal form layout section start -->
        <section id="basic-horizontal-layouts">
            <div class="row match-height">
                <div class="card">
                    <div class="card-header">
                        <h4 class="card-title">Formulir Pengguna</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/users" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="name">Nama Lengkap</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ old('name') }}" name="name"
                                                placeholder="Masukan Nama Lengkap">
                                                @error('name')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="email">Email</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="email" id="email" class="form-control @error('email') is-invalid @enderror" value="{{ old('email') }}" name="email"
                                                placeholder="Masukan Email">
                                                @error('email')
                                                    <div class="invalid-feedback">
                                                        <i class="bx bx-radio-circle"></i>
                                                        {{ $message }}
                                                    </div>
                                                @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="username">Username</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="username" name="username" class="form-control @error('username') is-invalid @enderror" value="{{ old('username') }}" placeholder="Masukan Username">
                                            @error('username')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="file">File</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" class="form-control dropify" name="file" id="file"  data-max-file-size="1M">
                                            <small class="text-danger">Max File Size 1MB</small>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password">Password</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password" class="form-control @error('password') is-invalid @enderror" name="password"
                                                placeholder="Masukan password">
                                            @error('password')
                                                <div class="invalid-feedback">
                                                    <i class="bx bx-radio-circle"></i>
                                                    {{ $message }}
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="col-md-4">
                                            <label for="password_confirmation">Password Konfirmasi</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="password" id="password_confirmation" class="form-control" name="password_confirmation"
                                                placeholder="Masukan Password Konfirmasi">
                                        </div>


                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <button type="submit" class="btn btn-primary me-1 mb-1">Submit</button>
                                            <button type="reset"
                                                class="btn btn-light-secondary me-1 mb-1">Reset</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- // Basic Horizontal form layout section end -->
    </div>

    @pushOnce('scripts')
        <script src="/assets/vendors/dropify/dist/js/dropify.min.js"></script>

        <script>
                $('.dropify').dropify();
        </script>
    @endPushOnce

</x-app-layout>
