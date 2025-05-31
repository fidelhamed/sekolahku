@extends('layouts.backend.app')

@section('title')
    Form Pendaftaran
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Form Pendaftaran PPDB SIT Ash-Shiddiiqi Jambi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-4 col-sm-12 mx-auto">
                <div class="text-center">
                    <span class="step active">1</span>
                    <span class="step">2</span>
                    <span class="step">3</span>
                </div>
                <div class="form-info">
                    <p>Langkah 1: Informasi Data Pribadi</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action=" {{url('ppdb/form-pendaftaran', Auth::id())}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name"value="{{$user->name}}" placeholder="Nama Lengkap" readonly/>
                                        @error('name')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIK</label><span class="text-danger">(Wajib)</span>
                                        <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"value="{{old('nik', $user->muridDetail->nik)}}" placeholder="NIK"/>
                                        @error('nik')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Panggilan</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" value="{{old('nama_panggilan', $user->muridDetail->nama_panggilan)}}"/>
                                        @error('nama_panggilan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NISN</label><span class="text-danger">(Wajib)</span>
                                        <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn"value="{{old('nisn', $user->muridDetail->nisn)}}"/>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tempat Lahir</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{old('tempat_lahir', $user->muridDetail->tempat_lahir)}}"/>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Lahir</label><span class="text-danger">(Wajib)</span>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_lahir') is-invalid @enderror" id="fp-default" name="tgl_lahir" value="{{old('tgl_lahir', $user->muridDetail->tgl_lahir)}}"/>
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Anak Ke-</label><span class="text-danger">(Wajib)</span>
                                        <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke" value="{{old('anak_ke', $user->muridDetail->anak_ke)}}"/>
                                        @error('anak_ke')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jumlah Saudara Kandung</label><span class="text-danger">(Wajib)</span>
                                        <input type="number" class="form-control @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara" value="{{old('jumlah_saudara', $user->muridDetail->jumlah_saudara)}}"/>
                                        @error('jumlah_saudara')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp</label><span class="text-danger">(Wajib)</span>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                            <input 
                                                type="number" 
                                                class="form-control @error('telp') is-invalid @enderror" 
                                                name="telp" 
                                                value="{{old('telp', substr($user->muridDetail->telp, 3))}}" 
                                                placeholder="Contoh: 822xxxxxxxx"
                                                autofocus
                                                tabindex="1" 
                                            />
                                        </div>
                                        @error('telp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No WhatsApp</label><span class="text-danger">(Wajib)</span>
                                        <div class="input-group">
                                            <span class="input-group-text" id="basic-addon1">+62</span>
                                            <input
                                                type="number" 
                                                class="form-control @error('whatsapp') is-invalid @enderror" 
                                                name="whatsapp" 
                                                value="{{old('whatsapp', substr($user->muridDetail->whatsapp, 3))}}" 
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
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label><span class="text-danger">(Wajib)</span>
                                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror">
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{old('jenis_kelamin', $user->muridDetail->jenis_kelamin) == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                            <option value="Perempuan" {{old('jenis_kelamin', $user->muridDetail->jenis_kelamin) == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                           </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label><span class="text-danger">(Wajib)</span>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3">{{old('alamat', $user->muridDetail->alamat)}}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kelurahan/Desa</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{old('kelurahan', $user->muridDetail->kelurahan)}}"/>
                                        @error('kelurahan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kecamatan</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{old('kecamatan', $user->muridDetail->kecamatan)}}"/>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kabupaten/Kota</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" value="{{old('kabupaten', $user->muridDetail->kabupaten)}}"/>
                                        @error('kabupaten')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Provinsi</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{old('provinsi', $user->muridDetail->provinsi)}}"/>
                                        @error('provinsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kode Pos</label><span class="text-danger">(Wajib)</span>
                                        <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{old('kode_pos', $user->muridDetail->kode_pos)}}"/>
                                        @error('kode_pos')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Sekolah Asal</label><span class="text-danger">(Wajib)</span>
                                        <input type="text" class="form-control @error('nama_sekolah_asal') is-invalid @enderror" name="nama_sekolah_asal" value="{{old('nama_sekolah_asal', $user->muridDetail->nama_sekolah_asal)}}"/>
                                        @error('nama_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NPSN Sekolah Asal</label><span class="text-secondary">(Opsional)</span>
                                        <input type="number" class="form-control @error('npsn_sekolah_asal') is-invalid @enderror" name="npsn_sekolah_asal" value="{{old('npsn_sekolah_asal', $user->muridDetail->npsn_sekolah_asal)}}"/>
                                        @error('npsn_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kecamatan Sekolah Asal</label><span class="text-secondary">(Opsional)</span>
                                        <input type="text" class="form-control @error('kecamatan_sekolah_asal') is-invalid @enderror" name="kecamatan_sekolah_asal" value="{{old('kecamatan_sekolah_asal', $user->muridDetail->kecamatan_sekolah_asal)}}"/>
                                        @error('kecamatan_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kabupaten/Kota Sekolah Asal</label><span class="text-secondary">(Opsional)</span>
                                        <input type="text" class="form-control @error('kabupaten_sekolah_asal') is-invalid @enderror" name="kabupaten_sekolah_asal" value="{{old('kabupaten_sekolah_asal', $user->muridDetail->kabupaten_sekolah_asal)}}"/>
                                        @error('kabupaten_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lingkar Kepala</label><span class="text-secondary">(Opsional)</span>
                                        <input type="number" class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala" placeholder="Dalam cm" value="{{old('lingkar_kepala', $user->muridDetail->lingkar_kepala)}}"/>
                                        @error('lingkar_kepala')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tinggi Badan</label><span class="text-secondary">(Opsional)</span>
                                        <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" placeholder="Dalam cm" value="{{old('tinggi_badan', $user->muridDetail->tinggi_badan)}}"/>
                                        @error('tinggi_badan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Berat Badan</label><span class="text-secondary">(Opsional)</span>
                                        <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" placeholder="Dalam kg" value="{{old('berat_badan', $user->muridDetail->berat_badan)}}"/>
                                        @error('berat_badan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Golongan Darah</label><span class="text-secondary">(Opsional)</span>
                                        <input type="text" class="form-control @error('gol_darah') is-invalid @enderror" name="gol_darah" value="{{old('gol_darah', $user->muridDetail->gol_darah)}}"/>
                                        @error('gol_darah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Sakit Pernah Diderita</label><span class="text-secondary">(Opsional)</span>
                                        <textarea name="sakit" class="form-control @error('sakit') is-invalid @enderror" cols="30" rows="3">{{old('sakit', $user->muridDetail->sakit)}}</textarea>
                                        @error('sakit')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Prestasi Pernah Diraih</label><span class="text-secondary">(Opsional)</span>
                                        <textarea name="prestasi" class="form-control @error('prestasi') is-invalid @enderror" cols="30" rows="3">{{old('prestasi', $user->muridDetail->prestasi)}}</textarea>
                                        @error('prestasi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div>
                            <button class="btn btn-success" type="submit" id="submitData">Simpan</button>
                            <a href="/home" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection
@section('scripts')
<script>
$(document).on('click', '#submitData', function (e) {
    // Mencegah form submit secara langsung
    e.preventDefault();

    // Menampilkan alert konfirmasi
    Swal.fire({
        title: 'Submit Data',
        text: "Pastikan terlebih dahulu data yang akan disubmit sudah benar. Lanjutkan submit data diri?",
        icon: 'question',
        showCancelButton: true,
        confirmButtonColor: '#28a745', // Warna Success
        cancelButtonColor: '#dc3545', // Warna Danger
        confirmButtonText: 'Ya, Submit',
        cancelButtonText: 'Batal'
    }).then((result) => {
        if (result.isConfirmed) {
            // Jika pengguna mengkonfirmasi, submit form
            $(this).closest('form').submit();
        }
    });
});
</script>
@endsection