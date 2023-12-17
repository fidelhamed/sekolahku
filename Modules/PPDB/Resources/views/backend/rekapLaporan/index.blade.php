@extends('layouts.backend.app')

@section('title')
    Rekap Laporan
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Rekap Laporan Pendaftar</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-6">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Rekap Laporan Pendaftar</h4>
                    </div>
                    <div class="card-body">
                        <form action="{{ url('ppdb/rekap-laporan/cetak') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Jenjang</label>
                                        <select name="jenjang" class="form-control">
                                            <option value="">-- Pilih --</option>
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
                                <div class="col-12">
                                    <div class="form-group">
                                        <label class="form-label">Status Pendaftar</label>
                                        <select name="status" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Terverifikasi">Lulus Administrasi</option>
                                            <option value="Lulus">Lulus</option>
                                            <option value="Tidak Lulus">Tidak Lulus</option>
                                         </select>
                                        @error('status')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <button class="btn btn-success" type="submit"><i data-feather="printer"></i> Cetak</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>

    </div>
</div>
@endsection