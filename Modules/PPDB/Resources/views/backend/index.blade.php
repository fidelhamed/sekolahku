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
                            <h1 class="mb-1 text-white">Selamat Datang {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Bismillahirrahmanirrahim
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
                            <h1 class="mb-1 text-white">Selamat {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Kamu lulus administrasi
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Berikut Informasi Tes dan ujian anda:</h4>
                            <p class="card-text m-auto w-75">
                                Dilaksanakan pada
                            </p>
                            <p class="card-text m-auto w-75">
                                Tanggal     :       2 Februari 2024
                            </p>
                            <p class="card-text m-auto w-75">
                                Tempat     :       IBS Ash-Shiddiiqi Jambi Gedung B Lantai 2 Ruang AB
                            </p>
                            <p class="card-text m-auto w-75">
                                Klik tombol dibawah untuk mencetak kartu ujian
                            </p>
                            <button class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
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
                            <h1 class="mb-1 text-white">Selamat {{Auth::user()->name}},</h1>
                            <p class="card-text m-auto w-75">
                                Alhamdulillah, kamu lulus menjadi murid IBS Ash-Shiddiiqi Jambi !
                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card">
                    <div class="card-body text-center">
                        <div class="text-center">
                            <h4 class="mb-1">Silahkan lakukan daftar ulang pada</h4>
                            <p class="card-text m-auto w-75">
                                Tanggal     :       10 Februari 2024
                            </p>
                            <p class="card-text m-auto w-75">
                                Tempat     :       IBS Ash-Shiddiiqi Jambi Gedung B Lantai 2 Ruang AB
                            </p>
                            <p class="card-text m-auto w-75">
                                Klik tombol dibawah untuk mencetak surat kelulusan
                            </p>
                            <button class="btn btn-primary">Cetak</button>
                        </div>
                    </div>
                </div>
            </div>
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
                              <h2 class="font-weight-bolder mb-0">{{$needVerif}}</h2>
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
                                <h2 class="font-weight-bolder mb-0">{{$needConfirmPayment}}</h2>
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
                  <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <div>
                                <h2 class="font-weight-bolder mb-0">{{$confirmedPayment}}</h2>
                                <p class="card-text">Sudah Bayar</p>
                            </div>
                            <div class="avatar bg-light-success p-50 m-0">
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
                <div class="card">
                    <table class="table">
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
                                <td>{{ Auth::user()->id }}</td>
                                <td>{{ Auth::user()->name }}</td>
                                <td>{{ Auth::user()->created_at->format('d F Y') }}</td>
                                <td>{{ Auth::user()->muridDetail->jenjang }}</td>
                                <td>{{ Auth::user()->paymentRegis->status == 'Paid' ? 'Berhasil' : 'Pending' }}</td>
                                <td>{{ Auth::user()->muridDetail->proses }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
           @endif
        </div>
    </div>
</div>
@endsection
