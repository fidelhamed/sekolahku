@extends('layouts.backend.app')

@section('title')
    PPDB Online
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-md-12 col-sm-12">
                <div class="card card-congratulations">
                    <div class="card-body text-center">
                        <img src="{{asset('Assets/Backend/images/pages/decore-left.png')}}" class="congratulations-img-left" alt="card-img-left" />
                        <img src="{{asset('Assets/Backend/images/pages/decore-right.png')}}" class="congratulations-img-right" alt="card-img-right" />
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

            @if (Auth::user()->role == 'Admin')
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$lulus}}</h2>
                                    <p class="card-text">Pendaftar yang Lulus</p>
                                </div>
                                <div class="avatar bg-light-success p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user-check" class="font-medium-5"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <div>
                                    <h2 class="font-weight-bolder mb-0">{{$tidakLulus}}</h2>
                                    <p class="card-text">Pendaftar yang Tidak Lulus</p>
                                </div>
                                <div class="avatar bg-light-danger p-50 m-0">
                                    <div class="avatar-content">
                                        <i data-feather="user-x" class="font-medium-5"></i>
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
                                <h2 class="font-weight-bolder mb-0">{{$murid}}</h2>
                                <p class="card-text">Pendaftar</p>
                            </div>
                            <div class="avatar bg-light-warning p-50 m-0">
                                <div class="avatar-content">
                                    <i data-feather="user" class="font-medium-5"></i>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
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
                </div>
            </div>
            @endif

            {{-- <div class="col-lg-4 col-md-6 col-12">
                <div class="card card-developer-meetup">
                    <div class="meetup-img-wrapper rounded-top text-center">
                        <img src="{{asset('Assets/Backend/images/illustration/email.svg')}}" alt="Meeting Pic" height="170" />
                    </div>
                    <div class="card-body">
                        <div class="meetup-header d-flex align-items-center">
                            <div class="meetup-day">
                                <h6 class="mb-0">{{Carbon\Carbon::parse($event->acara ?? 0)->format('l')}}</h6>
                                <h3 class="mb-0">{{Carbon\Carbon::parse($event->acara ?? 0)->format('d')}}</h3>
                            </div>
                            <div class="my-auto">
                                <h4 class="card-title mb-25">{{$event->title ?? 'Belum Ada Event'}}</h4>
                                <p class="card-text mb-0">{{$event->desc ?? 'Belum Ada Event'}}</p>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <i data-feather="calendar" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">{{Carbon\Carbon::parse($event->acara ?? 0)->format('d F, Y')}}</h6>
                                <small>{{Carbon\Carbon::parse($event->acara ?? 0)->format('H:i:s')}}</small>
                            </div>
                        </div>
                        <div class="media">
                            <div class="avatar bg-light-primary rounded mr-1">
                                <div class="avatar-content">
                                    <i data-feather="map-pin" class="avatar-icon font-medium-3"></i>
                                </div>
                            </div>
                            <div class="media-body">
                                <h6 class="mb-0">{{$event->lokasi ?? 'Belum Ada Event'}}</h6>
                                <small>Manhattan, New york City</small>
                            </div>
                        </div>

                    </div>
                </div>
            </div> --}}
        </div>
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
    </div>
</div>
@endsection
@push('page-script')
{{-- <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/4.4.1/chart.min.js" type="text/javascript">
</script> --}}
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Chart pendaftar
    var ctx = document.getElementById('myChart').getContext('2d');
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
                    position: 'top',
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

    var backgroundColorsMale = 'rgba(40, 48, 70, 1)';
    var borderColorsMale = 'rgba(40, 48, 70, 1)';

    var backgroundColorsFemale = 'rgba(20, 174, 92, 1)';
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
                        text: 'Jumlah Biaya Registrasi Berdasarkan Jenjang'
                    }
                },
                maintainAspectRatio: false,
                responsive: true
            }
        });
</script>
@endpush
