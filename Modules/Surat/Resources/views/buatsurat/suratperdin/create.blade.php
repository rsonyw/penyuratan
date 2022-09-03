@extends('surat::layouts.main')

@section('content')
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper container-xxl p-0">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-start mb-0">Buat Surat</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="/surat">Home</a>
                                    </li>
                                    <li class="breadcrumb-item active">Buat Surat Perintah Dinas
                                    </li>
                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="content-body">
                <!-- Card Advance -->

                <div class="row match-height">
                    <!-- Payment Card -->
                    <div class="col-lg-12 col-md-12 col-12">
                        <div class="card card-payment">
                            <div class="card-header">
                                <h4 class="card-title">Surat Perintah Dinas</h4>
                            </div>
                            <div class="card-body">
                                <form action="/surat/suratperdin" method="POST" class="form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-12 position-relative">
                                            <div class="mb-2">
                                                <label class="form-label" for="tgl_suratperdin">Tanggal Buat</label>
                                                <input type="text" id="tgl_suratperdin" name="tgl_suratperdin"
                                                    class="form-control flatpickr-basic" placeholder="18 June, 2020" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="no_suratperdin">Nomor Surat</label>
                                                <input type="text" id="no_suratperdin" name="no_suratperdin"
                                                    class="form-control" placeholder="SPD No.028/A/SWB-SPD/VII/20222" />
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="dasar">Dasar</label>
                                                <input type="text" id="dasar" name="dasar" class="form-control"
                                                    placeholder="Penting">
                                                </input>

                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="nama">Diperintahkan kepada :
                                                </label><br>
                                                <label class="form-label" for="nama">Nama/NIK
                                                </label>
                                                <select class="form-select" id="nama" name="nama">
                                                    <option>-Pilih-</option>
                                                    <option value="Supriadi Jufri">Supriadi Jufri</option>
                                                    <option value="Aminudin">Aminudin</option>
                                                    <option value="Ivan Fadilla">Ivan Fadilla</option>
                                                </select>
                                                <label class="form-label" for="jabatan">Jabatan
                                                </label>
                                                <select class="form-select" id="jabatan">
                                                    <option>-Pilih-</option>
                                                    <option value="Direktur Utama">Direktur Utama</option>
                                                    <option value="Direktur Umum dan Keuangan">Direktur Umum dan
                                                        Keuangan
                                                    </option>
                                                    <option value="Direktur Operasional">Direktur Operasional</option>
                                                </select>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="untuk">Untuk</label>
                                                <input type="text" id="untuk" name="untuk" class="form-control"
                                                    placeholder="Untuk...">
                                                </input>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="waktu">Waktu Pelaksanaan</label>
                                                <input type="text" id="waktu" name="waktu"
                                                    class="form-control flatpickr-range" placeholder="Dari... Sampai..." />
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="payment-input-name">Catatan</label>
                                                <p>1. Melaksanakan Perintah ini dengan seksama dan penuh rasa tanggung
                                                    jawab.</p>
                                                <p>2. Sebelum dan sesudah melaksanakan Perintah ini, agar melapor kepada
                                                    Direktur Umum & Keuangan. </p>
                                                <p>3. Pembebanan biaya ini sesuai dengan surat keputusan direksi </p>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="payment-input-name">Pengesahan Tujuan</label>
                                                <input type="text" id="payment-input-name" class="form-control"
                                                    placeholder="Pengesahan Tujuan">
                                                </input>
                                            </div>
                                        </div>
                                        {{-- <div class="col-sm-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="payment-expiry">Sifat</label>
                                                <input type="number" id="payment-expiry" class="form-control"
                                                    placeholder="MM / YY" />
                                            </div>
                                        </div>
                                        <div class="col-sm-6 col-12">
                                            <div class="mb-2">
                                                <label class="form-label" for="payment-cvv">CVV / CVC</label>
                                                <input type="number" id="payment-cvv" class="form-control"
                                                    placeholder="123" />
                                            </div>
                                        </div> --}}
                                        <div class="d-grid col-12">
                                            <button type="submit" class="btn btn-success">Buat Surat</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <!--/ Payment Card -->
                </div>

                <!--/ Card Advance -->

            </div>
        </div>
    </div>
    <!-- END: Content-->


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
        tinymce.init({
            selector: '#isi'
        })
    </script>
@endsection
