<x-app-layout>

@push('styles')
    <link rel="shortcut icon" href="assets/images/favicon.svg" type="image/x-icon">
    <link rel="stylesheet" href="assets/vendors/simple-datatables/style.css">
@endpush

<header class="mb-3">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>
</header>

    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Data Jenis Surat</h3>
                    <p class="text-subtitle text-muted">For user to check they list</p>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="/dashboard">Dashboard</a></li>
                            <li class="breadcrumb-item active" aria-current="page">Jenis Surat</li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>
        <section class="section">
            <div class="card">
                <div class="card-header d-flex flex-column flex-sm-row align-items-baseline justify-content-between">
                    <h4 class="card-title">
                        Jenis Surat
                    </h4>

                    <div class="d-flex justify-between gap-3">
                        <a href="/admin-panel/letter/regular/export?start_date={{ request('start_date') }}&end_date={{ request('end_date') }}&status={{ request('status') }}" class="mr-2">
                            <button type="button" class="btn btn-sm btn-outline-success btn-min-width">
                                Export Data
                            </button>
                        </a>

                        <button type="button" data-bs-toggle="modal" data-bs-target="#inlineForm" class="btn btn-sm btn-outline-primary btn-min-width">
                            <i class="ft-plus-square"></i>
                            Tambah Jenis
                        </button>
                    </div>
                </div>
                <div class="card-body">
                    <table class="table table-striped" id="table1">
                        <thead>
                            <tr>
                                <th class="text-center" style="width: 8%;">#</th>
                                <th>Jenis Surat</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($types as $key => $item)
                                <tr>
                                    <td class="text-center" style="width: 8%;">{{ $loop->iteration }}</td>
                                    <td>{{ $item }}</td>
                                    <td>
                                        <div class="btn-group dropend me-1 mb-1">
                                            <button type="button" class="btn dropdown-toggle"
                                                data-bs-toggle="dropdown" aria-haspopup="true"
                                                aria-expanded="false">
                                                <i class="bi bi-three-dots-vertical"></i>
                                            </button>
                                            <div class="dropdown-menu">
                                                <a class="dropdown-item" href="#">Edit</a>
                                                <form method="POST" action="/type/{{ $key }}">
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

    @push('modal')
        <div class="modal fade text-left" id="inlineForm" tabindex="-1"
        role="dialog" aria-labelledby="myModalLabel33" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-dialog-scrollable"
                role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel33">Tambah Data Jenis Surat</h4>
                        <button type="button" class="close" data-bs-dismiss="modal"
                            aria-label="Close">
                            <i data-feather="x"></i>
                        </button>
                    </div>
                    <form action="/type" method="POST">
                        @csrf
                        <div class="modal-body">
                            <label for="name">Nama Jenis: </label>
                            <div class="form-group">
                                <input type="text" id="name" name="name" placeholder="Masukan Jenis Surat"
                                    class="form-control">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-light-secondary"
                                data-bs-dismiss="modal">
                                <i class="bx bx-x d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Close</span>
                            </button>
                            <button type="submit" class="btn btn-primary ml-1">
                                <i class="bx bx-check d-block d-sm-none"></i>
                                <span class="d-none d-sm-block">Simpan</span>
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endpush

    @push('scripts')
        <script src="assets/vendors/simple-datatables/simple-datatables.js"></script>
        <script>
            // Simple Datatable
            let table1 = document.querySelector('#table1');
            let dataTable = new simpleDatatables.DataTable(table1);
        </script>
    @endpush

</x-app-layout>
