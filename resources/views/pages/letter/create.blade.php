<x-app-layout>

    @pushOnce('styles')
        {{-- Custom CSS --}}
        <link rel="stylesheet" href="/assets/vendors/dropify/dist/css/dropify.min.css">
    @endPushOnce

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Tambah {{ request('status') }}</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/surat?status={{ request('status') }}">{{ request('status') }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Tambah {{ request('status') }}</li>
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
                        <h4 class="card-title">Formulir {{ request('status') }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="/surat?status={{ request('status') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="code_agenda">Nomor Agenda</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="code_agenda" class="form-control" name="code_agenda"
                                                placeholder="Masukan Nomor Agenda" value="{{ old('code_agenda') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="code">Nomor Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="code" class="form-control" name="code"
                                                placeholder="Masukan Nomor Surat" value="{{ old('code') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date">Tanggal Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="date" name="date" class="form-control" value="{{ old('date') }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="from">{{ request('status') == 'Surat Masuk' ? 'Dari' : 'Kepada' }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="from" class="form-control" name="from" value="{{ old('from') }}"
                                                placeholder="{{ request('status') == 'Surat Masuk' ? 'Dari' : 'Kepada' }}">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="regarding">Perihal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="regarding" class="form-control" name="regarding" value="{{ old('regarding') }}"
                                                placeholder="Perihal">
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unit_id">Staf</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="unit_id" id="unit_id" class="form-control">
                                                <option value="" selected disabled>
                                                    Pilih Staf
                                                </option>
                                                @foreach ($units as $key => $item)
                                                    <option value="{{ $key }}">
                                                        {{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="letter_type_id">Jenis Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <select name="letter_type_id" id="letter_type_id" class="form-control">
                                                <option value="" selected disabled>
                                                    Pilih Jenis Surat
                                                </option>
                                                @foreach ($letterType as $key => $item)
                                                    <option value="{{ $key }}">
                                                        {{ $item }}
                                                    </option>
                                                @endforeach
                                            </select>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="note">Keterangan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="note" id="note" cols="30" rows="10" class="form-control">{{ old('note') }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="file">File</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="file" class="form-control dropify" name="file" id="file"  data-max-file-size="1M">
                                            <small class="text-danger">Max File Size 1MB</small>
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
