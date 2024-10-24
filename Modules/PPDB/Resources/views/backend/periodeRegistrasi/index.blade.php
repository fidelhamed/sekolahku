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
                    <h2>Form Periode Registrasi Calon Murid</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi SD-IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="SD-IT" selected>SD-IT</option>
                                            <option value="SMP-IT">SMP-IT</option>
                                            <option value="SMA-IT">SMA-IT</option>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSDIT->tgl_buka }}"/>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSDIT->tgl_tutup }}"/>
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
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi SMP-IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="SD-IT">SD-IT</option>
                                            <option value="SMP-IT" selected>SMP-IT</option>
                                            <option value="SMA-IT">SMA-IT</option>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSMPIT->tgl_buka }}"/>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSMPIT->tgl_tutup }}"/>
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
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi SMA-IT</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="SD-IT">SD-IT</option>
                                            <option value="SMP-IT">SMP-IT</option>
                                            <option value="SMA-IT" selected>SMA-IT</option>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeSMAIT->tgl_buka }}"/>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeSMAIT->tgl_tutup }}"/>
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
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Periode Registrasi MA</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/periode-registrasi/update') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <select name="jenjang" class="form-control" style="display: none;">
                                            <option value="SD-IT">SD-IT</option>
                                            <option value="SMP-IT">SMP-IT</option>
                                            <option value="SMA-IT">SMA-IT</option>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_buka') is-invalid @enderror" id="fp-default" name="tgl_buka" value="{{ $periodeMA->tgl_buka }}"/>
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
                                        <input type="date" class="form-control flatpickr-basic @error('tgl_tutup') is-invalid @enderror" id="fp-default" name="tgl_tutup" value="{{ $periodeMA->tgl_tutup }}"/>
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
        </div>

    </div>
</div>
@endsection