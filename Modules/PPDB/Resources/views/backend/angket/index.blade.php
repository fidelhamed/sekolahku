@extends('layouts.backend.app')

@section('title')
    Angket
@endsection

@section('content')

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
<div class="content-wrapper container-xxl p-0">
    <div class="content-header row">
        <div class="content-header-left col-md-9 col-12 mb-2">
            <div class="row breadcrumbs-top">
                <div class="col-12">
                    <h2> Angket <a data-toggle="modal" data-target="#addAngket" class="btn btn-success">Tambah</a> </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title"> Daftar Pertanyaan Angket </h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Pertanyaan</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>    
                                        <tbody>
                                            @foreach ($angkets as $key => $angket)
                                                <tr>
                                                    <td></td>
                                                    <td> {{$key+1}} </td>
                                                    <td> {{$angket->pertanyaan}} </td>
                                                    <td> 
                                                        {{-- <a data-toggle="modal" data-target="#editAngket" data-id="{{ $angkets->id }}" class="btn btn-success btn-sm">Edit</a> --}}
                                                        <form action="{{ route('angket-pertanyaan.destroy', $angket->id) }}" method="POST" onsubmit="return confirm('Apakah Anda yakin ingin menghapus pertanyaan ini?');">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit" class="btn btn-danger btn-sm">Hapus</button>
                                                        </form>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>                                   
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
        @include('ppdb::backend.angket.addAngket')
    </div>
</div>
@endsection