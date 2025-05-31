<!DOCTYPE html>
<html class="loading semi-dark-layout" lang="en" data-layout="semi-dark-layout" data-textdirection="ltr">
<!-- BEGIN: Head-->

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <meta name="description" content="Sekolahku adalah aplikasi manajemen sekolah berbasis website yang di bangun dan di kembangkan dengan Framework Laravel">
    <meta name="keywords" content="">
    <meta name="author" content="Andri Desmana">
    <title>Register Page - PPDB Online</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600" rel="stylesheet">
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('Assets/Frontend/img/logo-ibs-a.png') }}">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/vendors/css/vendors.min.css')}}">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/bootstrap.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/bootstrap-extended.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/colors.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/components.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/dark-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/bordered-layout.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/themes/semi-dark-layout.css')}}">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/core/menu/menu-types/vertical-menu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/plugins/forms/form-validation.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('Assets/Backend/css/pages/page-auth.css')}}">
    <!-- END: Page CSS-->

    <style>  
        #countdown-container {  
            background-color: #f8f9fa;  
            border-radius: 8px;  
            padding: 15px;  
            box-shadow: 0 2px 4px rgba(0,0,0,0.1);  
        }  
        #countdown-container span {  
            font-weight: bold;  
            color: #28a745;  
        }
    </style>
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern blank-page navbar-floating footer-static  " data-open="click" data-menu="vertical-menu-modern" data-col="blank-page">
    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
            </div>
            <div class="content-body">
                <div class="auth-wrapper auth-v2">
                    <div class="auth-inner row m-0">
                        <!-- Brand logo-->
                        <a class="brand-logo" href="/home">
                            <img src="{{asset('Assets\Frontend\img\logo-ibs-a.png')}}" class="img-fluid" alt="logo" style="max-height: 30px;">
                            <h2 class="brand-text text-primary ml-1">PPDB Online</h2>
                        </a>
                        <!-- /Brand logo-->
                        <!-- Left Text-->
                        <div class="d-none d-lg-flex col-lg-8 align-items-center p-5">
                            <div class="w-100 d-lg-flex align-items-center justify-content-center"><img class="img-fluid" src="{{asset('Assets\Backend\images\BANNER_LUAR_PPDB_2025.jpg')}}" alt="Login V2" /></div>
                            <!--<div class="row">-->
                            <!--    <div class="col-md-12">-->
                            <!--        <h4>Silahkan hubungi kontak admin berikut untuk informasi lebih lanjut :</h4>-->
                            <!--        @foreach ($admins as $admin)-->
                            <!--        <ul class="list-group">-->
                            <!--            <li class="list-group-item">+62{{ $admin->nip }} (<span class="font-weight-bold">{{ $admin->pj_jenjang }}</span>)</li>-->
                            <!--        </ul>-->
                            <!--        @endforeach-->
                            <!--    </div>-->
                            <!--</div>-->
                        </div>
                        <!-- /Left Text-->
                        <!-- Login-->
                        <div class="d-flex col-lg-4 align-items-center auth-bg px-2 p-lg-5">
                            <div class="col-12 col-sm-8 col-md-6 col-lg-12 px-xl-2 mx-auto">
                                @if($message = Session::get('error'))
                                    <div class="alert alert-danger" role="alert">
                                        <div class="alert-body">
                                            <strong>{{ $message }}</strong>
                                            <button type="button" class="close" data-dismiss="alert">×</button>
                                        </div>
                                    </div>
                                @endif
                                <h2 class="card-title font-weight-bold mb-1">Registrasi PPDB Online</h2>
                                <p class="card-text mb-2">Silahkan lakukan registrasi akun baru</p>
                                
                                <!-- Tambahkan div countdown -->  
                                <div id="countdown-container" class="alert alert-info mb-2" style="display: none;">  
                                    <h4 class="text-center mb-1">Pendaftaran akan dibuka dalam:</h4>  
                                    <div class="d-flex justify-content-center">  
                                        <div class="text-center mx-2">  
                                            <span id="days" class="h3">00</span>  
                                            <p class="mb-0">Hari</p>  
                                        </div>  
                                        <div class="text-center mx-2">  
                                            <span id="hours" class="h3">00</span>  
                                            <p class="mb-0">Jam</p>  
                                        </div>  
                                        <div class="text-center mx-2">  
                                            <span id="minutes" class="h3">00</span>  
                                            <p class="mb-0">Menit</p>  
                                        </div>  
                                        <div class="text-center mx-2">  
                                            <span id="seconds" class="h3">00</span>  
                                            <p class="mb-0">Detik</p>  
                                        </div>  
                                    </div>  
                                </div>

                                <div id="registration-form-container">
                                    <?php
                                    // Variabel untuk mengatur mode maintenance
                                    $maintenance_mode = false; // Ubah menjadi false untuk menonaktifkan mode maintenance

                                    // Jika mode maintenance aktif, tampilkan pesan dan tutup form registrasi
                                    if ($maintenance_mode) {
                                    ?>
                                    <div class="card">
                                        <div class="card-body text-center">
                                            <div class="avatar avatar-xl bg-danger shadow mb-1">
                                                <div class="avatar-content">
                                                    <i data-feather="alert-octagon" class="font-large-1"></i>
                                                </div>
                                            </div>
                                            <div class="text-center">
                                                <h1 class="text-danger">Under Maintenance</h1>
                                                <p>Maaf, saat ini sistem sedang dalam pemeliharaan.</p>
                                                <p>Silakan coba beberapa saat lagi.</p>
                                            </div>
                                        </div>
                                    </div>                                    
                                    <?php
                                    } else {
                                    ?>
                                    <form class="auth-login-form mt-2" action="{{route('register.store')}}" method="POST">
                                        @csrf
                                        <div class="form-group">
                                            <label class="form-label">Nama Lengkap Calon Pesrta Didik</label>
                                            <input class="form-control @error('name') is-invalid @enderror" type="text" name="name" value="{{old('name')}}" placeholder="Masukan Nama Lengkap Calon Peserta Didik" autofocus="" tabindex="1" />
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <!--<div class="form-group">-->
                                        <!--    <label class="form-label">Nomor Induk Kependudukan</label>-->
                                        <!--    <input class="form-control @error('nik') is-invalid @enderror" type="number" name="nik" value="{{old('nik')}}" placeholder="Masukan NIK" autofocus="" tabindex="1" />-->
                                        <!--    @error('nik')-->
                                        <!--        <span class="invalid-feedback" role="alert">-->
                                        <!--            <strong>{{ $message }}</strong>-->
                                        <!--        </span>-->
                                        <!--    @enderror-->
                                        <!--</div>-->
                                        <div class="form-group">
                                            <label class="form-label">Email</label>
                                            <input class="form-control @error('email') is-invalid @enderror" type="email" name="email" value="{{old('email')}}" placeholder="Masukan Email" autofocus="" tabindex="1" />
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label" for="whatsapp">No Whatsapp</label>
                                            <div class="input-group">
                                                <span class="input-group-text" id="basic-addon1">+62</span>
                                                <input 
                                                    id="whatsapp" 
                                                    class="form-control @error('whatsapp') is-invalid @enderror" 
                                                    type="number" 
                                                    name="whatsapp" 
                                                    value="{{ old('whatsapp') }}" 
                                                    placeholder="Contoh: 822xxxxxxxx" 
                                                    autofocus 
                                                    tabindex="1" 
                                                />
                                            </div>
                                            @error('whatsapp')
                                                <div class="invalid-feedback">
                                                    <strong>{{ $message }}</strong>
                                                </div>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nama Sekolah Asal</label>
                                            <input class="form-control @error('nama_sekolah_asal') is-invalid @enderror" type="text" name="nama_sekolah_asal" value="{{old('nama_sekolah_asal')}}" placeholder="Masukan Nama Asal Sekolah" autofocus="" tabindex="1" />
                                            @error('nama_sekolah_asal')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Jenjang Pendaftaran</label>
                                            <select name="jenjangJalur" class="form-control">
                                                <option value="">-- Pilih --</option>
                                                @if ($periodeTKTQReguler > 0)
                                                <option value="TKTQ;Reguler">TKTQ - Reguler</option>
                                                @else
                                                <option value="" disabled style="color: red;">TKTQ - Reguler(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeTKTQPrestasi > 0)
                                                <option value="TKTQ;Prestasi">TKTQ - Prestasi</option>
                                                @else
                                                <option value="" disabled style="color: red;">TKTQ - Prestasi(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeTKTQ2Reguler > 0)
                                                <option value="TKTQ-2;Reguler">TKTQ 2 - Reguler</option>                                                
                                                @else
                                                <option value=""  disabled style="color: red;">TKTQ 2 - Reguler(Pendaftaran Ditutup)</option>                                                
                                                @endif      

                                                @if ($periodeTKTQ2Prestasi > 0)
                                                <option value="TKTQ-2;Prestasi">TKTQ 2 - Prestasi</option>                                                
                                                @else
                                                <option value=""  disabled style="color: red;">TKTQ 2 - Prestasi(Pendaftaran Ditutup)</option>                                                
                                                @endif      

                                                @if ($periodeSDITReguler > 0)
                                                <option value="SD-IT;Reguler">SD IT - Reguler</option>                                                
                                                @else
                                                <option value="" disabled style="color: red;">SD IT - Reguler(Pendaftaran Ditutup)</option>
                                                @endif     

                                                @if ($periodeSDITPrestasi > 0)
                                                <option value="SD-IT;Prestasi">SD IT - Prestasi</option>                                                
                                                @else
                                                <option value="" disabled style="color: red;">SD IT - Prestasi(Pendaftaran Ditutup)</option>
                                                @endif     

                                                @if ($periodeSDIT2Reguler > 0)
                                                <option value="SD-IT-2;Reguler">SD IT 2 - Reguler</option>                                                
                                                @else
                                                <option value="" disabled style="color: red;">SD IT 2 - Reguler(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeSDIT2Prestasi > 0)
                                                <option value="SD-IT-2;Prestasi">SD IT 2 - Prestasi</option>                                                
                                                @else
                                                <option value="" disabled style="color: red;">SD IT 2 - Prestasi(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeSMPITReguler > 0)
                                                <option value="SMP-IT;Reguler">SMP IT - Reguler</option>                                                
                                                @else
                                                <option value="" disabled style="color: red;">SMP IT - Reguler(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeSMPITPrestasi > 0)
                                                <option value="SMP-IT;Prestasi">SMP IT - Prestasi</option>                                                
                                                @else
                                                <option value="" disabled style="color: red;">SMP IT - Prestasi(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeSMAITReguler > 0)
                                                <option value="SMA-IT;Reguler">SMA IT - Reguler</option>
                                                @else
                                                <option value="" disabled style="color: red;">SMA IT - Reguler(Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeSMAITPrestasi > 0)
                                                <option value="SMA-IT;Prestasi">SMA IT - Prestasi</option>
                                                @else
                                                <option value="" disabled style="color: red;">SMA IT - Prestasi (Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeMAReguler > 0)
                                                <option value="MA;Reguler">MA - Reguler</option>
                                                @else
                                                <option value="" disabled style="color: red;">MA - Reguler (Pendaftaran Ditutup)</option>
                                                @endif

                                                @if ($periodeMAPrestasi > 0)
                                                <option value="MA;Prestasi">MA - Prestasi</option>
                                                @else
                                                <option value="" disabled style="color: red;">MA - Prestasi (Pendaftaran Ditutup)</option>
                                                @endif
                                            </select>
                                            {{-- <small class="text-warning">Jika opsi tidak tersedia, maka periode telah ditutup.</small> --}}
                                            @error('jenjang')
                                                <span class="text-danger" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input class="form-control form-control-merge @error('password') is-invalid @enderror" type="password" name="password" placeholder="············" tabindex="2" />
                                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                                @error('password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Password Konfirmasi</label>
                                            <div class="input-group input-group-merge form-password-toggle">
                                                <input class="form-control form-control-merge @error('confirm_password') is-invalid @enderror" type="password" name="confirm_password" placeholder="Masukkan ulang password" tabindex="2" />
                                                <div class="input-group-append"><span class="input-group-text cursor-pointer"><i data-feather="eye"></i></span></div>
                                                @error('confirm_password')
                                                    <span class="invalid-feedback" role="alert">
                                                        <strong>{{ $message }}</strong>
                                                    </span>
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox">
                                                <input class="custom-control-input" id="remember-me" type="checkbox" tabindex="3" />
                                                <label class="custom-control-label" for="remember-me"> Remember Me</label>
                                            </div>
                                        </div>
                                        <button class="btn btn-success btn-block" tabindex="4">Daftar</button>
                                    </form>
                                    <div>
                                        <p class="card-text mt-1">Sudah punya akun? <a class="font-weight-bold" href="{{ url('login') }}">Login</a></p>
                                    </div>
                                    <?php
                                    }
                                    ?>
                                </div>
                            </div>
                        </div>
                        <!-- /Login-->
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- END: Content-->

    <!-- BEGIN: Vendor JS-->
    <script src="{{asset('Assets/Backend/vendors/js/vendors.min.js')}}"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="{{asset('Assets/Backend/vendors/js/forms/validation/jquery.validate.min.js')}}"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="{{asset('Assets/Backend/js/core/app-menu.js')}}"></script>
    <script src="{{asset('Assets/Backend/js/core/app.js')}}"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="{{asset('Assets/Backend/js/scripts/pages/page-auth-login.js')}}"></script>
    <!-- END: Page JS-->

    <script>
        $(window).on('load', function() {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        })
    </script>
    <script>  
    // Fungsi untuk menghitung countdown  
    function updateCountdown(targetDate) {  
        const now = new Date().getTime();  
        const distance = targetDate - now;  
    
        const days = Math.floor(distance / (1000 * 60 * 60 * 24));  
        const hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));  
        const minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));  
        const seconds = Math.floor((distance % (1000 * 60)) / 1000);  
    
        document.getElementById("days").innerHTML = days.toString().padStart(2, '0');  
        document.getElementById("hours").innerHTML = hours.toString().padStart(2, '0');  
        document.getElementById("minutes").innerHTML = minutes.toString().padStart(2, '0');  
        document.getElementById("seconds").innerHTML = seconds.toString().padStart(2, '0');  
    
        return distance;  
    }  
    
    // Fungsi untuk mengecek apakah ada jenjang yang tersedia  
    function checkAvailableJenjang() {
        const periodeTKTQReguler = {{ $periodeTKTQReguler ?? 0 }};  
        const periodeTKTQ2Reguler = {{ $periodeTKTQ2Reguler ?? 0 }};
        const periodeSDITReguler = {{ $periodeSDITReguler ?? 0 }};  
        const periodeSDIT2Reguler = {{ $periodeSDIT2Reguler ?? 0 }};
        const periodeSMPITReguler = {{ $periodeSMPITReguler ?? 0 }};  
        const periodeSMAITReguler = {{ $periodeSMAITReguler ?? 0 }};  
        const periodeMAReguler = {{ $periodeMAReguler ?? 0 }};  
        const periodeTKTQPrestasi = {{ $periodeTKTQPrestasi ?? 0 }};  
        const periodeTKTQ2Prestasi = {{ $periodeTKTQ2Prestasi ?? 0 }};
        const periodeSDITPrestasi = {{ $periodeSDITPrestasi ?? 0 }};  
        const periodeSDIT2Prestasi = {{ $periodeSDIT2Prestasi ?? 0 }};
        const periodeSMPITPrestasi = {{ $periodeSMPITPrestasi ?? 0 }};  
        const periodeSMAITPrestasi = {{ $periodeSMAITPrestasi ?? 0 }};  
        const periodeMAPrestasi = {{ $periodeMAPrestasi ?? 0 }};
    
        // Jika semua periode 0, tampilkan countdown dan sembunyikan form
        if (periodeTKTQReguler === 0 && periodeTKTQ2Reguler === 0 && periodeSDITReguler === 0 && periodeSDIT2Reguler === 0 && periodeSMPITReguler === 0 && periodeSMAITReguler === 0 && periodeMAReguler === 0 && periodeTKTQPrestasi === 0 && periodeTKTQ2Prestasi === 0 && periodeSDITPrestasi === 0 && periodeSDIT2Prestasi === 0 && periodeSMPITPrestasi === 0 && periodeSMAITPrestasi === 0 && periodeMAPrestasi === 0) {    
            // Set tanggal target (sesuaikan dengan kebutuhan)  
            const targetDate = new Date("2024-11-01T00:00:00").getTime(); // Contoh tanggal  
            
            // Sembunyikan form registrasi
            document.getElementById("registration-form-container").style.display = "none";
            // Tampilkan countdown
            document.getElementById("countdown-container").style.display = "block";  
            
            // Update countdown setiap detik  
            const countdownInterval = setInterval(() => {  
                const distance = updateCountdown(targetDate);  
                
                // Jika countdown selesai  
                if (distance < 0) {  
                    clearInterval(countdownInterval);  
                    document.getElementById("countdown-container").innerHTML =   
                        '<h4 class="text-center">Pendaftaran telah dibuka!</h4>';  
                    setTimeout(() => {  
                        location.reload();  
                    }, 2000);  
                }  
            }, 1000);  
        }  
    }  
    
    // Jalankan pengecekan saat halaman dimuat  
    document.addEventListener('DOMContentLoaded', checkAvailableJenjang);  
    </script>
</body>
<!-- END: Body-->

</html>
