<div id="header2" class="header4-area">
    <div class="header-top-area">
        <div class="container">
            <div class="row">
                <div class="col-lg-1 col-md-1 col-sm-1 col-xs-12">
                    <div class="header-top-left">
                        <div class="logo-area">
                            <img class="img-responsive" src="{{asset('Assets/Frontend/img/logo-ibs-a-min.png')}}" alt="logo">
                        </div>
                    </div>
                </div>
                <div class="col-lg-5 col-md-5 col-sm-5 col-xs-12">
                    <div class="text-seccondary">
                        <p><strong>PPDB Online SIT Ash-Shiddiiqi Jambi</strong></p>
                    </div>
                </div>
                <div class="col-lg-6 col-md-6 col-sm-6 col-xs-12">
                    <div class="header-top-right">
                        <ul>
                            <li>
                                @auth
                                    <a href="/home" class="apply-now-btn2">Home</a>
                                @else
                                    <a class="apply-now-btn2" href="{{route('login')}}">Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="main-menu-area bg-primary" id="sticker">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 col-md-10 col-sm-10 col-xs-12">
                    <nav id="desktop-nav">
                        <ul>
                            <li class="{{ (request()->is('/')) ? 'active' : '' }}"><a href="/">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href=" {{route('profile.sekolah')}} ">Profile Sekolah</a></li>
                                    <li><a href=" {{route('visimisi.sekolah')}} ">Visi dan Misi</a></li>
                                </ul>
                            </li>
                            
                            <li><a href="{{ url('ppdb/register') }}">Daftar</a>
                            <li><a href="#video-section">Video Tutorial</a></li>
                            
                            <li class="{{ (request()->is('berita')) ? 'active' : '' }}">
                                <a href=" {{route('berita')}} ">Berita</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area Start -->
<div class="mobile-menu-area">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="mobile-menu">
                    <nav id="dropdown">
                        <ul>
                            <li class="active"><a href="/">Beranda</a></li>
                            <li><a href="#">Tentang Kami</a>
                                <ul>
                                    <li><a href=" {{route('profile.sekolah')}} ">Profile Sekolah</a></li>
                                    <li><a href=" {{route('visimisi.sekolah')}} ">Visi dan Misi</a></li>
                                </ul>
                            </li>

                            <li class="{{ (request()->is('berita')) ? 'active' : '' }}"><a href=" {{route('berita')}} ">Berita</a></li>

                            <li><a href="{{ url('ppdb/register') }}">Daftar</a>
                            <li><a href="#video-section">Video Tutorial</a></li>

                            <li>
                                @auth
                                    <a href="/home">{{Auth::user()->name}}</a>
                                @else
                                    <a href=" {{route('login')}} ">Masuk</a>
                                @endauth
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</div>
<!-- Mobile Menu Area End -->
