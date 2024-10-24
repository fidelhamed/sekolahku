@extends('layouts.backend.app')

@section('title')
    Data Angket
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
                    <h2> Data Angket </h2>
                </div>
            </div>
        </div>
    </div>
    <div class="content-body">
        <div class="row">
            <div class="col-12">
                <section>
                    <div class="row">
                        <div class="col-6">
                            <div class="card">
                                <div class="card-header header-bottom">
                                    <h4>Cetak Laporan Angket</h4>
                                </div>
                                <div class="card-body">
                                    <form action="{{ url('ppdb/rekap-angket/cetak') }}" method="post" enctype="multipart/form-data">
                                        @csrf
                                        @method('POST')
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label class="form-label">Jenjang</label>
                                                    <select name="jenjang" class="form-control">
                                                        <option value="">-- Pilih --</option>
                                                        <option value="SD-IT">SD-IT</option>
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
                                        </div>
                                        <button class="btn btn-success" type="submit"><i data-feather="printer"></i> Cetak</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header border-bottom">
                                    <h4 class="card-title">Data Angket Orang Tua atau Wali</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Nama</th>
                                                <th>Noreg</th>
                                                <th>Jenjang</th>
                                                <th>Pertanyaan dan Jawaban Angket</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach($users as $key => $user)
                                                    <tr>
                                                        <td></td>
                                                        <td>{{ $key+1 }}</td>
                                                        <td>{{ $user->name }}</td>
                                                        <td>{{ $user->muridDetail->noreg }}</td>
                                                        <td>{{ $user->muridDetail->jenjang }}</td>
                                                @if($user->angketResponses->isNotEmpty())
                                                        <td>
                                                            @foreach($user->angketResponses as $response)  
                                                                @foreach($response->answers as $key => $answer)
                                                                    <p class="font-weight-bold">{{ $key+1 }}. {{ $answer->angket->pertanyaan }} </p>
                                                                    <p> {{ $answer->jawaban }} </p>
                                                                @endforeach  
                                                            @endforeach 
                                                        </td>
                                                @else
                                                        <td class="font-weight-bold text-danger">Calon peserta didik ini belum menjawab angket</td>
                                                    </tr>
                                                @endif
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>
                                {{-- @foreach($users as $user)  
                                <div class="card mb-4">  
                                    <div class="card-header">  
                                        <h2>{{ $user->name }}</h2>  
                                    </div>  
                                    <div class="card-body">  
                                        @if($user->angketResponses->isNotEmpty())  
                                            @foreach($user->angketResponses as $response)  
                                                @foreach($response->answers as $answer)  
                                                    <div class="mb-3">  
                                                        <h3>Pertanyaan: {{ $answer->angket->pertanyaan }}</h3>  
                                                        <p><strong>Jawaban:</strong> {{ $answer->jawaban }}</p>  
                                                    </div>  
                                                @endforeach  
                                            @endforeach  
                                        @else  
                                            <p>Pengguna ini belum menjawab angket.</p>  
                                        @endif  
                                    </div>  
                                </div>  
                                @endforeach --}}
                            </div>
                        </div>
                    </div>
                </section>
            </div>
        </div>
    </div>
</div>
@endsection
