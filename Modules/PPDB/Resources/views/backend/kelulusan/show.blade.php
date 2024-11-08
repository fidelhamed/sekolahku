@extends('layouts.backend.app')

@section('title')
    Detail
@endsection

@section('content')
<style>
  .hidden {
    display: none
  }
</style>
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

    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>PPDB SIT Ash-Shiddiiqi Jambi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
              <div class="alert alert-danger {{$murid->berkas->foto != NULL ? 'hidden' : ''}}" role="alert">
                    <div class="alert-body">
                        <strong>Info:</strong> Data Calon Murid Belum Lengkap !
                    </div>
                </div>
                <div class="card">
                    <div class="card-body">
                        <form action=" {{route('data-kelulusan.update',$murid->id)}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <h4>Data Murid</h4> <br>
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Nomor Registrasi</label>
                                        <input type="text" class="form-control @error('noreg') is-invalid @enderror" name="noreg" value="{{$murid->muridDetail->noreg}}" placeholder="Nomor Registrasi" disabled />
                                        @error('noreg')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Lengkap</label>
                                        <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{$murid->name}}" placeholder="Nama Lengkap" disabled />
                                        @error('name')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Panggilan</label>
                                        <input type="text" class="form-control @error('nama_panggilan') is-invalid @enderror" name="nama_panggilan" value="{{$murid->muridDetail->nama_panggilan}}" disabled/>
                                        @error('nama_panggilan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIK</label>
                                        <input type="number" class="form-control @error('nik') is-invalid @enderror" name="nik"value="{{$murid->muridDetail->nik}}" placeholder="NIK" disabled/>
                                        @error('nik')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NISN</label>
                                        <input type="number" class="form-control @error('nisn') is-invalid @enderror" name="nisn"value="{{$murid->muridDetail->nisn}}"/>
                                        @error('nisn')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Email Address</label>
                                        <input type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{$murid->email}}" placeholder="Email Address" disabled />
                                        @error('email')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jenis Kelamin</label>
                                        <select name="jenis_kelamin" class="form-control @error('jenis_kelamin') is-invalid @enderror" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="Laki-laki" {{$murid->muridDetail->jenis_kelamin == 'Laki-laki' ? 'selected' : ''}}>Laki-laki</option>
                                            <option value="Perempuan" {{$murid->muridDetail->jenis_kelamin == 'Perempuan' ? 'selected' : ''}}>Perempuan</option>
                                           </select>
                                        @error('jenis_kelamin')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tempat Lahir</label>
                                        <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" name="tempat_lahir" value="{{$murid->muridDetail->tempat_lahir}}" disabled/>
                                        @error('tempat_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Lahir</label>
                                        <input type="text" class="form-control @error('tgl_lahir') is-invalid @enderror" name="tgl_lahir" value="{{$murid->muridDetail->tgl_lahir}}" disabled/>
                                        @error('tgl_lahir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Anak Ke-</label>
                                        <input type="number" class="form-control @error('anak_ke') is-invalid @enderror" name="anak_ke" value="{{$murid->muridDetail->anak_ke}}" disabled/>
                                        @error('anak_ke')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Jumlah Saudara Kandung</label>
                                        <input type="number" class="form-control @error('jumlah_saudara') is-invalid @enderror" name="jumlah_saudara" value="{{$murid->muridDetail->jumlah_saudara}}" disabled/>
                                        @error('jumlah_saudara')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp</label>
                                        <input type="text" class="form-control @error('telp') is-invalid @enderror" name="telp" value="{{$murid->muridDetail->telp}}"disabled/>
                                        @error('telp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No WhatsApp</label>
                                        <input type="text" class="form-control @error('whatsapp') is-invalid @enderror" name="whatsapp" value="{{$murid->muridDetail->whatsapp}}" disabled/>
                                        @error('whatsapp')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label>
                                        <textarea name="alamat" class="form-control @error('alamat') is-invalid @enderror" cols="30" rows="3" disabled>{{$murid->muridDetail->alamat}}</textarea>
                                        @error('alamat')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kelurahan/Desa</label>
                                        <input type="text" class="form-control @error('kelurahan') is-invalid @enderror" name="kelurahan" value="{{$murid->muridDetail->kelurahan}}" disabled/>
                                        @error('kelurahan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kecamatan</label>
                                        <input type="text" class="form-control @error('kecamatan') is-invalid @enderror" name="kecamatan" value="{{$murid->muridDetail->kecamatan}}" disabled/>
                                        @error('kecamatan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kabupaten/Kota</label>
                                        <input type="text" class="form-control @error('kabupaten') is-invalid @enderror" name="kabupaten" value="{{$murid->muridDetail->kabupaten}}" disabled/>
                                        @error('kabupaten')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Provinsi</label>
                                        <input type="text" class="form-control @error('provinsi') is-invalid @enderror" name="provinsi" value="{{$murid->muridDetail->provinsi}}" disabled/>
                                        @error('provinsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kode Pos</label>
                                        <input type="number" class="form-control @error('kode_pos') is-invalid @enderror" name="kode_pos" value="{{$murid->muridDetail->kode_pos}}" disabled/>
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
                                        <label for="basicInput">Nama Sekolah Asal</label>
                                        <input type="text" class="form-control @error('nama_sekolah_asal') is-invalid @enderror" name="nama_sekolah_asal" value="{{$murid->muridDetail->nama_sekolah_asal}}" disabled/>
                                        @error('nama_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NPSN Sekolah Asal</label>
                                        <input type="number" class="form-control @error('npsn_sekolah_asal') is-invalid @enderror" name="npsn_sekolah_asal" value="{{$murid->muridDetail->npsn_sekolah_asal}}" disabled/>
                                        @error('npsn_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kecamatan Sekolah Asal</label>
                                        <input type="text" class="form-control @error('kecamatan_sekolah_asal') is-invalid @enderror" name="kecamatan_sekolah_asal" value="{{$murid->muridDetail->kecamatan_sekolah_asal}}" disabled/>
                                        @error('kecamatan_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Kabupaten/Kota Sekolah Asal</label>
                                        <input type="text" class="form-control @error('kabupaten_sekolah_asal') is-invalid @enderror" name="kabupaten_sekolah_asal" value="{{$murid->muridDetail->kabupaten_sekolah_asal}}" disabled/>
                                        @error('kabupaten_sekolah_asal')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lingkar Kepala</label>
                                        <input type="number" class="form-control @error('lingkar_kepala') is-invalid @enderror" name="lingkar_kepala" placeholder="Dalam cm" value="{{$murid->muridDetail->lingkar_kepala}}" disabled/>
                                        @error('lingkar_kepala')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tinggi Badan</label>
                                        <input type="number" class="form-control @error('tinggi_badan') is-invalid @enderror" name="tinggi_badan" placeholder="Dalam cm" value="{{$murid->muridDetail->tinggi_badan}}" disabled/>
                                        @error('tinggi_badan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Berat Badan</label>
                                        <input type="number" class="form-control @error('berat_badan') is-invalid @enderror" name="berat_badan" placeholder="Dalam kg" value="{{$murid->muridDetail->berat_badan}}" disabled/>
                                        @error('berat_badan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Golongan Darah</label>
                                        <input type="text" class="form-control @error('gol_darah') is-invalid @enderror" name="gol_darah" value="{{$murid->muridDetail->gol_darah}}" disabled/>
                                        @error('gol_darah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Sakit Pernah Diderita</label>
                                        <textarea name="sakit" class="form-control @error('sakit') is-invalid @enderror" cols="30" rows="3" disabled>{{$murid->muridDetail->sakit}}</textarea>
                                        @error('sakit')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Prestasi Pernah Diraih</label>
                                        <textarea name="prestasi" class="form-control @error('prestasi') is-invalid @enderror" cols="30" rows="3" disabled>{{$murid->muridDetail->prestasi}}</textarea>
                                        @error('prestasi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>

                            </div> <br>
                            <h4>Data Ayah</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ayah</label>
                                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{$murid->dataOrtu->nama_ayah}}" placeholder="Nama Ayah" disabled />
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Ayah</label>
                                        <input type="text" class="form-control @error('telp_ayah') is-invalid @enderror" name="telp_ayah" value="{{$murid->dataOrtu->telp_ayah}}" placeholder="telp Ayah" disabled />
                                        @error('telp_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Ayah</label>
                                        <select name="pendidikan_ayah" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{$murid->dataOrtu->pendidikan_ayah == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{$murid->dataOrtu->pendidikan_ayah == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{$murid->dataOrtu->pendidikan_ayah == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="SI" {{$murid->dataOrtu->pendidikan_ayah == 'S1' ? 'selected' : ''}}>SI</option>
                                            <option value="S2" {{$murid->dataOrtu->pendidikan_ayah == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{$murid->dataOrtu->pendidikan_ayah == 'S3' ? 'selected' : ''}}>S3</option>
                                        </select>
                                        @error('pendidikan_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pekerjaan Ayah</label>
                                        <select name="pekerjaan_ayah" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="Pegawai Negeri" {{$murid->dataOrtu->pekerjaan_ayah == 'Pegawai Negeri' ? 'selected' : ''}} >Pegawai Negeri</option>
                                            <option value="Pegawai Swasta" {{$murid->dataOrtu->pekerjaan_ayah == 'Pegawai Swasta' ? 'selected' : ''}}>Pegawai Swasta</option>
                                            <option value="Wiraswasta" {{$murid->dataOrtu->pekerjaan_ayah == 'Wiraswasta' ? 'selected' : ''}}>Wiraswasta</option>
                                            <option value="TNI/Polri" {{$murid->dataOrtu->pekerjaan_ayah == 'TNI/Polri' ? 'selected' : ''}}>TNI/Polri</option>
                                            <option value="Petani/Nelayan" {{$murid->dataOrtu->pekerjaan_ayah == 'Petani/Nelayan' ? 'selected' : ''}}>Petani/Nelayan</option>
                                            <option value="Buruh" {{$murid->dataOrtu->pekerjaan_ayah == 'Buruh' ? 'selected' : ''}}>Buruh</option>
                                            <option value="Lainnya" {{$murid->dataOrtu->pekerjaan_ayah == 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                                        </select>
                                        @error('pendidikan_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Instansi Pekerjaan Ayah</label>
                                        <input type="text" class="form-control @error('instansi_ayah') is-invalid @enderror" name="instansi_ayah" value="{{ $murid->dataOrtu->instansi_ayah }}" disabled/>
                                        @error('instansi_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Penghasilan Ayah</label>
                                        <select name="penghasilan_ayah" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="0-1" {{$murid->dataOrtu->penghasilan_ayah == '0-1' ? 'selected' : ''}} >0-1 Juta</option>
                                            <option value="2-5" {{$murid->dataOrtu->penghasilan_ayah == '2-5' ? 'selected' : ''}}>2-5 Juta</option>
                                            <option value="6-10" {{$murid->dataOrtu->penghasilan_ayah == '6-10' ? 'selected' : ''}}>6-10 Juta</option>
                                            <option value=">10" {{$murid->dataOrtu->penghasilan_ayah == '>10' ? 'selected' : ''}}>&gt; 10 Juta</option>
                                        </select>
                                        @error('penghasilan_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label>
                                        <textarea name="alamat_ayah" class="form-control @error('alamat_ayah') is-invalid @enderror" cols="30" rows="3" disabled>{{$murid->dataOrtu->alamat_ayah}}</textarea>
                                        @error('alamat_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <br>
                            {{-- Data Ibu --}}
                            <h4>Data Ibu</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ibu</label>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{$murid->dataOrtu->nama_ibu}}" placeholder="Nama Ibu" disabled />
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Ibu</label>
                                        <input type="text" class="form-control @error('telp_ibu') is-invalid @enderror" name="telp_ibu" value="{{$murid->dataOrtu->telp_ibu}}" placeholder="telp Ibu" disabled />
                                        @error('telp_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Ibu</label>
                                        <select name="pendidikan_ibu" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{$murid->dataOrtu->pendidikan_ibu == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{$murid->dataOrtu->pendidikan_ibu == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{$murid->dataOrtu->pendidikan_ibu == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="SI" {{$murid->dataOrtu->pendidikan_ibu == 'S1' ? 'selected' : ''}}>SI</option>
                                            <option value="S2" {{$murid->dataOrtu->pendidikan_ibu == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{$murid->dataOrtu->pendidikan_ibu == 'S3' ? 'selected' : ''}}>S3</option>
                                        </select>
                                        @error('pendidikan_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pekerjaan Ibu</label>
                                        <select name="pekerjaan_ibu" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="Ibu Rumah Tangga" {{$murid->dataOrtu->pekerjaan_ibu == 'Ibu Rumah Tangga' ? 'selected' : ''}} >Ibu Rumah Tangga</option>
                                            <option value="Pegawai Negeri" {{$murid->dataOrtu->pekerjaan_ibu == 'Pegawai Negeri' ? 'selected' : ''}} >Pegawai Negeri</option>
                                            <option value="Pegawai Swasta" {{$murid->dataOrtu->pekerjaan_ibu == 'Pegawai Swasta' ? 'selected' : ''}}>Pegawai Swasta</option>
                                            <option value="Wiraswasta" {{$murid->dataOrtu->pekerjaan_ibu == 'Wiraswasta' ? 'selected' : ''}}>Wiraswasta</option>
                                            <option value="TNI/Polri" {{$murid->dataOrtu->pekerjaan_ibu == 'TNI/Polri' ? 'selected' : ''}}>TNI/Polri</option>
                                            <option value="Petani/Nelayan" {{$murid->dataOrtu->pekerjaan_ibu == 'Petani/Nelayan' ? 'selected' : ''}}>Petani/Nelayan</option>
                                            <option value="Buruh" {{$murid->dataOrtu->pekerjaan_ibu == 'Buruh' ? 'selected' : ''}}>Buruh</option>
                                            <option value="Lainnya" {{$murid->dataOrtu->pekerjaan_ibu == 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                                        </select>
                                        @error('pendidikan_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Instansi Pekerjaan Ibu</label>
                                        <input type="text" class="form-control @error('instansi_ibu') is-invalid @enderror" name="instansi_ibu" value="{{ $murid->dataOrtu->instansi_ibu }}" disabled/>
                                        @error('instansi_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Penghasilan Ibu</label>
                                        <select name="penghasilan_ibu" class="form-control" disabled>
                                            <option value="">-- Pilih --</option>
                                            <option value="0-1" {{$murid->dataOrtu->penghasilan_ibu == '0-1' ? 'selected' : ''}} >0-1 Juta</option>
                                            <option value="2-5" {{$murid->dataOrtu->penghasilan_ibu == '2-5' ? 'selected' : ''}}>2-5 Juta</option>
                                            <option value="6-10" {{$murid->dataOrtu->penghasilan_ibu == '6-10' ? 'selected' : ''}}>6-10 Juta</option>
                                            <option value=">10" {{$murid->dataOrtu->penghasilan_ibu == '>10' ? 'selected' : ''}}>&gt; 10 Juta</option>
                                        </select>
                                        @error('penghasilan_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap</label>
                                        <textarea name="alamat_ibu" class="form-control @error('alamat_ibu') is-invalid @enderror" cols="30" rows="3" disabled>{{$murid->dataOrtu->alamat_ibu}}</textarea>
                                        @error('alamat_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <br>
                            <h4>Data Wali</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Wali</label>
                                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali" value="{{ $murid->dataOrtu->nama_wali }}" disabled/>
                                        @error('nama_wali')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Wali</label>
                                        <input type="text" class="form-control @error('telp_wali') is-invalid @enderror" name="telp_wali" value="{{ $murid->dataOrtu->telp_wali }}" disabled/>
                                        @error('telp_wali')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Alamat Lengkap Wali</label>
                                        <textarea name="alamat_wali" class="form-control @error('alamat_wali') is-invalid @enderror" cols="30" rows="3" disabled>{{ $murid->dataOrtu->alamat_wali }}</textarea>
                                        @error('alamat_wali')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div> <br>
                            <h4>Berkas Murid</h4>
                            <hr>
                            <div class="row">
                                <div class="col-6">
                                    <ul>
                                        <li>Kartu Keluarga
                                            @if ($murid->berkas->kartu_keluarga && (Str::endsWith(strtolower($murid->berkas->kartu_keluarga), ['.jpg', '.jpeg'])))
                                            <a href="{{ asset('storage/images/berkas_murid/' . $murid->berkas->kartu_keluarga) }}" class="badge badge-info openModalImg {{$murid->berkas->kartu_keluarga == NULL ? 'hidden' : ''}}" data-download-link="{{ asset('storage/images/berkas_murid/' . $murid->berkas->kartu_keluarga) }}" data-title="Kartu Keluarga">View</a>
                                            @elseif ($murid->berkas->kartu_keluarga && (Str::endsWith(strtolower($murid->berkas->kartu_keluarga), '.pdf')))
                                            <a href="#" class="badge badge-info openModalDoc {{$murid->berkas->kartu_keluarga == NULL ? 'hidden' : ''}}" data-toggle="modal" data-target="#viewModal" data-berkas="{{asset('storage/images/berkas_murid/' .$murid->berkas->kartu_keluarga)}}" data-title="Kartu Keluarga">view</a>
                                            @endif
                                        </li>
                                        <li>ijazah
                                            @if ($murid->berkas->ijazah && (Str::endsWith(strtolower($murid->berkas->ijazah), ['.jpg', '.jpeg'])))
                                            <a href="{{ asset('storage/images/berkas_murid/' . $murid->berkas->ijazah) }}" class="badge badge-info openModalImg {{$murid->berkas->ijazah == NULL ? 'hidden' : ''}}" data-download-link="{{ asset('storage/images/berkas_murid/' . $murid->berkas->ijazah) }}" data-title="Ijazah">View</a>
                                            @elseif ($murid->berkas->ijazah && (Str::endsWith(strtolower($murid->berkas->ijazah), '.pdf')))
                                            <a href="#" class="badge badge-info openModalDoc {{$murid->berkas->ijazah == NULL ? 'hidden' : ''}}" data-toggle="modal" data-target="#viewModal" data-berkas="{{asset('storage/images/berkas_murid/' .$murid->berkas->ijazah)}}" data-title="Ijazah">view</a>
                                            @endif
                                        </li>
                                        <li>Pas Foto
                                            <a href="{{ asset('storage/images/berkas_murid/' . $murid->berkas->foto) }}" class="badge badge-info openModalImg {{$murid->berkas->foto == NULL ? 'hidden' : ''}}" data-download-link="{{ asset('storage/images/berkas_murid/' . $murid->berkas->foto) }}" data-title="Pas Foto">View</a>
                                        </li>
                                    </ul>
                                </div>
                                <div class="col-6">
                                    <ul>
                                        <li>Akte Kelahiran
                                            @if ($murid->berkas->akte_kelahiran && (Str::endsWith(strtolower($murid->berkas->akte_kelahiran), ['.jpg', '.jpeg'])))
                                            <a href="{{ asset('storage/images/berkas_murid/' . $murid->berkas->akte_kelahiran) }}" class="badge badge-info openModalImg {{$murid->berkas->akte_kelahiran == NULL ? 'hidden' : ''}}" data-download-link="{{ asset('storage/images/berkas_murid/' . $murid->berkas->akte_kelahiran) }}" data-title="Akta Kelahiran">View</a>
                                            @elseif ($murid->berkas->akte_kelahiran && (Str::endsWith(strtolower($murid->berkas->akte_kelahiran), '.pdf')))
                                            <a href="#" class="badge badge-info openModalDoc {{$murid->berkas->akte_kelahiran == NULL ? 'hidden' : ''}}" data-toggle="modal" data-target="#viewModal" data-berkas="{{asset('storage/images/berkas_murid/' .$murid->berkas->akte_kelahiran)}}" data-title="Akta Kelahiran">view</a>
                                            @endif
                                        </li>
                                        <li>Rapor
                                            @if ($murid->berkas->rapor && (Str::endsWith(strtolower($murid->berkas->rapor), ['.jpg', '.jpeg'])))
                                            <a href="{{ asset('storage/images/berkas_murid/' . $murid->berkas->rapor) }}" class="badge badge-info openModalImg {{$murid->berkas->rapor == NULL ? 'hidden' : ''}}" data-download-link="{{ asset('storage/images/berkas_murid/' . $murid->berkas->rapor) }}" data-title="Rapor">View</a>
                                            @elseif ($murid->berkas->rapor && (Str::endsWith(strtolower($murid->berkas->rapor), '.pdf')))
                                            <a href="#" class="badge badge-info openModalDoc {{$murid->berkas->rapor == NULL ? 'hidden' : ''}}" data-toggle="modal" data-target="#viewModal" data-berkas="{{asset('storage/images/berkas_murid/' . $murid->berkas->rapor)}}" data-title="Rapor">view</a>
                                            @endif
                                        </li>
                                        <li>Bukti Pembayaran/Prestasi
                                            @if ($murid->paymentRegis->file && (Str::endsWith(strtolower($murid->paymentRegis->file), ['.jpg', '.jpeg', '.png'])))
                                            <a href="{{ asset('storage/images/payment_pendaftaran/' .$murid->paymentRegis->file) }}" class="badge badge-info openModalImg {{$murid->paymentRegis->approve_date == null ? 'hidden' : ''}}" data-download-link="{{ asset('storage/images/payment_pendaftaran/' . $murid->paymentRegis->file) }}" data-title="Bukti Pembayaran">View</a>
                                            @elseif ($murid->paymentRegis->file && (Str::endsWith(strtolower($murid->paymentRegis->file), '.pdf')))
                                            <a href="#" class="badge badge-info openModalDoc {{$murid->paymentRegis->approve_date == null ? 'hidden' : ''}}" data-toggle="modal" data-target="#viewModal" data-berkas="{{asset('storage/images/payment_pendaftaran/' .$murid->paymentRegis->file)}}" data-title="Bukti Pembayaran">View</a>
                                            @endif
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit" style="display: {{ $murid->role !== 'Lulus' ? 'none' : '' }}">Simpan</button>
                            <a href="{{url('ppdb/data-kelulusan?jenjangKelulusan='. $murid->muridDetail->jenjang)}}" class="btn btn-secondary">Batal</a>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        {{-- Modal pdf --}}
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Doc</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px">
                    <iframe id="viewBerkas" width="100%" height="100%" src=""></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
        </div>

        {{-- Modal gambar --}}
        <div class="modal" tabindex="-1" role="dialog" id="imgModal">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="berkasTitle">View Doc</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img id="docImage" src="" alt="View Doc Image" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <a id="downloadButton" class="btn btn-success" download>Download</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
        </div>            
    </div>
</div>
@endsection
@section('scripts')
<script>
    $(document).ready(function() {
      // Handle click event on the view button
      $('.openModalDoc').on('click', function() {
        // Get the image source from the data-image attribute
        // var imageUrl = $(this).data('image');
        var berkas = $(this).data('berkas');
        var berkasTitle = $(this).data('title');

        // Set the image source in the modal
        // $('#viewImage').attr('src', imageUrl);
        $('#viewBerkas').attr('src', berkas);
        $('#exampleModalLabel').text(berkasTitle);

        // Set the download button link
        $('#downloadButton').attr('href', berkas);
  
        // Open the modal
        $('#viewModal').modal('show');
      });
    });
</script>
<script>
    $(document).ready(function() {
      // Handle click event on the button to open the modal
      $('.openModalImg').on('click', function() {
        // Get the image source from the link's href attribute
        var docImageSrc = $(this).attr('href');
        var downloadLink = $(this).attr('data-download-link');
        var berkasTitle = $(this).data('title');
  
        // Set the image source in the modal
        $('#docImage').attr('src', docImageSrc);
        $('#downloadButton').attr('href', downloadLink);
        $('#berkasTitle').text(berkasTitle);
  
        // Open the modal
        $('#imgModal').modal('show');
  
        // Prevent the default behavior of the link
        return false;
      });
    });
</script>
@endsection