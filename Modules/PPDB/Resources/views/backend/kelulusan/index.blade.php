@extends('layouts.backend.app')

@section('title')
    Kelulusan
@endsection

@section('content')
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
                    <h2>Kelulusan</h2>
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
                                    <h4 class="card-title">Daftar Kelulusan {{ $jenjang }}</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Noreg</th>
                                                <th>Nama</th>
                                                <th>Jalur</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($murids as $key => $murid)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{$murid->muridDetail->noreg}}</td>
                                                    <td>{{$murid->name}}</td>
                                                    <td>{{ $murid->muridDetail->jalur }}</td>
                                                    <td>{{$murid->email}}</td>
                                                    <td>{{$murid->muridDetail->proses}}</td>
                                                    <td>
                                                    @if ($murid->muridDetail->nisn == null)
                                                        @if ($murid->role == 'Lulus')
                                                        <a href="{{route('data-kelulusan.show', $murid->id)}}" class="btn btn-warning btn-sm" >Input NISN</a>                                                                                                                
                                                        @else
                                                        <a href="{{route('data-kelulusan.show', $murid->id)}}" class="btn btn-info btn-sm" >Detail</a>
                                                        @endif
                                                    @else
                                                    <a href="{{route('data-kelulusan.show', $murid->id)}}" class="btn btn-info btn-sm" >Detail</a>
                                                    @endif

                                                    <form action="{{ route('data-murid.destroy', $murid->id) }}" method="POST" style="display: inline;" onsubmit="return confirm('Yakin ingin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button type="submit" class="btn btn-danger btn-sm"><i data-feather="trash-2"></i></button>
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
    </div>
</div>
@endsection
@section('scripts')

@endsection
