<x-app-layout>

    <x-slot:title> Sumakker - {{ request('status') }}</x-slot>
    <x-slot:description>Surat Masuk & Surat Keluar</x-slot>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Detail ({{ $letter->code }})</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item"><a href="/surat?status={{ $letter->status }}">{{ $letter->status }}</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Show ({{ $letter->code }})</li>
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
                        <h4 class="card-title">Formulir {{ $letter->status }}</h4>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <form class="form form-horizontal" action="#">
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-md-4">
                                            <label for="code">Nomer Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="code" class="form-control" value="{{ $letter->code }}" name="code"
                                                placeholder="Masukan Nomer Surat" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="code_agenda">Nomer Agenda</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="code_agenda" class="form-control" value="{{ $letter->code_agenda }}" name="code_agenda"
                                                placeholder="Masukan Nomer Agenda" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="date">Tanggal Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="date" id="date" name="date" class="form-control" value="{{ $letter->date }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="from">{{ request('status') == 'Surat Masuk' ? 'Dari' : 'Kepada' }}</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="from" class="form-control" value="{{ $letter->from }}" name="from"
                                                placeholder="{{ request('status') == 'Surat Masuk' ? 'Dari' : 'Kepada' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="regarding">Perihal</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="regarding" class="form-control" value="{{ $letter->regarding }}" name="regarding"
                                                placeholder="Perihal" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="unit_id">Staf</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="unit_id" name="unit_id" class="form-control" value="{{ $letter->unit ? $letter->unit->name : '-' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="letter_type_id">Jenis Surat</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <input type="text" id="letter_type_id" name="letter_type_id" class="form-control" value="{{ $letter->letterType ? $letter->letterType->name : '-' }}" disabled>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="note">Keterangan</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            <textarea name="note" id="note" cols="30" rows="10" class="form-control" disabled>{{ old('note',$letter->note) }}</textarea>
                                        </div>
                                        <div class="col-md-4">
                                            <label for="file">File</label>
                                        </div>
                                        <div class="col-md-8 form-group">
                                            {{ $letter->getFirstMedia('letter')->file_name }}

                                            <a href="{{ $letter->getFirstMediaUrl('letter') }}" target="_blank" class="btn btn-success">
                                                Unduh File
                                            </a>
                                        </div>

                                        <div class="col-sm-12 d-flex justify-content-end">
                                            <a href="/surat?status={{ $letter->status }}" class="btn btn-primary me-1 mb-1">Kembali</a>
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

</x-app-layout>
