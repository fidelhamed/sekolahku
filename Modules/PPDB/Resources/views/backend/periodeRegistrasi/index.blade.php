@extends('layouts.backend.app')

@section('title')
    Form Periode Registrasi
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Form Periode Registrasi Calon Peserta Didik</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-6 col-sm-12">
                @if (Auth::user()->userDetail->pj_jenjang == 'TKTQ')
                {{-- TKTQ Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi TKTQ Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeTKTQReguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeTKTQReguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi TKTQ Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeTKTQPrestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeTKTQPrestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi TKTQ 2 Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeTKTQ2Reguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeTKTQ2Reguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi TKTQ 2 Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeTKTQ2Prestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeTKTQ2Prestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi SD IT Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSDITReguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSDITReguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi SD IT Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSDITPrestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSDITPrestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi SD IT 2 Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSDIT2Reguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSDIT2Reguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                {{-- SD IT 2 Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi SD IT 2 Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSDIT2Prestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSDIT2Prestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi SMP IT Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSMPITReguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSMPITReguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi SMP IT Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSMPITPrestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSMPITPrestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                {{-- SMA IT Reguler --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi SMA IT Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSMAITReguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSMAITReguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                {{-- SMA IT Prestasi --}}
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi SMA IT Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSMAITPrestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSMAITPrestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi MA Jalur Reguler</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeMAReguler->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeMAReguler->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
                        <h4>Periode Registrasi MA Jalur Prestasi</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
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
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Buka Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeMAPrestasi->tgl_buka }}"/>
                                        @error('tgl_buka')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Tanggal Tutup Periode</label>
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeMAPrestasi->tgl_tutup }}"/>
                                        @error('tgl_tutup')
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
        </div>
    </div>
</div>
@endsection