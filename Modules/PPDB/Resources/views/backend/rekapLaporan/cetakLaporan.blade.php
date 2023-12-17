<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kelulusan</title>
    {{-- <link rel="stylesheet" href="styles.css"> --}}
</head>

<body>
    {{-- <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }

        .letterhead {
            background-color: #f0f0f0;
            padding: 20px;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }

        .logo img {
            width: 100px;
            /* Atur ukuran logo sesuai kebutuhan */
            height: auto;
        }

        .company-info {
            text-align: right;
        }

        .company-info h1 {
            margin: 5px 0;
            font-size: 1.5em;
            color: #333;
        }

        .company-info p {
            margin: 5px 0;
            color: #555;
        }

        .content {
            padding: 20px;
        }
    </style> --}}
    <style type="text/css">
        p,
        h1,
        h2,
        h3,
        h4,
        span {
            padding: 0;
            margin: 0;
        }

        body {
            /* font-family: Arial, sans-serif; */
            margin: 1.5cm;
            margin-top: 0.5cm;
            /* padding: 30px 10px; */
        }

        li {
            list-style: none;
        }

        @page {
            padding: 30px 10px;
            margin: 30px 10px;
        }

        .cop-container {
            width: 100%;
            padding: 10px;
            margin: 0 auto;
            text-align: center;
        }

        @media print {
            .cop-container {
                width: 90%;
                margin-bottom: 20px;
                padding: 0 20px 20px 20px;
            }

            body {
                transform: scale(.99);
            }

            /* table {
                page-break-inside: avoid;
            } */
        }

        .cop-left .logo {
            float: left;
            width: 90px;
        }

        .cop-right {
            /* padding-top: 1rem; */
        }

        .cop-right .school-name {
            font-size: 1.5rem;
            text-transform: uppercase;
        }

        .cop-right .school-detail h4 {
            line-height: 1.5rem;
            font-weight: normal;
        }

        .line-1 {
            border: 1px solid rgb(39, 39, 39);
            margin: 10px 0;
        }

        /* start content */
        .content-header {
            text-align: center;
            margin-bottom: 10px;
        }

        .logo {
            max-width: 65px;
            height: 85px;
        }

        .table {
            font-family: Arial, Helvetica, sans-serif;
            border-collapse: collapse;
            width: 100%;
            font-size: 10px;
        }

        .table td,
        .table th {
            border: 1px solid rgb(37, 37, 37);
            padding: 8px;
            font-size: 10px;
        }

        .table .table-striped tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        .table th {
            padding-top: 12px;
            padding-bottom: 12px;
            text-align: left;
            background-color: #f2f2f2;
            color: #000;
        }

        /* end content */

        /* start ttd */
        .ttd-container {
            padding: 10px;
        }

        /* end ttd */
    </style>

    <div class="cop-container">
        <div class="cop-left">
            <img class="logo" src="D:\Project\sekolahku\public\Assets\Frontend\img\logo-ibs-a.png" alt="logo">
        </div>
        <div class="cop-right">
            <div class="school-detail">
                <h4>Pondok Pesantren</h4>
            </div>
            <h1 class="school-name">Islamic Boarding School Ash-Shiddiiqi Jambi</h1>
            <div class="school-detail">
                <h4 style="text-transform: capitalize;">
                    Alamat : Jl. Jambi - Ma. Bulian KM 36, Jembatan Mas, Jambi
                </h4>
                <h4>No Hp : 0821 8063 6655 SMP, 0821 4063 1021 SMA, Email : Media.shiddiq@gmail.com
                </h4>
            </div>
        </div>
    </div>
    <div class="line-1"></div>

    <div class="content-container">
        <div class="content-header">
            <h4>Laporan Data Pendaftar yang {{ $status }}</h4>
            <h4>
               Jenjang : {{ $jenjang }}
            </h4>
        <table class="table">
            <thead>
                <tr>
                    <th>No</th>
                    <th>Noreg</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Jenis Kelamin</th>
                    <th>Tempat, Tanggal Lahir</th>
                    <th>Asal Sekolah</th>
                </tr>
            </thead>
            <tbody>

                {{-- @for ($i = 1; $i <= 100; $i++)
                <tr>
                    <td>{{ $i }}</td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                    <td></td>
                </tr>
                @endfor --}}
                @foreach ($cetak as $key => $murids)
                    <tr>
                        <td>{{$key+1}}</td>
                        <td>{{ $murids->id }}</td>
                        <td>{{$murids->name}}</td>
                        <td>{{$murids->email}}</td>
                        <td>{{ $murids->muridDetail->jenis_kelamin }}</td>
                        <td>{{ $murids->muridDetail->tempat_lahir }}, {{ Carbon\Carbon::parse($murids->muridDetail->tgl_lahir)->format('d-m-Y') }}</td>
                        <td>{{ $murids->muridDetail->asal_sekolah }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <br>
    <div class="ttd-container">
        <table style="text-align: center;float: right; font-size:12px">
            <tr>
                <td>
                    <div>
                        <span style="display: block;text-transform:capitalize;">
                            Pemayung, Batanghari
                            {{ \Carbon\Carbon::parse(now())->translatedFormat('d F Y') }}</span>
                        <span>Yang Menerima,</span>
                        <div style="margin-top: 50px ">
                            Abdurrahman Zakiy, Lc. Al-Hafiz
                            <span style="display: block;border-top:1px solid #000; ">
                                Kepala Pondok Pesantren Ash-Shiddiiqi
                            </span>
                            {{-- @if ($setting->treasurer_number)
                            @endif --}}
                        </div>
                    </div>
                </td>
            </tr>
        </table>
    </div>

</body>

</html>