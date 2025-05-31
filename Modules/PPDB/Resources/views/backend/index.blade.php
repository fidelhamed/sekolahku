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
                <div class="card" style="background-image: url('{{ asset('Assets/Backend/images/banner_welcome.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; aspect-ratio: 2/1;">
                    <div class="card-body text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h2 class="text-black" style="margin-top: 60%;">{{Auth::user()->name}}</h2>
                    </div>
                </div>
            </div>
        
        @if (Auth::user()->role == 'Terverifikasi')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card" style="background-image: url('{{ asset('Assets/Backend/images/banner_verified.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; aspect-ratio: 2/1;">
                    <div class="card-body text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h4 class="text-black" style="margin-top: 20%;">{{Auth::user()->name}}</h4>
                    </div>
                </div>
            </div>
            @if (isset($infoTesUjian->waktu_tgl, $infoTesUjian->jam_mulai, $infoTesUjian->jam_berakhir, $infoTesUjian->lokasi_laki_laki, $infoTesUjian->lokasi_perempuan, $infoTesUjian->deskripsi))
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Berikut Informasi Observasi dan Wawancara anda:</h4>
                            <p class="card-text m-auto w-75">
                                Dilaksanakan pada
                            </p>
                            <p class="card-text m-auto w-75">
                                Tanggal     :   {{ Carbon\Carbon::parse($infoTesUjian->waktu_tgl)->format('d-m-Y') }}                                    
                            </p>
                            <p class="card-text m-auto w-75">
                                Jam     :       {{ Carbon\Carbon::parse($infoTesUjian->jam_mulai)->format('H:i') . ' - ' . Carbon\Carbon::parse($infoTesUjian->jam_berakhir)->format('H:i')}}
                            </p>
                            <p class="card-text m-auto w-75">
                                @if (Auth::user()->muridDetail->jenis_kelamin === 'Laki-laki')
                                Tempat     :       {{ $infoTesUjian->lokasi_laki_laki }}
                                @else
                                Tempat     :       {{ $infoTesUjian->lokasi_perempuan }}
                                @endif
                            </p>
                            <p class="card-text m-auto w-75">
                                {!! nl2br($infoTesUjian->deskripsi) !!}
                            </p>
                            <p class="card-text m-auto w-75">
                                Klik tombol dibawah untuk mencetak kartu ujian
                            </p>
                            <a href="{{ route('ppdb.cetak-kartu') }}" class="btn btn-success" target="_blank"><i data-feather="printer"></i> Cetak</a>
                        </div>
                    </div>
                </div>
            </div>
            @endif
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Silahkan mengisi form angket</h4>
                            <p class="card-text m-auto w-75">
                                Pengisian angket wajib dilakukan oleh orang tua atau wali dari calon peserta didik yang bersangkutan
                            </p>
                            <a href="{{ route('ppdb.show-angket-form') }}" class="btn btn-success mt-1"><i data-feather="file"></i> Angket </a>                                
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Lulus')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card" style="background-image: url('{{ asset('Assets/Backend/images/banner_lulus.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; aspect-ratio: 2/1;">
                    <div class="card-body text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h4 class="text-black" style="margin-top: 20%;">{{Auth::user()->name}}</h4>
                    </div>
                </div>
            </div>
            @if (isset($infoDaftarUlang->tgl_buka, $infoDaftarUlang->tgl_tutup, $infoDaftarUlang->lokasi_laki_laki, $infoDaftarUlang->lokasi_perempuan, $infoDaftarUlang->deskripsi))
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Silahkan lakukan daftar ulang pada</h4>
                            <p class="card-text m-auto w-75">
                                Tanggal Buka     :       {{ Carbon\Carbon::parse($infoDaftarUlang->tgl_buka)->format('d-m-Y') }}
                            </p>
                            <p class="card-text m-auto w-75">
                                Tanggal Tutup     :       {{ Carbon\Carbon::parse($infoDaftarUlang->tgl_tutup)->format('d-m-Y') }}
                            </p>
                            <p class="card-text m-auto w-75">
                                @if (Auth::user()->muridDetail->jenis_kelamin === 'Laki-laki')
                                Tempat     :       {{ $infoDaftarUlang->lokasi_laki_laki }}
                                @else
                                Tempat     :       {{ $infoDaftarUlang->lokasi_perempuan }}
                                @endif
                            </p>
                            <p class="card-text m-auto w-75">
                                {!! nl2br($infoDaftarUlang->deskripsi) !!}
                            </p>
                            <p class="card-text m-auto w-75">
                                Klik tombol dibawah untuk mencetak surat kelulusan
                            </p>
                            <a href="{{ route('ppdb.cetak-kelulusan') }}" class="btn btn-success mt-1" target="_blank"><i data-feather="printer"></i> Cetak</a>                                
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
        @elseif (Auth::user()->role == 'Guest' AND Auth::user()->paymentRegis->status == 'Unpaid')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <p class="card-text m-auto w-75 font-weight-bold">
                                Silahkan lanjutkan melakukan proses upload
                                @if (Auth::user()->muridDetail->jalur == 'Reguler' || Auth::user()->muridDetail->jalur == 'Internal')
                                bukti pembayaran
                                @else
                                prestasi
                                @endif
                            </p>
                            <a class="btn btn-success mt-1" href="{{route('ppdb.form-pendaftaran')}}">
                                @if (Auth::user()->muridDetail->jalur == 'Reguler' || Auth::user()->muridDetail->jalur == 'Internal')
                                Upload Bukti Pembayaran
                                @else
                                Upload Prestasi
                                @endif
                            </a>
                        </div>
                    </div>
                </div>
            </div>
        @elseif (Auth::user()->role == 'Guest' AND Auth::user()->paymentRegis->status == 'Paid' AND Auth::user()->muridDetail->proses == 'Pendaftaran')
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card" style="background-image: url('{{ asset('Assets/Backend/images/banner_confirmed.jpeg') }}'); background-size: cover; background-position: center; background-repeat: no-repeat; aspect-ratio: 2/1;">
                    <div class="card-body text-center" style="position: absolute; top: 50%; left: 50%; transform: translate(-50%, -50%);">
                        <h4 class="text-black" style="margin-top: 50%;">{{Auth::user()->name}}</h4>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <p class="card-text m-auto w-75 font-weight-bold">
                                Silahkan lanjutkan proses pengisian formulir pendaftaran
                            </p>
                            <a class="btn btn-success mt-1" href="{{route('ppdb.form-pendaftaran')}}">
                                Form Pendaftaran
                            </a>
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
                                Silahkan lakukan perbaikan dengan mengisi ulang formulir pendaftaran
                            </p>
                            <a class="btn btn-danger mt-1" href="{{route('ppdb.form-pendaftaran')}}">
                                Form Pendaftaran
                            </a>
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
                              <p class="card-text">Pendaftar pada {{ Auth::user()->userDetail->pj_jenjang }}</p>
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
                            @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')

                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=TKTQ') }}">
                                <h4 class="{{ $needVerifTKTQ > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifTKTQ}} (TKTQ)</h4>                                        
                            </a>
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=TKTQ-2') }}">
                                <h4 class="{{ $needVerifTKTQ2 > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifTKTQ2}} (TKTQ 2)</h4>                                        
                            </a>

                            @elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT')

                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SD-IT') }}">
                                <h4 class="{{ $needVerifSDIT > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifSDIT}} (SD IT)</h4>
                            </a>
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SD-IT-2') }}">
                                <h4 class="{{ $needVerifSDIT2 > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifSDIT2}} (SD IT 2)</h4>                                        
                            </a>

                            @elseif (Auth::user()->userDetail->pj_jenjang == 'SMP-IT')
                            
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMP-IT') }}">
                                <h4 class="{{ $needVerifSMPIT > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifSMPIT}} (SMP IT)</h4>                                        
                            </a>
                            
                            @elseif (Auth::user()->userDetail->pj_jenjang == 'SMA-IT')
                            
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMA-IT') }}">
                                <h4 class="{{ $needVerifSMAIT > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifSMAIT}} (SMA IT)</h4>
                            </a>
                            
                            @elseif (Auth::user()->userDetail->pj_jenjang == 'MA')
                            
                            <a href="{{ url('ppdb/data-murid?jenjangDataMurid=MA') }}">
                                <h4 class="{{ $needVerifMA > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needVerifMA}} (MA)</h4>
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
                                    @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')
                                    
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=TKTQ') }}">
                                        <h4 class="{{ $needConfirmPaymentTKTQ > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentTKTQ}} (TKTQ)</h4>                                  
                                    </a>
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=TKTQ-2') }}">
                                        <h4 class="{{ $needConfirmPaymentTKTQ2 > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentTKTQ2}} (TKTQ 2)</h4>                                  
                                    </a>
                                    
                                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT')
                                    
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SD-IT') }}">
                                        <h4 class="{{ $needConfirmPaymentSDIT > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentSDIT}} (SD IT)</h4>                                  
                                    </a>
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SD-IT-2') }}">
                                        <h4 class="{{ $needConfirmPaymentSDIT2 > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentSDIT2}} (SD IT 2)</h4>                                  
                                    </a>

                                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SMP-IT')
                                    
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMP-IT') }}">
                                        <h4 class="{{ $needConfirmPaymentSMPIT > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentSMPIT}} (SMP IT)</h4>                                  
                                    </a>
                                    
                                    @elseif (Auth::user()->userDetail->pj_jenjang == 'SMA-IT')
                                    
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=SMA-IT') }}">
                                        <h4 class="{{ $needConfirmPaymentSMAIT > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentSMAIT}} (SMA IT)</h4>
                                    </a>
                                    
                                    @elseif (Auth::user()->userDetail->pj_jenjang == 'MA')
                                    
                                    <a href="{{ url('ppdb/data-murid?jenjangDataMurid=MA') }}">
                                        <h4 class="{{ $needConfirmPaymentMA > 0 ? 'text-success font-weight-bolder' : '' }} mb-0">{{$needConfirmPaymentMA}} (MA)</h4>
                                    </a>
                                    
                                    @endif
                                    <p class="card-text">Cek Pembayaran/Prestasi</p>
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
                                <th>Jenjang - Jalur</th>
                                <th>Pembayaran/Prestasi</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ Auth::user()->muridDetail->noreg }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->created_at->format('d F Y') }}</td>
                                <td>{{ Auth::user()->muridDetail->jenjang }} - {{ Auth::user()->muridDetail->jalur }}</td>
                                <td>{{ Auth::user()->paymentRegis->status == 'Paid' ? 'Berhasil' : 'Belum Dikonfirmasi' }}</td>
                                <td>{{ Auth::user()->muridDetail->proses }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="col-6">
                <div class="mt-2">
                    <p>Jika ada kendala ataupun pertanyaan lebih lanjut dapat menghubungi admin :</p>
                    @foreach ($admins as $admin)
                    <ul class="list-group">
                        <li class="list-group-item">+62{{ $admin->nip }} (<span class="font-weight-bold">{{ $admin->pj_jenjang }}</span>)</li>
                    </ul>
                    @endforeach
                </div>
            </div>
           @endif
        </div>
        @if (Auth::user()->role == 'PPDB' || Auth::user()->role == 'Admin')
        <div class="row">
            <div class="col-lg-6 col-12">
                <div class="card py-1">
                    <canvas id="myChart_pendaftar" width="400" height="200"></canvas>
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
            <div class="col-lg-6 col-12">
                <div class="card py-1">
                    <canvas id="myChart_jlr" width="400" height="200"></canvas>
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
    var ctx = document.getElementById('myChart_pendaftar').getContext('2d');
    var data = @json($pendaftar);

    // Tentukan urutan jenjang yang diinginkan
    var order = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA']; // Sesuaikan dengan jenjang yang ada

    // Urutkan data berdasarkan jenjang
    data.sort(function(a, b) {
        return order.indexOf(a.jenjang) - order.indexOf(b.jenjang);
    });

    var labels = data.map(function(item) {
        return item.jenjang;
    });

    var values = data.map(function(item) {
        return item.jumlah_pendaftar;
    });

    var backgroundColors = [
        'rgba(20, 174, 92, 1)',    // Original green
        'rgba(255, 99, 71, 1)',    // Tomato red
        'rgba(75, 192, 255, 1)',   // Sky blue
        'rgba(255, 206, 86, 1)',   // Warm yellow
        'rgba(153, 102, 255, 1)',  // Purple
        'rgba(255, 159, 64, 1)',   // Orange
        'rgba(66, 66, 66, 1)'      // Dark grey
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var borderColors = [
        'rgba(20, 174, 92, 1)',    // Original green
        'rgba(255, 99, 71, 1)',    // Tomato red
        'rgba(75, 192, 255, 1)',   // Sky blue
        'rgba(255, 206, 86, 1)',   // Warm yellow
        'rgba(153, 102, 255, 1)',  // Purple
        'rgba(255, 159, 64, 1)',   // Orange
        'rgba(66, 66, 66, 1)'      // Dark grey
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var datasets = [{
        data: values,
        backgroundColor: backgroundColors,
        borderColor: borderColors,
        borderWidth: 1,
    }];

    var myChart = new Chart(ctx, {
        type: 'pie', // Mengganti type menjadi 'pie' untuk pie chart
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

    // Tentukan urutan jenjang yang diinginkan
    var order = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA']; // Sesuaikan dengan jenjang yang ada

    // Urutkan data berdasarkan jenjang
    data.sort(function(a, b) {
        return order.indexOf(a.jenjang) - order.indexOf(b.jenjang);
    });    

    var labels_jk = data.map(function(item) {
        return item.jenjang;
    });

    var valuesMale = data.map(function(item) {
        return item.jumlah_pendaftar_laki;
    });

    var valuesFemale = data.map(function(item) {
        return item.jumlah_pendaftar_perempuan;
    });

    var backgroundColorsMale = 'rgba(42, 180, 255, 0.7)';
    var borderColorsMale = 'rgba(42, 180, 255, 1)';

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
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0  // Memastikan tidak ada desimal
                    }
                }
            }
        }
    });

    // Chart pemasukan biaya registrasi
    var data = @json($biaya);

    // Tentukan urutan jenjang yang diinginkan
    var order = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA']; // Sesuaikan dengan jenjang yang ada

    // Urutkan data berdasarkan jenjang
    data.sort(function(a, b) {
        return order.indexOf(a.jenjang) - order.indexOf(b.jenjang);
    });

    var labels_biaya = data.map(function(item) {
        return item.jenjang;
    });

    var amounts = data.map(function(item) {
        return item.total_amount;
    });

    var backgroundColors = [
        'rgba(20, 174, 92, 1)',    // Original green
        'rgba(255, 99, 71, 1)',    // Tomato red
        'rgba(75, 192, 255, 1)',   // Sky blue
        'rgba(255, 206, 86, 1)',   // Warm yellow
        'rgba(153, 102, 255, 1)',  // Purple
        'rgba(255, 159, 64, 1)',   // Orange
        'rgba(66, 66, 66, 1)'      // Dark grey
        // ...Tambahkan warna lain sesuai kebutuhan
    ];

    var borderColors = [
        'rgba(20, 174, 92, 1)',    // Original green
        'rgba(255, 99, 71, 1)',    // Tomato red
        'rgba(75, 192, 255, 1)',   // Sky blue
        'rgba(255, 206, 86, 1)',   // Warm yellow
        'rgba(153, 102, 255, 1)',  // Purple
        'rgba(255, 159, 64, 1)',   // Orange
        'rgba(66, 66, 66, 1)'      // Dark grey
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
    
    // Chart pendaftar berdasarkan jalur
    var ctx = document.getElementById('myChart_jlr').getContext('2d');
    var data = @json($pendaftar_jlr);

    // Tentukan urutan jenjang yang diinginkan
    var order = ['TKTQ', 'TKTQ-2', 'SD-IT', 'SD-IT-2', 'SMP-IT', 'SMA-IT', 'MA']; // Sesuaikan dengan jenjang yang ada

    // Urutkan data berdasarkan jenjang
    data.sort(function(a, b) {
        return order.indexOf(a.jenjang) - order.indexOf(b.jenjang);
    });    

    var labels_jlr = data.map(function(item) {
        return item.jenjang;
    });

    var valuesReguler = data.map(function(item) {
        return item.jumlah_pendaftar_reguler;
    });

    var valuesPrestasi = data.map(function(item) {
        return item.jumlah_pendaftar_prestasi;
    });

    var backgroundColorsReguler = 'rgba(42, 180, 255, 0.7)';
    var borderColorsReguler = 'rgba(42, 180, 255, 1)';

    var backgroundColorsPrestasi = 'rgba(20, 174, 92, 0.7)';
    var borderColorsPrestasi = 'rgba(20, 174, 92, 1)';

    var datasets_jlr = [
        {
            label: 'Reguler',
            data: valuesReguler,
            backgroundColor: backgroundColorsReguler,
            borderColor: borderColorsReguler,
            borderWidth: 1,
        },
        {
            label: 'Prestasi',
            data: valuesPrestasi,
            backgroundColor: backgroundColorsPrestasi,
            borderColor: borderColorsPrestasi,
            borderWidth: 1,
        }
    ];

    var myChart = new Chart(ctx, {
        type: 'bar',
        data: {
            labels: labels_jlr,
            datasets: datasets_jlr
        },
        options: {
            plugins: {
                title: {  // Tambahkan properti title di sini
                    display: true,
                    text: 'Jumlah Pendaftar Berdasarkan Jalur Pendaftaran Per Jenjang'
                }
            },
            scales: {
                y: {
                    beginAtZero: true,
                    ticks: {
                        stepSize: 1,
                        precision: 0  // Memastikan tidak ada desimal
                    }
                }
            }
        }
    });

    @endif
</script>
@endpush
