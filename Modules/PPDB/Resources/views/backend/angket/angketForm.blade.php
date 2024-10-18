@extends('layouts.backend.app')

@section('title')
    Form Angket
@endsection

@section('content')
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2>Form Angket PPDB IBS Ash-Shiddiiqi Jambi</h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-lg-4 col-sm-12 mx-auto">
                <div class="form-info">
                    <p>Angket berikut wajib di isi oleh orang tua atau wali dari anak yang bersangkutan</p>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <form action="{{ route('ppdb.submit-angket-form') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            @method('POST')
                            @foreach($angkets as $key => $angket)
                            <div class="row mb-1">
                                <div class="col-12">
                                    <label for="pertanyaan_{{ $angket->id }}"><strong>{{ $key + 1 }}. {{ $angket->pertanyaan }}</strong></label>
                                </div>
                                <div class="col-12">
                                    <textarea id="pertanyaan_{{ $angket->id }}" name="jawaban[{{ $angket->id }}]" rows="4" class="form-control" required></textarea>
                                </div>
                            </div>
                            @endforeach
                            <div class="row">
                                <div class="col-12">
                                    <button class="btn btn-success" type="submit">Simpan</button>
                                    <a href="/home" class="btn btn-secondary">Batal</a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection