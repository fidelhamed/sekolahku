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
                    <h2>Form Pendaftaran PPDB SIT Ash-Shiddiqi Jambi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-4 col-sm-12 mx-auto">
                <div class="text-center">
                    <span class="step">1</span>
                    <span class="step active">2</span>
                    <span class="step">3</span>
                </div>
                <div class="form-info">
                    <p>Langkah 2: Informasi Data Orang Tua</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header header-bottom">
                        <h4>Data Ayah</h4>
                    </div>
                    <div class="card-body">
                        <form action=" {{url('ppdb/form-data-orangtua', Auth::id())}} " method="post" enctype="multipart/form-data">
                            @csrf
                            @method('PUT')
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ayah</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" name="nama_ayah" value="{{ $ortu->nama_ayah }}" placeholder="Nama Ayah" />
                                        @error('nama_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIK Ayah</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('nik_ayah') is-invalid @enderror" name="nik_ayah" value="{{ $ortu->nik_ayah }}" placeholder="NIK Ayah" />
                                        @error('nik_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Ayah</label><span class="text-danger">*</span>
                                        <select name="pendidikan_ayah" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{$ortu->pendidikan_ayah == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{$ortu->pendidikan_ayah == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{$ortu->pendidikan_ayah == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="S1" {{$ortu->pendidikan_ayah == 'S1' ? 'selected' : ''}}>S1</option>
                                            <option value="S2" {{$ortu->pendidikan_ayah == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{$ortu->pendidikan_ayah == 'S3' ? 'selected' : ''}}>S3</option>
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
                                        <label for="basicInput">Pekerjaan Ayah</label><span class="text-danger">*</span>
                                        <select name="pekerjaan_ayah" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Pegawai Negeri" {{$ortu->pekerjaan_ayah == 'Pegawai Negeri' ? 'selected' : ''}} >Pegawai Negeri</option>
                                            <option value="Pegawai Swasta" {{$ortu->pekerjaan_ayah == 'Pegawai Swasta' ? 'selected' : ''}}>Pegawai Swasta</option>
                                            <option value="Wiraswasta" {{$ortu->pekerjaan_ayah == 'Wiraswasta' ? 'selected' : ''}}>Wiraswasta</option>
                                            <option value="TNI/Polri" {{$ortu->pekerjaan_ayah == 'TNI/Polri' ? 'selected' : ''}}>TNI/Polri</option>
                                            <option value="Petani/Nelayan" {{$ortu->pekerjaan_ayah == 'Petani/Nelayan' ? 'selected' : ''}}>Petani/Nelayan</option>
                                            <option value="Buruh" {{$ortu->pekerjaan_ayah == 'Buruh' ? 'selected' : ''}}>Buruh</option>
                                            <option value="Lainnya" {{$ortu->pekerjaan_ayah == 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                                        </select>
                                        @error('pekerjaan_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Instansi Pekerjaan Ayah</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('instansi_ayah') is-invalid @enderror" name="instansi_ayah" value="{{ $ortu->instansi_ayah }}" placeholder="Instansi Pekerjaan Ayah" />
                                        @error('instansi_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Penghasilan Ayah</label><span class="text-danger">*</span>
                                        <select name="penghasilan_ayah" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="0-1" {{$ortu->penghasilan_ayah == '0-1' ? 'selected' : ''}} >0-1 Juta</option>
                                            <option value="2-5" {{$ortu->penghasilan_ayah == '2-5' ? 'selected' : ''}}>2-5 Juta</option>
                                            <option value="6-10" {{$ortu->penghasilan_ayah == '6-10' ? 'selected' : ''}}>6-10 Juta</option>
                                            <option value=">10" {{$ortu->penghasilan_ayah == '>10' ? 'selected' : ''}}>&gt; 10 Juta</option>
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
                                        <label for="basicInput">Alamat Lengkap</label><span class="text-danger">*</span>
                                        <textarea name="alamat_ayah" class="form-control @error('alamat_ayah') is-invalid @enderror" cols="30" rows="3">{{ $ortu->alamat_ayah }}</textarea>
                                        @error('alamat_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Ayah</label><span class="text-danger">*</span>
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                        <input type="number" class="form-control @error('telp_ayah') is-invalid @enderror" name="telp_ayah" value="{{ substr($ortu->telp_ayah, 3) }}" placeholder="8xxxxxxxxx"/>
                                        @error('telp_ayah')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>
                            <hr>
                            {{-- Data Ibu --}}
                            <h4>Data Ibu</h4> <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Ibu</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" name="nama_ibu" value="{{ $ortu->nama_ibu }}" placeholder="Nama Ibu" />
                                        @error('nama_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">NIK Ibu</label><span class="text-danger">*</span>
                                        <input type="number" class="form-control @error('nik_ibu') is-invalid @enderror" name="nik_ibu" value="{{ $ortu->nik_ibu }}" placeholder="NIK Ibu" />
                                        @error('nik_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Pendidikan Ibu</label><span class="text-danger">*</span>
                                        <select name="pendidikan_ibu" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="SD" {{$ortu->pendidikan_ibu == 'SD' ? 'selected' : ''}} >SD</option>
                                            <option value="SMP" {{$ortu->pendidikan_ibu == 'SMP' ? 'selected' : ''}}>SMP</option>
                                            <option value="SMA/SMK" {{$ortu->pendidikan_ibu == 'SMA/SMK' ? 'selected' : ''}}>SMA/SMK</option>
                                            <option value="S1" {{$ortu->pendidikan_ibu == 'S1' ? 'selected' : ''}}>S1</option>
                                            <option value="S2" {{$ortu->pendidikan_ibu == 'S2' ? 'selected' : ''}}>S2</option>
                                            <option value="S3" {{$ortu->pendidikan_ibu == 'S3' ? 'selected' : ''}}>S3</option>
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
                                        <label for="basicInput">Pekerjaan Ibu</label><span class="text-danger">*</span>
                                        <select name="pekerjaan_ibu" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="Ibu Rumah Tangga" {{$ortu->pekerjaan_ibu == 'Ibu Rumah Tangga' ? 'selected' : ''}} >Ibu Rumah Tangga</option>
                                            <option value="Pegawai Negeri" {{$ortu->pekerjaan_ibu == 'Pegawai Negeri' ? 'selected' : ''}} >Pegawai Negeri</option>
                                            <option value="Pegawai Swasta" {{$ortu->pekerjaan_ibu == 'Pegawai Swasta' ? 'selected' : ''}}>Pegawai Swasta</option>
                                            <option value="Wiraswasta" {{$ortu->pekerjaan_ibu == 'Wiraswasta' ? 'selected' : ''}}>Wiraswasta</option>
                                            <option value="TNI/Polri" {{$ortu->pekerjaan_ibu == 'TNI/Polri' ? 'selected' : ''}}>TNI/Polri</option>
                                            <option value="Petani/Nelayan" {{$ortu->pekerjaan_ibu == 'Petani/Nelayan' ? 'selected' : ''}}>Petani/Nelayan</option>
                                            <option value="Buruh" {{$ortu->pekerjaan_ibu == 'Buruh' ? 'selected' : ''}}>Buruh</option>
                                            <option value="Lainnya" {{$ortu->pekerjaan_ibu == 'Lainnya' ? 'selected' : ''}}>Lainnya</option>
                                        </select>
                                        @error('pekerjaan_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Instansi Pekerjaan Ibu</label><span class="text-danger">*</span>
                                        <input type="text" class="form-control @error('instansi_ibu') is-invalid @enderror" name="instansi_ibu" value="{{ $ortu->instansi_ibu }}" placeholder="Instansi Pekerjaan Ibu" />
                                        @error('instansi_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Penghasilan Ibu</label><span class="text-danger">*</span>
                                        <select name="penghasilan_ibu" class="form-control">
                                            <option value="">-- Pilih --</option>
                                            <option value="0-1" {{$ortu->penghasilan_ibu == '0-1' ? 'selected' : ''}} >0-1 Juta</option>
                                            <option value="2-5" {{$ortu->penghasilan_ibu == '2-5' ? 'selected' : ''}}>2-5 Juta</option>
                                            <option value="6-10" {{$ortu->penghasilan_ibu == '6-10' ? 'selected' : ''}}>6-10 Juta</option>
                                            <option value=">10" {{$ortu->penghasilan_ibu == '>10' ? 'selected' : ''}}>&gt; 10 Juta</option>
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
                                        <label for="basicInput">Alamat Lengkap</label><span class="text-danger">*</span>
                                        <textarea name="alamat_ibu" class="form-control @error('alamat_ibu') is-invalid @enderror" cols="30" rows="3">{{ $ortu->alamat_ibu }}</textarea>
                                        @error('alamat_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">No Telp Ibu</label><span class="text-danger">*</span>
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                        <input type="number" class="form-control @error('telp_ibu') is-invalid @enderror" name="telp_ibu" value="{{ substr($ortu->telp_ibu, 3) }}" placeholder="8xxxxxxxxx" />
                                        @error('telp_ibu')
                                            <div class="invalid-feedback">
                                            <strong>{{ $message }}</strong>
                                            </div>
                                        @enderror
                                    </div>
                                </div>
                            </div>

                            {{-- Data Wali Opsional --}}
                            <h4>Data Wali</h4> <br>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="basicInput">Nama Wali</label>
                                        <input type="text" class="form-control @error('nama_wali') is-invalid @enderror" name="nama_wali" value="{{ $ortu->nama_wali }}" placeholder="Nama Wali" />
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
                                        <span class="input-group-text" id="basic-addon1">+62</span>
                                        <input type="number" class="form-control @error('telp_wali') is-invalid @enderror" name="telp_wali" value="{{ substr($ortu->telp_wali, 3) }}" placeholder="8xxxxxxxxx"/>
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
                                        <textarea name="alamat_wali" class="form-control @error('alamat_wali') is-invalid @enderror" cols="30" rows="3">{{ $ortu->alamat_wali }}</textarea>
                                        @error('alamat_wali')
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
        text: "Pastikan terlebih dahulu data yang akan disubmit sudah benar. Lanjutkan submit data orang tua?",
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