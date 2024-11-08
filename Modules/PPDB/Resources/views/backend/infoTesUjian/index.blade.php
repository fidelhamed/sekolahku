@extends('layouts.backend.app')

@section('title')
    Form Informasi Observasi dan Wawancara
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Informasi Observasi dan Wawancara Calon Peserta Didik</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')
                {{-- TKTQ Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara TKTQ Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ" selected>TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoTKTQReguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoTKTQReguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoTKTQReguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoTKTQReguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoTKTQReguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoTKTQReguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- TKTQ Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara TKTQ Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ" selected>TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoTKTQPrestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoTKTQPrestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoTKTQPrestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoTKTQPrestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoTKTQPrestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoTKTQPrestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- TKTQ 2 Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara TKTQ 2 Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2" selected>TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoTKTQ2Reguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoTKTQ2Reguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoTKTQ2Reguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoTKTQ2Reguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoTKTQ2Reguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoTKTQ2Reguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- TKTQ 2 Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara TKTQ 2 Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>

                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2" selected>TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoTKTQ2Prestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoTKTQ2Prestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoTKTQ2Prestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoTKTQ2Prestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoTKTQ2Prestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoTKTQ2Prestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>

                @elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT')
                {{-- SD IT Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SD IT Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT" selected>SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>

                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSDITReguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSDITReguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSDITReguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSDITReguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSDITReguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSDITReguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- SD IT Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SD IT Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT" selected>SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>

                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSDITPrestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSDITPrestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSDITPrestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSDITPrestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSDITPrestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSDITPrestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>

            <div class="col-lg-6 col-sm-12">
                {{-- SD IT 2 Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SD IT 2 Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2" selected>SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSDIT2Reguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSDIT2Reguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSDIT2Reguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSDIT2Reguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSDIT2Reguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSDIT2Reguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- SD IT 2 Preastasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SD IT 2 Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2" selected>SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSDIT2Prestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSDIT2Prestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSDIT2Prestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSDIT2Prestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSDIT2Prestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSDIT2Prestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
        
                @elseif (Auth::user()->userDetail->pj_jenjang == 'SMP-IT')
                {{-- SMP IT Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SMP-IT Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT" selected>SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSMPITReguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSMPITReguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSMPITReguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSMPITReguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSMPITReguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSMPITReguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- SMP IT Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SMP-IT Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT" selected>SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSMPITPrestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSMPITPrestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSMPITPrestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSMPITPrestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSMPITPrestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSMPITPrestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>

                @elseif (Auth::user()->userDetail->pj_jenjang == 'SMA-IT')
 
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SMA-IT Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT" selected>SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSMAITReguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSMAITReguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSMAITReguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSMAITReguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSMAITReguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSMAITReguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SMA-IT Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT" selected>SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSMAITPrestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSMAITPrestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSMAITPrestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSMAITPrestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSMAITPrestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSMAITPrestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>

                @elseif (Auth::user()->userDetail->pj_jenjang == 'MA')
            
                {{-- MA Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara MA Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler" selected></option>
                                            <option value="Prestasi"></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA" selected>MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoMAReguler->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoMAReguler->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoMAReguler->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoMAReguler->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoMAReguler->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoMAReguler->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-sm-12">
                {{-- MA Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara MA Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jalur" class="form-control" style="display: none;">
                                            <option value="Reguler"></option>
                                            <option value="Prestasi" selected></option>
                                         </select>
                                        @error('jalur')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA" selected>MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoMAPrestasi->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoMAPrestasi->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoMAPrestasi->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoMAPrestasi->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoMAPrestasi->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoMAPrestasi->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>

                @endif

            </div>
            {{-- <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara TKTQ</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ" selected>TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoTKTQ->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoTKTQ->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoTKTQ->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoTKTQ->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoTKTQ->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoTKTQ->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara TKTQ 2</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2" selected>TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoTKTQ2->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoTKTQ2->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoTKTQ2->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoTKTQ2->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoTKTQ2->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoTKTQ2->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SD IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT" selected>SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>

                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSDIT->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSDIT->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSDIT->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSDIT->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSDIT->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSDIT->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SD IT 2</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2" selected>SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSDIT2->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSDIT2->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSDIT2->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSDIT2->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSDIT2->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSDIT2->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SMP-IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ" selected>TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT" selected>SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSMPIT->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSMPIT->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSMPIT->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSMPIT->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSMPIT->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSMPIT->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara SMA-IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT" selected>SMA IT</option>
                                            <option value="MA">MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoSMAIT->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoSMAIT->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoSMAIT->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoSMAIT->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoSMAIT->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoSMAIT->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Observasi dan Wawancara MA</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/info-tes-ujian/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="TKTQ">TKTQ</option>
                                            <option value="TKTQ-2">TKTQ 2</option>
                                            <option value="SD-IT">SD IT</option>
                                            <option value="SD-IT-2">SD IT 2</option>
                                            <option value="SMP-IT">SMP IT</option>
                                            <option value="SMA-IT">SMA IT</option>
                                            <option value="MA" selected>MA</option>
                                         </select>
                                        @error('jenjang')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal</label>
                                        <input type="date" class="form-control flatpickr-basic @error('waktu_tgl') is-invalid @enderror" id="fp-default" name="waktu_tgl" value="{{ $infoMA->waktu_tgl }}"/>
                                        @error('waktu_tgl')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Mulai</label>
                                        <input type="time" class="form-control @error('jam_mulai') is-invalid @enderror" name="jam_mulai" value="{{ $infoMA->jam_mulai }}" />
                                        @error('jam_mulai')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-4">
                                    <div class="form-group">
                                        <label for="basicInput">Jam Berakhir</label>
                                        <input type="time" class="form-control @error('jam_berakhir') is-invalid @enderror" name="jam_berakhir" value="{{ $infoMA->jam_berakhir }}" />
                                        @error('jam_berakhir')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Laki-Laki</label>
                                        <input type="text" class="form-control @error('lokasi_laki_laki') is-invalid @enderror" name="lokasi_laki_laki" value="{{ $infoMA->lokasi_laki_laki }}"/>
                                        @error('lokasi_laki_laki')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Lokasi Observasi dan Wawancara Perempuan</label>
                                        <input type="text" class="form-control @error('lokasi_perempuan') is-invalid @enderror" name="lokasi_perempuan" value="{{ $infoMA->lokasi_perempuan }}"/>
                                        @error('lokasi_perempuan')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-12">
                                    <div class="form-group">
                                        <label for="basicInput">Deskripsi</label>
                                        <textarea name="deskripsi" class="form-control @error('deskripsi') is-invalid @enderror" cols="30" rows="3">{{ $infoMA->deskripsi }}</textarea>
                                        @error('deskripsi')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            <button class="btn btn-success" type="submit">Simpan</button>
                        </form>
                    </div>
                </div>
            </div> --}}
        </div>

    </div>
</div>
@endsection