<x-guest-layout>

    <x-slot:title> Sumakker </x-slot>
        <x-slot:description>Sistem Surat Masuk & Keluar</x-slot>

    <body>
        <!-- Navigation-->
        <nav class="navbar navbar-light bg-light static-top">
            <div class="container">
                <a class="navbar-brand" style="color: #2c4e80" href="#!">SUMAKKER</a>
                <a href="/login" class="btn btn-lg btn-outline-primary btn-login-welcome">Login</a>
                {{-- <a class="btn btn-primary" href="#signup">Login</a> --}}
            </div>
        </nav>
        <!-- Masthead-->
        <header class="masthead">
            <div class="container position-relative">
                <div class="row justify-content-center">
                    <div class="col-xl-6">
                        <div class="text-center text-white">
                            <img class="img-error mb-3" src="/assets/images/logo/logo_kodiklat.webp" alt="Not Found" width="150">

                            <!-- Page heading-->
                            <h4 class="mb-5 text-white">Surat Masuk dan Surat Keluar <p class="text-uppercase">SPabanrenproggar</p></h4>

                            <!-- to get an API token!-->
                            <form class="form-subscribe">
                                <!-- Email address input-->
                                <div class="row">
                                    <div class="col col-md-8">
                                        <input class="form-control form-control-lg" id="q" type="text" placeholder="Nomor Surat..." name="q" value="{{ request('q') }}"/>
                                        <div class="invalid-feedback">no surat wajib diisi</div>
                                    </div>
                                    <div class="col-auto col-md-4">
                                        <button type="submit" class="btn btn-lg btn-primary">Cari Surat</button>
                                    </div>
                                </div>
                                <!-- Submit success message-->
                                {{-- <!-- has successfully submitted-->
                                <div class="d-none" id="submitSuccessMessage">
                                    <div class="text-center mb-3">
                                        <div class="fw-bolder">Form submission successful!</div>
                                        <p>To activate this form, sign up at</p>
                                        <a class="text-white" href="https://startbootstrap.com/solution/contact-forms">https://startbootstrap.com/solution/contact-forms</a>
                                    </div>
                                </div>
                                <!-- Submit error message-->
                                <!---->
                                <!-- This is what your users will see when there is--> --}}
                                <!-- an error submitting the form-->
                                <div class="d-none" id="submitErrorMessage"><div class="text-center text-danger mb-3">Error sending message!</div></div>
                            </form>

                            @isset($letter)
                                <section class="section mt-10">
                                    <div class="row">
                                        <div class="col-12 col-md-8 offset-md-2">
                                            <div class="pricing">
                                                <div class="row justify-content-center">
                                                    <div class="px-0">
                                                        <div class="card card-highlighted">
                                                            <div class="card-header text-center">
                                                                <h4 class="card-title">Surat Ditemukan ({{ $letter->status }})</h4>
                                                                <p></p>
                                                            </div>
                                                            <h1 class="price text-white">{{ $letter->letterType->name }}</h1>
                                                            <ul>
                                                                <table>
                                                                    <tbody>
                                                                        <tr>
                                                                            <td class="text-white text-start" style="width: 60%">Nomor Agenda</td>
                                                                            <td class="text-center text-white">:</td>
                                                                            <td class="text-white text-start">{{ $letter->code_agenda }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-white text-start">Nomor Surat</td>
                                                                            <td class="text-center text-white">:</td>
                                                                            <td class="text-white text-start">{{ $letter->code }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-white text-start">Tanggal Surat</td>
                                                                            <td class="text-center text-white">:</td>
                                                                            <td class="text-white text-start">{{ \Carbon\Carbon::parse($letter->date)->format('d F Y') }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-white text-start">{{ $letter->status == 'Surat Masuk' ? 'Dari' : 'Kepada' }}</td>
                                                                            <td class="text-center text-white">:</td>
                                                                            <td class="text-white text-start">{{ $letter->from }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-white text-start">Perihal</td>
                                                                            <td class=" text-white">:</td>
                                                                            <td class="text-white text-start">{{ $letter->regarding }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-white text-start">Staf</td>
                                                                            <td class=" text-white">:</td>
                                                                            <td class="text-white text-start">{{ $letter->unit->name }}</td>
                                                                        </tr>
                                                                        <tr>
                                                                            <td class="text-white text-start">Url Berkas</td>
                                                                            <td class=" text-white">:</td>
                                                                            <td class="text-white text-start">
                                                                                <a class="text-white btn btn-success" href="{{ $letter->getFirstMediaUrl('letter') }}">
                                                                                    Unduh File
                                                                                </a>
                                                                            </td>
                                                                        </tr>
                                                                    </tbody>
                                                                </table>
                                                            </ul>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </section>
                            @endisset
                        </div>
                    </div>
                </div>
            </div>
        </header>
        <!-- Icons Grid-->
        <section class="features-icons bg-light text-center">
            <div class="container">
                <div class="row">
                    <div class="col-lg-6">
                        <div class="features-icons-item mx-auto mb-5 mb-lg-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-window m-auto text-primary"></i></div>
                            <h3>Fully Responsive</h3>
                            <p class="lead mb-0">This theme will look great on any device, no matter the size!</p>
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class="features-icons-item mx-auto mb-0 mb-lg-3">
                            <div class="features-icons-icon d-flex"><i class="bi-terminal m-auto text-primary"></i></div>
                            <h3>Easy to Use</h3>
                            <p class="lead mb-0">Ready to use with your own content, or customize the source files!</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Testimonials-->
        <section class="testimonials text-center bg-light">
            <div class="container">
                <h2 class="mb-5">Kebutuhan tugas dari</h2>
                <div class="row">
                    <div class="col-lg-4 mx-auto">
                        <div class="testimonial-item mx-auto mb-5 mb-lg-0">
                            <img class="img-fluid rounded-circle mb-3" src="/assets/images/author/author.jpg" alt="..." />
                            <h5>Sri Yulianti SE.</h5>
                            <p class="font-weight-light mb-0 text-nowrap">siswa pelatihan kepemimpinan pengawas</p>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Footer-->
        <footer class="footer bg-light">
            <div class="container">
                <div class="row">
                    <div class="col h-100 text-lg-end ml-auto text-right">
                        <p class="text-muted small mb-4 mb-lg-0">&copy; Sumakker {{ date("Y") }}. All Rights Reserved.</p>
                    </div>
                </div>
            </div>
        </footer>

        @pushOnce('scripts')
            <!-- Bootstrap core JS-->
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
            <!-- Core theme JS-->
            <script src="js/scripts.js"></script>
            <script src="https://cdn.startbootstrap.com/sb-forms-latest.js"></script>
        @endPushOnce
</x-guest-layout>

