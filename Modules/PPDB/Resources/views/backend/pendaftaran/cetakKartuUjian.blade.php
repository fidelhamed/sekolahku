<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Ujian</title>

    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        .card {
            width: 300px;
            height: 400px; /* Menyesuaikan tinggi untuk tempat pas foto */
            border: 2px solid #333;
            border-radius: 10px;
            overflow: hidden;
            position: relative;
            margin: 20px;
        }

        .card-header {
            background-color: #14AE5C;
            color: #fff;
            padding: 10px;
            text-align: center;
            position: relative;
        }

        /* .logo {
            position: absolute;
            top: 10px;
            right: 10px;
            width: 50px;
            height: 50px;
        } */

        .card-body {
            padding: 20px;
            position: relative;
        }

        .student-info {
            font-size: 16px;
            margin-bottom: 10px;
        }

        .exam-info {
            font-size: 14px;
            color: #555;
        }

        .passport-photo {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -20%);
            width: 80px;
            height: 100px;
            border: 2px dashed #333; /* Mengganti solid dengan dashed */
            background-color: #eee; /* Memberikan latar belakang abu-abu */
        }
    </style>
</head>
<body>

    <div class="card">
        <div class="card-header">
            {{-- <img src="logo.png" alt="Logo" class="logo"> --}}
            <h3>Kartu Ujian</h3>
        </div>
        <div class="card-body">
            <div class="student-info">
                <strong>No Registrasi:</strong> {{ $cetak->id }}<br>
                <strong>Nama Siswa:</strong> {{ $cetak->name }}<br>
                <strong>Jenjang:</strong> {{ $cetak->muridDetail->jenjang }}<br>
            </div>
            <div class="exam-info">
                <strong>Tanggal Ujian:</strong> 12 Januari 2023<br>
                <strong>Waktu:</strong> 09:00 - 11:00 WIB<br>
                <strong>Ruang:</strong> Aula Utama<br>
            </div>
            {{-- <img src="{{ asset('storage/images/berkas_murid/' .$cetak->berkas->foto) }}" alt="Pas Foto" class="passport-photo"> --}}
            <div class="passport-photo"></div>
        </div>
    </div>

</body>
</html>
