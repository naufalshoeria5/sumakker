<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pengarsipan Surat Keluar & Surat Masuk. - Sukema</title>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@300;400;600;700;800&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="/assets/css/bootstrap.css">
    <link rel="stylesheet" href="/assets/vendors/bootstrap-icons/bootstrap-icons.css">
    <link rel="stylesheet" href="/assets/css/app.css">
    <link rel="stylesheet" href="/assets/css/pages/error.css">
</head>

<body>
    <div id="error">
        <div class="error-page container">
            <div class="col-md-8 col-12 offset-md-2">
                <div class="text-center">
                <img class="img-error" src="/assets/images/logo/logo_kodiklat.webp" alt="Not Found">
                    <h1 class="error-title">SUKEMA</h1>
                    <p class='fs-5 text-gray-600'>Sistem Pengarsipan Surat Keluar & Surat Masuk.</p>
                    <form action="">
                        @if ($letter == null && request('q'))
                            <div class="alert alert-warning">
                                <h4 class="alert-heading">Not Found</h4>
                                <p>Data tidak ditemukan, coba periksa kembali nomor surat yang dimasukan.</p>
                            </div>
                        @endif
                        <input type="text" name="q" placeholder="Cari Surat..." value="{{ request('q') }}" class="form-control">
                        <small class="text-danger">Masukan Nomor Surat*</small><br>
                        <button type="submit" class="btn btn-lg btn-outline-primary mt-3">Cari Surat</button>
                    </form>
                    @if ($letter)
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
                    @endif
                    <a href="/login" class="btn btn-lg btn-outline-primary mt-3 btn-login-welcome" style="position: fixed">Login</a>
                </div>
            </div>
        </div>


    </div>
</body>

</html>
