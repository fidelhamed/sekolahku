@extends('layouts.backend.app')

@section('title')
    Dashboard
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    @if ($message = Session::get('success'))
        <div class="alert alert-success" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @elseif($message = Session::get('error'))
        <div class="alert alert-danger" role="alert">
            <div class="alert-body">
                <strong>{{ $message }}</strong>
                <button type="button" class="close" data-dismiss="alert">×</button>
            </div>
        </div>
    @endif
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="smile" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">ٱلسَّلَامُ عَلَيْكُمْ وَرَحْمَةُ ٱللَّٰهِ وَبَرَكَاتُهُ {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                بِسْمِ اللَّهِ الرَّحْمَنِ الرَّحِيم
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        
        @if (Auth::user()->role == 'Terverifikasi')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-primary shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">اَلْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Kamu lulus administrasi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($infoTesUjian->waktu_tgl, $infoTesUjian->jam_mulai, $infoTesUjian->jam_berakhir, $infoTesUjian->lokasi, $infoTesUjian->deskripsi))
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Berikut Informasi Tes dan ujian anda:</h4>
                            <p class="card-text m-auto w-75">
                                Dilaksanakan pada
                            </p>
                            <p class="card-text m-auto w-75">
                                Tanggal     :       
                                @if ($infoTesUjian->waktu_tgl)
                                {{ Carbon\Carbon::parse($infoTesUjian->waktu_tgl)->format('d-m-Y') }}                                    
                                @else
                                Tanggal Belum Tersedia
                                @endif
                            </p>
                            <p class="card-text m-auto w-75">
                                Jam     :       
                                @if ($infoTesUjian->jam_mulai AND $infoTesUjian->jam_berakhir)
                                {{ Carbon\Carbon::parse($infoTesUjian->jam_mulai)->format('H:i') . ' - ' . Carbon\Carbon::parse($infoTesUjian->jam_berakhir)->format('H:i')}}
                                @else
                                Jam Belum Tersedia
                                @endif
                            </p>
                            <p class="card-text m-auto w-75">
                                Tempat     :       {{ $infoTesUjian->lokasi }}
                            </p>
                            <p class="card-text m-auto w-75">
                                {!! nl2br($infoTesUjian->deskripsi) !!}
                            </p>
                            <p class="card-text m-auto w-75">
                                Klik tombol dibawah untuk mencetak kartu ujian
                            </p>
                            @if ($infoTesUjian->waktu_tgl || $infoTesUjian->jam_mulai || $infoTesUjian->jam_berakhir || $infoTesUjian->lokasi || $infoTesUjian->deskripsi)
                            <a href="{{ route('ppdb.cetak-kartu') }}" class="btn btn-success" target="_blank"><i data-feather="printer"></i> Cetak</a>                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @elseif (Auth::user()->role == 'Lulus')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                        <div class="avatar avatar-xl bg-success shadow">
                            <div class="avatar-content">
                                <i data-feather="award" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h1 class="mb-1 text-white">اَلْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Anda lulus menjadi murid IBS Ash-Shiddiiqi Jambi !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            @if (isset($infoDaftarUlang->waktu_tgl, $infoDaftarUlang->jam_mulai, $infoDaftarUlang->jam_berakhir, $infoDaftarUlang->lokasi, $infoDaftarUlang->deskripsi))
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Silahkan lakukan daftar ulang pada</h4>
                            <p class="card-text m-auto w-75">
                                Tanggal     :       
                                @if ($infoDaftarUlang->waktu_tgl)
                                {{ Carbon\Carbon::parse($infoDaftarUlang->waktu_tgl)->format('d-m-Y') }} 
                                @else
                                Tanggal Belum Tersedia
                                @endif
                            </p>
                            <p class="card-text m-auto w-75">
                                Jam     :       
                                @if ($infoDaftarUlang->jam_mulai AND $infoDaftarUlang->jam_berakhir)
                                {{ Carbon\Carbon::parse($infoDaftarUlang->jam_mulai)->format('H:i') . ' - ' . Carbon\Carbon::parse($infoDaftarUlang->jam_berakhir)->format('H:i')}}
                                @else
                                Jam Belum Tersedia
                                @endif
                            </p>
                            <p class="card-text m-auto w-75">
                                Tempat     :       {{ $infoDaftarUlang->lokasi }}
                            </p>
                            <p class="card-text m-auto w-75">
                                {!! nl2br($infoDaftarUlang->deskripsi) !!}
                            </p>
                            <p class="card-text m-auto w-75">
                                Klik tombol dibawah untuk mencetak surat kelulusan
                            </p>
                            @if ($infoDaftarUlang->waktu_tgl || $infoDaftarUlang->jam_mulai || $infoDaftarUlang->jam_berakhir || $infoDaftarUlang->lokasi || $infoDaftarUlang->deskripsi)
                            <a href="{{ route('ppdb.cetak-kelulusan') }}" class="btn btn-success" target="_blank"><i data-feather="printer"></i> Cetak</a>                                
                            @endif
                        </div>
                    </div>
                </div>
            </div>
            @endif
        @elseif (Auth::user()->role == 'Tidak Lulus')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-danger shadow">
                            <div class="avatar-content">
                                <i data-feather="frown" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-1">Mohon maaf, sayang sekali {{ Auth::user()->name }}</h4>
                            <p class="card-text m-auto w-75 text-danger font-weight-bold">
                                Anda dinyatakan tidak lulus
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Guest' AND Auth::user()->muridDetail->proses == 'Perbaikan')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="avatar avatar-xl bg-danger shadow mb-1">
                            <div class="avatar-content">
                                <i data-feather="frown" class="font-large-1"></i>
                            </div>
                        </div>
                        <div class="text-center">
                            <h4 class="mb-1">Mohon maaf {{ Auth::user()->name }}</h4>
                            <p class="card-text m-auto w-75 text-danger font-weight-bold">
                                Silahkan lakukan perbaikan dengan mengisi ulang data kamu di menu pendaftaran
                            </p>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Guest' AND Auth::user()->paymentRegis->status == 'Paid' AND Auth::user()->muridDetail->proses == 'Pendaftaran')
        <div class="col-lg-6 col-md-12 col-sm-12">
            <div class="card card-congratulations">
                <div class="card-body text-center">
                    <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                    <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
                    <div class="avatar avatar-xl bg-primary shadow">
                        <div class="avatar-content">
                            <i data-feather="award" class="font-large-1"></i>
                        </div>
                    </div>
                    <div class="text-center">
                        <h1 class="mb-1 text-white">اَلْحَمْدُ لِلَّهِ رَبِّ الْعَالَمِينَ {{Auth::user()->name}},</h1>
                        <p class="card-text m-auto w-75">
                            Pembayaran kamu berhasil dikonfirmasi, silahkan lanjutkan mengisi formulir pendaftaran di menu pendaftaran
                        </p>
                    </div>
                </div>
            </div>
        </div>
        @endif
        
           @if (Auth::user()->role == 'PPDB')
            <div class="col-lg-3 col-sm-6 col-12">
              <div class="row">
                <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <div>
                              <h2 class="font-weight-bolder mb-0">{{$register}}</h2>
                              <p class="card-text">Pendaftar</p>
                          </div>
                          <div class="avatar bg-light-primary p-50 m-0">
                              <div class="avatar-content">
                                  <i data-feather="users" class="font-medium-5"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
                <div class="col-12">
                  <div class="card">
                      <div class="card-header">
                          <div>
                            @if ($needVerifSMPIT == 0 AND $needVerifSMAIT == 0 AND $needVerifMA == 0)
                                <h2 class="font-weight-bolder mb-0">0</h2>                                                                                
                            @endif
                            @if ($needVerifSMPIT > 0)
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMP-IT') }}">
                                <h4 class="font-weight-bolder mb-0">{{$needVerifSMPIT}} SMP-IT</h4>                                        
                            </a>
                            @endif
                            @if ($needVerifSMAIT > 0)
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMA-IT') }}">
                                <h4 class="font-weight-bolder mb-0">{{$needVerifSMAIT}} SMA-IT</h4>
                            </a>
                            @endif
                            @if ($needVerifMA > 0)
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=MA') }}">
                                <h4 class="font-weight-bolder mb-0">{{$needVerifMA}} MA</h4>
                            </a>
                            @endif
                            <p class="card-text">Perlu Verifikasi Data Murid</p>
                          </div>
                          <div class="avatar bg-light-warning p-50 m-0">
                              <div class="avatar-content">
                                  <i data-feather="user" class="font-medium-5"></i>
                              </div>
                          </div>
                      </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">Rp. {{number_format($profit, 0, ',', '.')}}</h2>
                                    <p class="card-text">Total Pemasukan</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                      </div>    
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    @if ($needConfirmPaymentSMPIT == 0 AND $needConfirmPaymentSMAIT == 0 AND $needConfirmPaymentMA == 0)
                                    <h2 class="font-weight-bolder mb-0">0</h2>                                                                                
                                    @endif
                                    @if ($needConfirmPaymentSMPIT > 0)
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMP-IT') }}">
                                        <h4 class="font-weight-bolder mb-0">{{$needConfirmPaymentSMPIT}} SMP-IT</h4>                                  
                                    </a>
                                    @endif
                                    @if ($needConfirmPaymentSMAIT > 0)
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMA-IT') }}">
                                        <h4 class="font-weight-bolder mb-0">{{$needConfirmPaymentSMAIT}} SMA-IT</h4>
                                    </a>
                                    @endif
                                    @if ($needConfirmPaymentMA > 0)
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=MA') }}">
                                        <h4 class="font-weight-bolder mb-0">{{$needConfirmPaymentMA}} MA</h4>
                                    </a>
                                    @endif
                                    <p class="card-text">Cek Pembayaran</p>
                                </div>
                                <div class="avatar bg-light-warning p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="dollar-sign" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
           @endif
           @if (Auth::user()->role !== 'PPDB')
            <div class="col-12">
                <div class="card-datatable">
                    <table class="dt-responsive table">
                        <thead>
                            <tr>
                                <th>Noreg</th>
                                <th>Nama</th>
                                <th>Waktu Daftar</th>
                                <th>Jenjang</th>
                                <th>Pembayaran</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->muridDetail->noreg }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->created_at->format('d F Y') }}</td>
                                <td>{{ Auth::user()->muridDetail->jenjang }}</td>
                                <td>{{ Auth::user()->paymentRegis->status == 'Paid' ? 'Berhasil' : 'Belum Bayar' }}</td>
                                <td>{{ Auth::user()->muridDetail->proses }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           @endif
        </div>
        @if (Auth::user()->role == 'PPDB' || Auth::user()->role == 'Admin')
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card py-1">
                    <canvas id="myChart" width="400" height="200"></canvas>
                </div>
            </div>
            <div class="col-lg-6 col-12">
                <div class="card py-1">
                    <canvas id="myChart_jk" width="400" height="200"></canvas>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card py-1">
                    <canvas id="myChart_biaya" width="400" height="200"></canvas>
                </div>
            </div>            
        </div>            
        @endif
    </div>
</div>


@endsection
@push('page-script')
<script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    $(document).ready(function () {
        $('.table').DataTable({
            searching: false,
            paging: false,
            info: false
        });
    });
</script>
<script>
    @if (isset($pendaftar, $pendaftar_jk))
    
    // Chart pendaftar
    var ctx = document.getElementById('myChart').getContext('2d');
    var data = @json($pendaftar);

    var labels = data.map(function(item) {
        return item.jenjang;
    });

    var values = data.map(function(item) {
        return item.jumlah_pendaftar;
    });

    var backgroundColors = [
        'rgba(20, 174, 92, 1)',
        'rgba(40, 48, 70, 1)',
        'rgba(72, 218, 137, 1)',
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var borderColors = [
        'rgba(20, 174, 92, 1)',
        'rgba(40, 48, 70, 1)',
        'rgba(72, 218, 137, 1)',
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var datasets = [{
        data: values,
        backgroundColor: backgroundColors,
        borderColor: borderColors,
        borderWidth: 1,
    }];

    var myChart = new Chart(ctx, {
        type: 'doughnut', // Mengganti type menjadi 'pie' untuk pie chart
        data: {
            labels: labels,
            datasets: datasets
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'left',
                    labels: {
                        generateLabels: function(chart) {
                            return labels.map(function(label, index) {
                                return {
                                    text: label,
                                    fillStyle: datasets[0].backgroundColor[index],
                                    strokeStyle: datasets[0].borderColor[index],
                                    lineWidth: datasets[0].borderWidth
                                };
                            });
                        }
                    }
                },
                title: {  // Tambahkan properti title di sini
                    display: true,
                    text: 'Jumlah Pendaftar Berdasarkan Jenjang'
                }
            },
            maintainAspectRatio: false,
            responsive: true
        }
    });


    // Chart pendaftar berdasarkan jenis kelamin
    var ctx = document.getElementById('myChart_jk').getContext('2d');
    var data = @json($pendaftar_jk);

    var labels_jk = data.map(function(item) {
        return item.jenjang;
    });

    var valuesMale = data.map(function(item) {
        return item.jumlah_pendaftar_laki;
    });

    var valuesFemale = data.map(function(item) {
        return item.jumlah_pendaftar_perempuan;
    });

    var backgroundColorsMale = 'rgba(40, 48, 70, 0.7)';
    var borderColorsMale = 'rgba(40, 48, 70, 1)';

    var backgroundColorsFemale = 'rgba(20, 174, 92, 0.7)';
    var borderColorsFemale = 'rgba(20, 174, 92, 1)';

    var datasets_jk = [
        {
            label: 'Laki-Laki',
            data: valuesMale,
            backgroundColor: backgroundColorsMale,
            borderColor: borderColorsMale,
            borderWidth: 1,
        },
        {
            label: 'Perempuan',
            data: valuesFemale,
            backgroundColor: backgroundColorsFemale,
            borderColor: borderColorsFemale,
            borderWidth: 1,
        }
    ];

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels_jk,
            datasets: datasets_jk
        },
        options: {
            plugins: {
                title: {  // Tambahkan properti title di sini
                    display: true,
                    text: 'Jumlah Pendaftar Berdasarkan Jenis Kelamin Per Jenjang'
                }
            },
            scales: {
                y: {
                    beginAtZero: true
                }
            }
        }
    });


    // Chart pemasukan biaya registrasi
    var data = @json($biaya);

    var labels_biaya = data.map(function(item) {
        return item.jenjang;
    });

    var amounts = data.map(function(item) {
        return item.total_amount;
    });

    var backgroundColors = [
        'rgba(20, 174, 92, 0.7)',
        'rgba(40, 48, 70, 0.7)',
        'rgba(72, 218, 137, 0.7)',
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var borderColors = [
        'rgba(20, 174, 92, 1)',
        'rgba(40, 48, 70, 1)',
        'rgba(72, 218, 137, 1)',
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var datasets_biaya = [
        {
            data: amounts,
            backgroundColor: backgroundColors,
            borderColor: borderColors,
            borderWidth: 1
        }
    ];

    var ctx = document.getElementById('myChart_biaya').getContext('2d');
    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels_biaya,
            datasets: datasets_biaya
        },
        options: {
            plugins: {
                legend: {
                    display: true,
                    position: 'top',
                    labels: {
                        generateLabels: function(chart) {
                            return labels_biaya.map(function(label, index) {
                                return {
                                    text: label,
                                    fillStyle: datasets_biaya[0].backgroundColor[index],
                                    strokeStyle: datasets_biaya[0].borderColor[index],
                                    lineWidth: datasets_biaya[0].borderWidth
                                };
                            });
                        }
                    }
                },
                title: {  // Tambahkan properti title di sini
                    display: true,
                    text: 'Jumlah Biaya Pendaftaran Berdasarkan Jenjang'
                }
            },
            maintainAspectRatio: false,
            responsive: true
        }
    });

    @endif
</script>
@endpush
