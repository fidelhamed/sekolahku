<div class="main-menu menu-fixed menu-dark menu-accordion menu-shadow navbar-expand-md" data-scroll-to-active="true">
    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto"><a class="navbar-brand" href="/home">
                <span class="brand-logo">
                    <div class="logo-container">
                        <img src="{{asset('Assets\Frontend\img\logo-ibs-a.png')}}" class="img-fluid" alt="logo">
                    </div>
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
                        @if (Auth::user()->muridDetail->jalur == 'Reguler' || Auth::user()->muridDetail->jalur == 'Internal')
                        <i data-feather="dollar-sign"></i>
                        <span class="menu-title text-truncate" data-i18n="Pendaftaran">Pembayaran</span>
                        @else
                        <i data-feather="award"></i>
                        <span class="menu-title text-truncate" data-i18n="Pendaftaran">Upload Prestasi</span>
                        @endif
                    @else
                    <i data-feather="clipboard"></i>
                    <span class="menu-title text-truncate" data-i18n="Pendaftaran">Pendaftaran</span>
                    @endif
                </a>
            </li>
            @elseif (Auth::user()->role == 'Terverifikasi')
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
                    <span class="menu-title text-truncate" data-i18n="Card">Calon Peserta Didik</span>
                </a>
                <ul class="menu-content">
                    @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')
                    
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'TKTQ') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=TKTQ') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">TKTQ</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'TKTQ-2') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=TKTQ-2') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">TKTQ 2</span>
                        </a>
                    </li>
                   
                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT')

                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'SD-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=SD-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SD IT</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'SD-IT-2') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=SD-IT-2') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SD IT 2</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SMP-IT')

                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'SMP-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=SMP-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMP IT</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SMA-IT')

                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'SMA-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=SMA-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMA IT</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'MA')
                    
                    <li class="nav-item {{ (request()->has('jenjangDataMurid') && request()->input('jenjangDataMurid') == 'MA') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-murid?jenjangDataMurid=MA') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">MA</span>
                        </a>
                    </li>

                    @endif
                </ul>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#"><i data-feather="info"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Informasi PPDB</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('ppdb/info-tes-ujian')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{url('ppdb/info-tes-ujian')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Observasi dan Wawancara</span>
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
                    @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')
                   
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'TKTQ') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=TKTQ') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">TKTQ</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'TKTQ-2') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=TKTQ-2') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">TKTQ 2</span>
                        </a>
                    </li>                    

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT')
                  
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'SD-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=SD-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SD IT</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'SD-IT-2') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=SD-IT-2') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SD IT 2</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SMP-IT')

                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'SMP-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=SMP-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMP IT</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SMA-IT')

                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'SMA-IT') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=SMA-IT') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">SMA IT</span>
                        </a>
                    </li>

                    @elseif (Auth::user()->userDetail->pj_jenjang == 'MA')
                   
                    <li class="nav-item {{ (request()->has('jenjangKelulusan') && request()->input('jenjangKelulusan') == 'MA') ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href="{{ url('ppdb/data-kelulusan?jenjangKelulusan=MA') }}"><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">MA</span>
                        </a>
                    </li>
 
                    @endif
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('ppdb/angket')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href="#"><i data-feather="file"></i>
                    <span class="menu-title text-truncate" data-i18n="Card">Angket</span>
                </a>
                <ul class="menu-content">
                    <li class="nav-item {{ (request()->is('ppdb/angket-pertanyaan')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{url('ppdb/angket-pertanyaan')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Angket</span>
                        </a>
                    </li>
                    <li class="nav-item {{ (request()->is('ppdb/angket-data')) ? 'active' : '' }}">
                        <a class="d-flex align-items-center" href=" {{route('angket-data.index')}} "><i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Basic">Data Angket</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class="nav-item {{ (request()->is('ppdb/rekap-laporan')) ? 'active' : '' }}">
                <a class="d-flex align-items-center" href=" {{url('ppdb/rekap-laporan')}} "><i data-feather="file-text"></i>
                    <span class="menu-item text-truncate" data-i18n="Basic">Rekap Laporan</span>
                </a>
            </li>

            @endif
        </ul>
    </div>
</div>
