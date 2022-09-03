@extends('surat::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                @if (Session::has('success'))
                    <div class="alert alert-success" role="alert">
                        <h4 class="alert-heading">Berhasil</h4>
                        <div class="alert-body">
                            {{ session('success') }}
                        </div>
                    </div>
                @endif
                @if (Session::has('status'))
                    <div class="alert alert-danger" role="alert">
                        <h4 class="alert-heading">Berhasil</h4>
                        <div class="alert-body">
                            {{ session('status') }}
                        </div>
                    </div>
                @endif
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Data Surat Kosong</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="index.html">Home</a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="#">Arsip Surat</a>
                                    </li>
                                    <li class="breadcrumb-item active">Surat Keluar
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-end col-md-3 col-12 d-md-block d-none">
                    <div class="mb-1 breadcrumb-right">
                        <div class="dropdown">
                            <button type="button" class="btn btn-success" data-bs-toggle="modal"
                                data-bs-target="#editUser">Tambah Data Surat Kosong</button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <div class="row">
                </div>

                <!-- Basic table -->

                @php
                    $i = 1;
                @endphp

                <section id="basic-datatable">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <table class="datatables-basic table">
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>
                                                <center>No</center>
                                            </th>
                                            <th>
                                                <center>nomor surat</center>
                                            </th>
                                            <th>
                                                <center>Tanggal Surat</center>
                                            </th>
                                            <th>
                                                <center>perihal</center>
                                            </th>
                                            <th>
                                                <center>Instansi</center>
                                            </th>
                                            <th>
                                                <center>Keterangan</center>
                                            </th>
                                            <th>
                                                <center>Dokumen</center>
                                            </th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @if (!empty($asuratkeluar))
                                            @foreach ($asuratkeluar as $suratkeluar)
                                                @php
                                                    $surat = Modules\Surat\Entities\Suratkeluar::select()
                                                        ->where('id', $suratkeluar->id)
                                                        ->get()
                                                        ->first();
                                                    $bulan = Carbon\Carbon::parse($surat->tanggal_buat)->format('m');
                                                    $tahun = Carbon\Carbon::parse($surat->tanggal_buat)->format('Y');
                                                    $tanggal = Carbon\Carbon::parse($surat->tanggal_buat)->format('d-m-Y');
                                                    $array_bln = [
                                                        '01' => 'I',
                                                        '02' => 'II',
                                                        '03' => 'III',
                                                        '04' => 'IV',
                                                        '05' => 'V',
                                                        '06' => 'VI',
                                                        '07' => 'VII',
                                                        '08' => 'VIII',
                                                        '09' => 'IX',
                                                        '10' => 'X',
                                                        '11' => 'XI',
                                                        '12' => 'XII',
                                                    ];
                                                    $bln = $array_bln[$bulan];
                                                    $nosurat = sprintf('%03d', $suratkeluar->nomor_surat);
                                                @endphp
                                                @if (empty($suratkeluar->perihal))
                                                    <tr>
                                                        <td> </td>
                                                        <td>
                                                            <center>{{ $i++ }}</center>
                                                        </td>
                                                        <td>
                                                            <center>
                                                                {{ $nosurat }}/B/SWB/{{ $bln }}/{{ $tahun }}
                                                            </center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $tanggal }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $suratkeluar->perihal }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $suratkeluar->tertanda }}</center>
                                                        </td>
                                                        <td>
                                                            <center>{{ $suratkeluar->keterangan }}</center>
                                                        </td>
                                                        <td>
                                                            @if ($suratkeluar->dokumen)
                                                                <div class="btn-group dropup d-block">
                                                                    <a href="{{ asset('storage/' . $suratkeluar->dokumen) }}"
                                                                        target="blank"
                                                                        class="btn btn-icon btn-success"><span
                                                                            data-feather="eye"></span></a>
                                                                    <a href="{{ url('surat/printsurat/' . $suratkeluar->id . '/edit') }}"
                                                                        class="btn btn-icon btn-warning"><span
                                                                            data-feather="edit"></span>
                                                                    </a>
                                                                </div>
                                                            @else
                                                                <div class="btn-group dropup d-block">
                                                                    <a href="#" target="blank"
                                                                        class="btn btn-icon btn-danger"><span
                                                                            data-feather="eye"></span></a>
                                                                    <a href="{{ url('/surat/printsurat/' . $suratkeluar->id) }}"
                                                                        target="blank"
                                                                        class="btn btn-icon btn-primary"><span
                                                                            data-feather="printer"></span></a>
                                                                    <a href="{{ url('surat/printsurat/' . $suratkeluar->id . '/edit') }}"
                                                                        class="btn btn-icon btn-warning"><span
                                                                            data-feather="edit"></span>
                                                                    </a>
                                                                </div>
                                                            @endif
                                                        </td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        @endif
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Basic table -->
            </div>
        </div>
    </div>
    <!-- END: Content-->


    <!-- Tambah Surat Modal -->
    <div class="modal fade" id="editUser" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-lg modal-dialog-centered modal-edit-user">
            <div class="modal-content">
                <div class="modal-header bg-transparent">
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body pb-5 px-sm-5 pt-50">
                    <div class="text-center mb-2">
                        <h1 class="mb-1">Tambah Surat Kosong</h1>
                    </div>
                    <form id="editUserForm" class="row gy-1 pt-75" method="POST" action="/surat/printsurat"
                        enctype="multipart/form-data" onsubmit="myFunction()">
                        @csrf
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="nomor_surat">No Surat Keluar</label>
                            <input type="text" id="nomor_surat" name="nomor_surat" class="form-control "
                                placeholder="No Surat Keluar" value="{{ $nomor_surat }}"
                                data-msg="Please enter your first name" />
                        </div>
                        <div class="col-12 col-md-6 position-relative">
                            <label class="form-label" for="tanggal_buat">Tanggal Surat Keluar</label>
                            <input type="text" id="tanggal_buat" name="tanggal_buat" class="form-control flatpickr-basic"
                                placeholder="Tanggal Surat Keluar" value="" data-msg="Please enter your last name" />
                        </div>
                        {{-- <div class="col-12">
                            <label class="form-label" for="tertanda">Instansi</label>
                            <input type="text" id="tertanda" name="tertanda" class="form-control" value=""
                                placeholder="Nama Instansi" />
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="perihal">Perihal</label>
                            <textarea name="perihal" id="perihal" class="form-control" placeholder="Perihal"></textarea>
                        </div>
                        <div class="col-12 col-md-6">
                            <label class="form-label" for="keterangan">Keterangan</label>
                            <textarea name="keterangan" id="keterangan" class="form-control" placeholder="Keterangan..."></textarea>
                        </div>
                        <div class="col-12">
                            <label class="form-label" for="dokumen">Dokumen</label>
                            <input type="file" id="dokumen" name="dokumen" class="form-control"
                                placeholder="lampiran dokumen" value="" />
                        </div> --}}
                        <div class="col-12 text-center mt-2 pt-50">
                            <button type="submit" class="btn btn-success me-1">Simpan</button>
                            <button type="reset" class="btn btn-outline-secondary" data-bs-dismiss="modal"
                                aria-label="Close">
                                Batal
                            </button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!--/ Tambah Surat Modal -->


    <!-- BEGIN: Customizer-->
    <div class="customizer d-none d-md-block"><a
            class="customizer-toggle d-flex align-items-center justify-content-center" href="#"><i class="spinner"
                data-feather="settings"></i></a>
        <div class="customizer-content">
            <!-- Customizer header -->
            <div class="customizer-header px-2 pt-1 pb-0 position-relative">
                <h4 class="mb-0">Theme Customizer</h4>
                <p class="m-0">Customize & Preview in Real Time</p>

                <a class="customizer-close" href="#"><i data-feather="x"></i></a>
            </div>

            <hr />

            <!-- Styling & Text Direction -->
            <div class="customizer-styling-direction px-2">
                <p class="fw-bold">Skin</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="skinlight" name="skinradio" class="form-check-input layout-name"
                            checked data-layout="" />
                        <label class="form-check-label" for="skinlight">Light</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="skinbordered" name="skinradio" class="form-check-input layout-name"
                            data-layout="bordered-layout" />
                        <label class="form-check-label" for="skinbordered">Bordered</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="skindark" name="skinradio" class="form-check-input layout-name"
                            data-layout="dark-layout" />
                        <label class="form-check-label" for="skindark">Dark</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="skinsemidark" name="skinradio" class="form-check-input layout-name"
                            data-layout="semi-dark-layout" />
                        <label class="form-check-label" for="skinsemidark">Semi Dark</label>
                    </div>
                </div>
            </div>

            <hr />

            <!-- Menu -->
            <div class="customizer-menu px-2">
                <div id="customizer-menu-collapsible" class="d-flex">
                    <p class="fw-bold me-auto m-0">Menu Collapsed</p>
                    <div class="form-check form-check-primary form-switch">
                        <input type="checkbox" class="form-check-input" id="collapse-sidebar-switch" />
                        <label class="form-check-label" for="collapse-sidebar-switch"></label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Layout Width -->
            <div class="customizer-footer px-2">
                <p class="fw-bold">Layout Width</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="layout-width-full" name="layoutWidth" class="form-check-input"
                            checked />
                        <label class="form-check-label" for="layout-width-full">Full Width</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="layout-width-boxed" name="layoutWidth" class="form-check-input" />
                        <label class="form-check-label" for="layout-width-boxed">Boxed</label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Navbar -->
            <div class="customizer-navbar px-2">
                <div id="customizer-navbar-colors">
                    <p class="fw-bold">Navbar Color</p>
                    <ul class="list-inline unstyled-list">
                        <li class="color-box bg-white border selected" data-navbar-default=""></li>
                        <li class="color-box bg-primary" data-navbar-color="bg-primary"></li>
                        <li class="color-box bg-secondary" data-navbar-color="bg-secondary"></li>
                        <li class="color-box bg-success" data-navbar-color="bg-success"></li>
                        <li class="color-box bg-danger" data-navbar-color="bg-danger"></li>
                        <li class="color-box bg-info" data-navbar-color="bg-info"></li>
                        <li class="color-box bg-warning" data-navbar-color="bg-warning"></li>
                        <li class="color-box bg-dark" data-navbar-color="bg-dark"></li>
                    </ul>
                </div>

                <p class="navbar-type-text fw-bold">Navbar Type</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="nav-type-floating" name="navType" class="form-check-input" checked />
                        <label class="form-check-label" for="nav-type-floating">Floating</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="nav-type-sticky" name="navType" class="form-check-input" />
                        <label class="form-check-label" for="nav-type-sticky">Sticky</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="nav-type-static" name="navType" class="form-check-input" />
                        <label class="form-check-label" for="nav-type-static">Static</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" id="nav-type-hidden" name="navType" class="form-check-input" />
                        <label class="form-check-label" for="nav-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
            <hr />

            <!-- Footer -->
            <div class="customizer-footer px-2">
                <p class="fw-bold">Footer Type</p>
                <div class="d-flex">
                    <div class="form-check me-1">
                        <input type="radio" id="footer-type-sticky" name="footerType" class="form-check-input" />
                        <label class="form-check-label" for="footer-type-sticky">Sticky</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="footer-type-static" name="footerType" class="form-check-input"
                            checked />
                        <label class="form-check-label" for="footer-type-static">Static</label>
                    </div>
                    <div class="form-check me-1">
                        <input type="radio" id="footer-type-hidden" name="footerType" class="form-check-input" />
                        <label class="form-check-label" for="footer-type-hidden">Hidden</label>
                    </div>
                </div>
            </div>
        </div>

    </div>
    <!-- End: Customizer-->
    <script>
        function myFunction() {
            alert("Data Telah Ditambahkan!");
        }
    </script>
@endsection
