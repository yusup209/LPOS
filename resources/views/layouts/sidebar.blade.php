<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <!-- Brand Logo -->
    <a href="" class="brand-link">
        <img src="{{ asset('assets/adminlte3/dist/img/AdminLTELogo.png') }}" alt="AdminLTE Logo" class="brand-image img-circle elevation-3" style="opacity: .8">
        <span class="brand-text font-weight-light">{{ config('app.name', 'Laravel') }}</span>
    </a>

    <!-- Sidebar -->
    <div class="sidebar">
        <!-- Sidebar user panel (optional) -->
        <div class="user-panel mt-3 pb-3 mb-3 d-flex">
            <div class="image">
                <img src="{{ asset('assets/adminlte3/dist/img/user2-160x160.jpg') }}" class="img-circle elevation-2" alt="User Image">
            </div>
            <div class="info">
                <a href="#" class="d-block">{{ Auth::user()->nama }}</a>
                <span class="badge badge-info">{{ Auth::user()->hak_akses }}</span>
            </div>
        </div>

        <!-- Sidebar Menu -->
        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <!-- Add icons to the links using the .nav-icon class with font-awesome or any other icon font library -->
                @if(Auth::user()->hak_akses =='superadmin')
                <li class="nav-item">
                    <a href="{{ route('home') }}" class="nav-link active">
                        <i class="nav-icon fas fa-tachometer-alt"></i>
                        <p>
                            Dashboard
                        </p>
                    </a>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-database"></i>
                        <p>
                            Master Data
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('informasiToko.index') }}" class="nav-link">
                                <i class="fas fa-info-circle nav-icon"></i>
                                <p>Informasi Toko</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('daftarUser.index') }}" class="nav-link">
                                <i class="fas fa-users nav-icon"></i>
                                <p>Daftar User</p>
                            </a>
                        </li>
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-clipboard"></i>
                        <p>
                            Inventori
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('master_produk.index') }}" class="nav-link">
                                <i class="fas fa-box nav-icon"></i>
                                <p>Master Produk</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('produk_kosong.index') }}" class="nav-link">
                                <i class="fas fa-clipboard-check nav-icon"></i>
                                <p>Data Produk Kosong</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">
                            <a href="pages/layout/top-nav.html" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Bahan-bahan</p>
                            </a>
                        </li>--}}
                    </ul>
                </li>
                <li class="nav-item has-treeview">
                    <a href="#" class="nav-link">
                        <i class="nav-icon fas fa-copy"></i>
                        <p>
                            Master Konfigurasi
                            <i class="fas fa-angle-left right"></i>
                        </p>
                    </a>
                    <ul class="nav nav-treeview">
                        <li class="nav-item">
                            <a href="{{ route('kurs.index') }}" class="nav-link">
                                <i class="fas fa-dollar-sign nav-icon"></i>
                                <p>Kurs</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('kategori.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Kategori</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('unit.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Unit</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('persen_keuntungan.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Persen Keuntungan</p>
                            </a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('master_minimum.index') }}" class="nav-link">
                                <i class="far fa-circle nav-icon"></i>
                                <p>Stok Min. & PPN</p>
                            </a>
                        </li>
                        {{--<li class="nav-item">
                            <a href="{{ route('master_bahan.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Bahan</p>
                        </a>
                </li>--}}

            </ul>
            <li class="nav-item">
                <a href="{{ route('laporan_transaksi.index') }}" class="nav-link">
                    <i class="far fa-circle nav-icon"></i>
                    <p>Laporan Transaksi</p>
                </a>
            </li>
            </li>
            <ul class="nav nav-treeview">
                <li class="nav-item">
                    <a href="{{ route('kurs.index') }}" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kurs</p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="pages/layout/top-nav.html" class="nav-link">
                        <i class="far fa-circle nav-icon"></i>
                        <p>Kategori</p>
                    </a>
                </li>
            </ul>
            @elseif(Auth::user()->hak_akses =='kasir')
            <li class="nav-item">
                <a href="{{ route('home') }}" class="nav-link active">
                    <i class="nav-icon fas fa-tachometer-alt"></i>
                    <p>
                        Dashboard
                    </p>
                </a>
            </li>
            <li class="nav-item">
                <a href="{{ route('pos.index') }}" class="nav-link">
                    <i class="nav-icon fas fa-cash-register"></i>
                    <p>
                        Point Of Sales
                    </p>
                </a>
            </li>

            @elseif(Auth::user()->hak_akses =='admin_gudang')

            @endif
            </ul>
        </nav>
        <!-- /.sidebar-menu -->
    </div>
    <!-- /.sidebar -->
</aside>