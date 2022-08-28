    <!-- BEGIN: Main Menu-->
    <div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">
        <div class="navbar-header">
            <ul class="nav navbar-nav flex-row">
                <li class="nav-item me-auto"><a class="navbar-brand" href="/surat">
                        <img src="https://sayagawisatabogor.com/wp-content/uploads/2021/09/LOGO-SWB.png" width="20%"
                            alt="Logo Sayaga">
                        <h2 class="brand-text" style="color: darkgreen">Penyuratan</h2>
                    </a></li>
                <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pe-0" data-bs-toggle="collapse"><i
                            class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i
                            class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary"
                            data-feather="disc" data-ticon="disc"></i></a></li>
            </ul>
            </ul>
        </div>
        <div class="shadow-bottom"></div>
        <div class="main-menu-content">
            <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
                <li class="nav-item">
                    <a class="d-flex align-items-center" href="/surat"><i data-feather="home"></i><span
                            class="menu-title text-truncate" data-i18n="Dashboards">Dashboards</span></a>
                </li>
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Apps &amp; Pages</span><i
                        data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="file-text"></i><span class="menu-title text-truncate" data-i18n="Invoice">Buat
                            Surat</span></a>
                    <ul class="menu-content">
                        {{-- <li><a class="d-flex align-items-center" href="/surat/suratmasuk/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Surat Masuk</span></a>
                        </li> --}}
                        <li><a class="d-flex align-items-center" href="/surat/printsurat/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Surat Keluar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/printedaran/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Preview">Surat Edaran</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratperdin/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Edit">Surat Perjalanan Dinas</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/surattgskk/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Add">Surat Tugas Keluar
                                    Kantor</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratlembur/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Add">Surat Perintah Lembur</span></a>
                        </li>
                    </ul>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i
                            data-feather="inbox"></i><span class="menu-title text-truncate" data-i18n="Invoice">Arsip
                            Surat</span></a>
                    <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="/surat/suratmasuk"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Surat Masuk</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratkeluar"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Surat Keluar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratedaran"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Preview">Surat Edaran</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratperdin"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Edit">Surat Perjalanan Dinas</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/surattgskk"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Add">Surat Tugas Keluar
                                    Kantor</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratlembur"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Add">Surat Perintah Lembur</span></a>
                        </li>
                    </ul>
                </li>
                <li class="navigation-header"><span data-i18n="Apps &amp; Pages">Menu Tambahan</span><i
                        data-feather="more-horizontal"></i>
                </li>
                <li class=" nav-item"><a class="d-flex align-items-center" href="/surat/datapegawai"><i
                            data-feather="database"></i><span class="menu-title text-truncate"
                            data-i18n="Invoice">Data Pegawai SPD</span></a>
                    {{-- <ul class="menu-content">
                        <li><a class="d-flex align-items-center" href="/surat/printsurat/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="List">Surat Keluar</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/printedaran/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Preview">Surat Edaran</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratperdin/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Edit">Surat Perjalanan Dinas</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/surattgskk/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Add">Surat Tugas Keluar
                                    Kantor</span></a>
                        </li>
                        <li><a class="d-flex align-items-center" href="/surat/suratlembur/create"><i
                                    data-feather="circle"></i><span class="menu-item text-truncate"
                                    data-i18n="Add">Surat Perintah Lembur</span></a>
                        </li>
                    </ul> --}}
                </li>
            </ul>
        </div>
    </div>
    <!-- END: Main Menu-->
