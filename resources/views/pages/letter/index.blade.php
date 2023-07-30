<x-app-layout>

@pushOnce('styles')
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endPushOnce

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Data {{ request('status') }}</h3>
                <p class="text-subtitle text-muted">For user to check they list</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item">
                            <a href="/">Dashboard</a>
                        </li>
                        <li class="breadcrumb-item active" aria-current="page">
                            {{ request('status') }}
                        </li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section class="section">
        <div class="card">
            <div class="card-header d-flex flex-column flex-sm-row align-items-baseline justify-content-between">
                <h4 class="card-title mb-0">
                    {{ request('status') }}
                </h4>

                <div class="d-flex justify-between gap-3">
                    <a href="/surat/export?status={{ request('status') }}&startDate={{ request('startDate') }}&endDate={{ request('endDate') }}&unit={{ request('units') }}&letterType={{ request('letterType') }}" class="mr-2">
                        <button type="button" class="btn btn-sm btn-outline-success btn-min-width">
                            Export Data
                        </button>
                    </a>

                    <a href="/surat/create?status={{ request('status') }}" class="btn btn-sm btn-outline-primary btn-min-width">
                        Tambah Surat
                    </a>
                </div>
            </div>
            <div class="card-body">
                <hr>
                <form action="?status={{ request('status') }}">
                    <div class="row mb-4">
                        <div class="col-3 col-12 col-md-6 col-lg-3">
                            <label for="units">
                                Staf
                            </label>

                            <select name="units" id="units" class="form-control">
                                <option value="" selected>
                                    pilih staf
                                </option>
                                @foreach ($units as $key => $value)
                                    <option value="{{ $key }}" {{ request('unit') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>

                        <div class="col-3 col-12 col-md-6 col-lg-2">
                            <label for="letterType">
                                Jenis Surat
                            </label>

                            <select name="letterType" id="letterType" class="form-control">
                                <option value="" selected disabled>
                                    pilih jenis surat
                                </option>

                                @foreach ($letterType as $key => $value)
                                    <option value="{{ $key }}" {{ request('letterType') == $key ? 'selected' : '' }}>
                                        {{ $value }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                        <div class="col-3 col-12 col-md-6 col-lg-2">
                            <label for="startDate">
                                Tanggal Awal
                            </label>

                            <input type="date" name="startDate" id="startDate" class="form-control" value="{{ request('startDate') }}">
                        </div>

                        <div class="col-3 col-12 col-md-6 col-lg-2">
                            <label for="endDate">
                                Tanggal Akhir
                            </label>

                            <input type="date" name="endDate" id="endDate" class="form-control" value="{{ request('endDate') }}">
                        </div>
                    </div>
                </form>
                <table class="table table-striped" id="table1">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Nomor Agenda / Surat</th>
                            <th>Tanggal</th>
                            <th>{{ request('status') == 'Surat Masuk' ? 'Dari' : 'Kepada' }}</th>
                            <th>Perihal</th>
                            <th>Staf</th>
                            <th>Jenis Surat</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($letters as $key => $item)
                            <tr>
                                <td>
                                    {{ $loop->iteration }}
                                </td>
                                <td>
                                    {{ $item->code_agenda }} / {{ $item->code }}
                                </td>
                                <td>
                                    {{ Carbon\Carbon::parse($item->date)->format('d F Y') }}
                                </td>
                                <td>
                                    {{ $item->from }}
                                </td>
                                <td>
                                    {{ $item->regarding }}
                                </td>
                                <td>
                                    {{ $item->unit ? $item->unit->name : '-' }}
                                </td>
                                <td>
                                    {{ $item->letterType ? $item->letterType->name : '-' }}
                                </td>
                                <td>
                                    <div class="btn-group dropend me-1 mb-1">
                                        <button type="button" class="btn dropdown-toggle"
                                            data-bs-toggle="dropdown" aria-haspopup="true"
                                            aria-expanded="false">
                                            <i class="bi bi-three-dots-vertical"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item" href="/surat/{{ $item->id }}?status={{ request('status') }}">Show</a>
                                            <a class="dropdown-item" href="/surat/{{ $item->id }}/edit?status={{ request('status') }}">Edit</a>
                                            <form method="POST" action="/surat/{{ $item->id }}">
                                                @method('delete')
                                                @csrf
                                                <button class="dropdown-item">Hapus</button>
                                            </form>
                                        </div>
                                    </div>
                                </td>
                            </tr>

                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>

    </section>
</div>

@push('scripts')
    <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
    <script>
        // Simple Datatable
        let table1 = document.querySelector('#table1');
        let dataTable = new simpleDatatables.DataTable(table1);

        $(document).ready(function(){
            $('#units').on('change', function(e) {
                let unit = $(this).val();

                changedTrigger('unit',unit);
            });

            $('#letterType').on('change', function(e) {
                let letterType = $(this).val();

                changedTrigger('letterType',letterType);
            });

            $('#startDate').on('change', function(e) {
                let startDate = $(this).val();

                console.log('a');

                changedTrigger('startDate',startDate);
            });

            $('#endDate').on('change', function(e) {
                let endDate = $(this).val();

                changedTrigger('endDate',endDate);
            });
        });

        // Trigger Function
        function changedTrigger (type = 'kotkab', kotkabId) {
                let queryString = window.location.search;
                let params = new URLSearchParams(queryString);
                params.delete(type);
                params.append(type, kotkabId);
                document.location.href = "?" + params.toString();
            }
    </script>
@endpush

</x-app-layout>
