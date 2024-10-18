<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow navbar-expand-md" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/home">
                <span class="brand-logo">
                    <div class="logo-container">
                        <img src="{{asset('Assets\Frontend\img\logo-ibs-a.png')}}" class="img-fluid" alt="logo">
                    </div>
                        {{-- <svg viewbox="0 0 139 95" version="1.1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" height="24">
                            <defs>
                                <lineargradient id="linearGradient-1" x1="100%" y1="10.5120544%" x2="50%" y2="89.4879456%">
                                    <stop stop-color="#000000" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                                <lineargradient id="linearGradient-2" x1="64.0437835%" y1="46.3276743%" x2="37.373316%" y2="100%">
                                    <stop stop-color="#EEEEEE" stop-opacity="0" offset="0%"></stop>
                                    <stop stop-color="#FFFFFF" offset="100%"></stop>
                                </lineargradient>
                            </defs>
                            <g id="Page-1" stroke="none" stroke-width="1" fill="none" fill-rule="evenodd">
                                <g id="Artboard" transform="translate(-400.000000, -178.000000)">
                                    <g id="Group" transform="translate(400.000000, 178.000000)">
                                        <path class="text-primary" id="Path" d="M-5.68434189e-14,2.84217094e-14 L39.1816085,2.84217094e-14 L69.3453773,32.2519224 L101.428699,2.84217094e-14 L138.784583,2.84217094e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L6.71554594,44.4188507 C2.46876683,39.9813776 0.345377275,35.1089553 0.345377275,29.8015838 C0.345377275,24.4942122 0.230251516,14.560351 -5.68434189e-14,2.84217094e-14 Z" style="fill:currentColor"></path>
                                        <path id="Path1" d="M69.3453773,32.2519224 L101.428699,1.42108547e-14 L138.784583,1.42108547e-14 L138.784199,29.8015838 C137.958931,37.3510206 135.784352,42.5567762 132.260463,45.4188507 C128.736573,48.2809251 112.33867,64.5239941 83.0667527,94.1480575 L56.2750821,94.1480575 L32.8435758,70.5039241 L69.3453773,32.2519224 Z" fill="url(#linearGradient-1)" opacity="0.2"></path>
                                        <polygon id="Path-2" fill="#000000" opacity="0.049999997" points="69.3922914 32.4202615 32.8435758 70.5039241 54.0490008 16.1851325"></polygon>
                                        <polygon id="Path-21" fill="#000000" opacity="0.099999994" points="69.3922914 32.4202615 32.8435758 70.5039241 58.3683556 20.7402338"></polygon>
                                        <polygon id="Path-3" fill="url(#linearGradient-2)" opacity="0.099999994" points="101.428699 0 83.0667527 94.1480575 130.378721 47.0740288"></polygon>
                                    </g>
                                </g>
                            </g>
                        </svg> --}}
                    </span>
                    <h2 class="brand-text">PPDB</h2>
                </a></li>
            <li class="nav-item nav-toggle"><a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse"><i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i><i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i></a></li>
        </ul>
    </div>
    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            <li class=" nav-item {{ (request()->is('home')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="/home"><i data-feather="home"></i>
                    <span class="menu-title text-truncate" data-i18n="Dashboards">Dashboard</span>
                </a>
            </li>

            {{-- MENU ADMIN --}}
            @if (Auth::user()->role == 'Admin')
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="credit-card"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Website</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('backend-imageslider')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-imageslider.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Gambar Slider</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-about')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-about.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">About</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-video')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-video.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Video</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-kategori-berita')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-kategori-berita.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Kategori Berita</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-berita')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-berita.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Berita</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-event')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-event.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Event</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-footer')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-footer.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Footer</span>
                        </a>
                    </li>
                    <li><a class="d-flex align-items-center" href="#"><i data-feather="circle"></i><span class="menu-item text-truncate" data-i18n="Second Level">Tentang</span></a>
                        <ul class="menu-content">
                            <li class="nav-item {{ (request()->is('backend-profile-sekolah')) ? 'active' : '' }}">
                                <a class="d-flex align-items-center" href="{{route('backend-profile-sekolah.index')}}"><span class="menu-item text-truncate" data-i18n="Third Level">Profile Sekolah</span></a>
                            </li>
                            <li class="nav-item {{ (request()->is('backend-visimisi')) ? 'active' : '' }}">
                                <a class="d-flex align-items-center" href="{{route('backend-visimisi.index')}}"><span class="menu-item text-truncate" data-i18n="Third Level">Visi dan Misi</span></a>
                            </li>
                        </ul>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Pengguna</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('backend-pengguna-murid')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-murid.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Calon Murid</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('backend-pengguna-ppdb')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('backend-pengguna-ppdb.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Admin PPDB</span>
                        </a>
                    </li>
                </ul>
            </li>

            {{-- MENU GUEST --}}
            @elseif(Auth::user()->role == 'Guest')
            <li class="nav-item {{ (request()->is('ppdb/payment-pendaftaran/'. Auth::user()->paymentRegis->id,'ppdb/form-pendaftaran','ppdb/form-data-orangtua','ppdb/form-berkas')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('ppdb.form-pendaftaran')}}">
                    @if (Auth::user()->paymentRegis->status == 'Unpaid')
                    <i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Pendaftaran">Pembayaran</span>
                    @else
                    <i data-feather="clipboard"></i>
                    <span class="menu-title text-truncate" data-i18n="Pendaftaran">Pendaftaran</span>
                    @endif
                </a>
            </li>
            @elseif (Auth::user()->role == 'Lulus')
            <li class="nav-item {{ (request()->is('ppdb/show-angket-form')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="{{route('ppdb.show-angket-form')}}">
                    <i data-feather="file"></i>
                    <span class="menu-title text-truncate" data-i18n="Pendaftaran">Angket</span>
                </a>
            </li>            

            {{-- MENU PPDB --}}
            @elseif(Auth::user()->role == 'PPDB')
            <li class="nav-item {{ (request()->is('ppdb/periode-registrasi')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{url('ppdb/periode-registrasi')}} "><i data-feather="clock"></i>
                    <span class="menu-item text-truncate" data-i18n="Basic">Periode Registrasi</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('ppdb/data-murid*') && !request()->has('jenjangDataMurid')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="#"><i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Calon Murid</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'SMP-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=SMP-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMP-IT</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'SMA-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=SMA-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMA-IT</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'MA') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=MA') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">MA</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="info"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Informasi PPDB</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('ppdb/info-tes-ujian')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{url('ppdb/info-tes-ujian')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Tes dan Ujian</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('ppdb/info-daftar-ulang')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{url('ppdb/info-daftar-ulang')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Daftar Ulang</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('ppdb/data-kelulusan*') && !request()->has('jenjangKelulusan')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="#"><i data-feather="users"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Kelulusan</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'SMP-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=SMP-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMP-IT</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'SMA-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=SMA-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMA-IT</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'MA') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=MA') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">MA</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('ppdb/angket')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{url('ppdb/angket')}} "><i data-feather="file"></i>
                    <span class="menu-item text-truncate" data-i18n="Basic">Angket</span>
                </a>
            </li>
            <li class="nav-item {{ (request()->is('ppdb/rekap-laporan')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{url('ppdb/rekap-laporan')}} "><i data-feather="file-text"></i>
                    <span class="menu-item text-truncate" data-i18n="Basic">Rekap Laporan</span>
                </a>
            </li>
            
            {{-- MENU MURID
            @elseif(Auth::user()->role == 'Murid')
              <li class="nav-item {{ (request()->is('murid/perpustakaan')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{route('perpustakaan.index')}} "><i data-feather="book"></i>
                    <span class="menu-title text-truncate" data-i18n="Books">Perpustakaan</span>
                </a>
              </li>
              <li class="nav-item {{ (request()->is('murid/pembayaran')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{route('pembayaran.index')}} "><i data-feather="dollar-sign"></i>
                    <span class="menu-title text-truncate" data-i18n="Books">Pembayaran</span>
                </a>
              </li> --}}

            @endif
        </ul>
    </div>
</div>
