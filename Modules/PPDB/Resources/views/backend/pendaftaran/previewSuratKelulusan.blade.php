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
            margin: 0;
            padding: 0;
            width: 210mm;
            height: 297mm;
        }

        header {
            text-align: center;
            margin-top: 40px; /* Margin at the top of the page */
        }

        .content {
            margin: 40px; /* Margin inside the page */
        }

        h1 {
            color: #333;
        }

        p {
            text-align: justify;
            margin-bottom: 10px; /* Add some space between paragraphs */
        }

        .btn {
            background-color: #0d6efd;
            color: #fff;
            padding: 10px 20px;
            text-decoration: none;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            display: inline-block;
            margin-top: 20px; /* Adjust margin for the download button */
        }

        /* Optional: Hover effect */
        .btn:hover {
            background-color: #3d8afd;
        }

        footer {
            margin-top: 40px;
            text-align: center;
        }

    </style>
</head>
<body>
    <a href="{{ route('ppdb.cetak-kelulusan') }}" class="btn" target="_blank">Download</a>

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
                <li>Tanggal Pendaftaran: {{ $cetak->created_at }}</li>
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
