<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Surat Kelulusan</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            line-height: 1.6;
            margin: 40px;
        }

        header {
            text-align: center;
        }

        h1 {
            color: #333;
        }

        .content {
            margin-top: 20px;
        }

        p {
            text-align: justify;
        }

        footer {
            margin-top: 40px;
            text-align: center;
        }
    </style>
</head>
<body>

    <header>
        <h1>Surat Kelulusan Islamic Boarding School Ash-Shiddiiqi Jambi</h1>
    </header>

    <div class="content">
        <p>
            Kepada Yth.,<br>
            {{ $cetak->name }}<br>
            {{ $cetak->muridDetail->alamat }}<br>
            NIS  : {{ $cetak->muridDetail->nis }}<br>
            NISN :{{ $cetak->muridDetail->nisn }}<br>
        </p>

        <p>
            Dengan senang hati kami mengumumkan bahwa {{ $cetak->name }} diterima sebagai peserta didik baru di Islamic Boarding School Ash-Shiddiiqi jambi pada jenjang {{ $cetak->muridDetail->jenjang }}.
        </p>

        <p>
            Detail Pendaftaran:
            <ul>
                <li>Nomor Pendaftaran: {{ $cetak->id }}</li>
                <li>Tanggal Diterima: {{ Carbon\Carbon::parse($cetak->muridDetail->updated_at)->format('d-m-Y') }}</li>
                <!-- Tambahkan informasi pendaftaran lainnya sesuai kebutuhan -->
            </ul>
        </p>

        <p>
            {{ $cetak->name }} diharapkan dapat datang ke Islamic Boarding School Ash-Shiddiiqi Jambi pada tanggal [datftar ulang] untuk proses orientasi dan pendaftaran lebih lanjut.
        </p>

        <p>
            Kami berharap {{ $cetak->name }} dapat menikmati pembelajaran di Islamic Boarding School Ash-Shiddiiqi Jambi dan berprestasi selama masa sekolah.
        </p>

    </div>

    <footer>
        <p>
            Hormat kami,<br>
            Abdurrahman Zakiy, Lc.<br>
            Kepala Pondok Pesantren Ash-Shiddiiqi
        </p>
    </footer>

</body>
</html>
