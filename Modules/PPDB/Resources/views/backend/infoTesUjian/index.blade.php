@extends('layouts.backend.app')

@section('title')
    Form Informasi Tes dan Ujian
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Informasi Tes dan Ujian Calon Peserta Didik</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-md-12">
                @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')

                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian TKTQ</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian TKTQ 2</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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

                @elseif (Auth::user()->userDetail->pj_jenjang == 'SD-IT')
        
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian SD IT</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
            <div class="col-lg-6 col-sm-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian SD IT 2</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
        
                @elseif (Auth::user()->userDetail->pj_jenjang == 'SMP-IT')
        
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian SMP-IT</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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

                @elseif (Auth::user()->userDetail->pj_jenjang == 'SMA-IT')
 
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian SMA-IT</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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

                @elseif (Auth::user()->userDetail->pj_jenjang == 'MA')
            
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian MA</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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

                @endif

            </div>
            {{-- <div class="col-lg-6 col-md-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Informasi Tes dan Ujian TKTQ</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
                        <h4>Informasi Tes dan Ujian TKTQ 2</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
                        <h4>Informasi Tes dan Ujian SD IT</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
                        <h4>Informasi Tes dan Ujian SD IT 2</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
                        <h4>Informasi Tes dan Ujian SMP-IT</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
                        <h4>Informasi Tes dan Ujian SMA-IT</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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
                        <h4>Informasi Tes dan Ujian MA</h4>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Laki-Laki</label>
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
                                        <label for="basicInput">Lokasi Tes dan Ujian Perempuan</label>
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