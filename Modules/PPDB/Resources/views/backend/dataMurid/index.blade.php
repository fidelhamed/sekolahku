@extends('layouts.backend.app')

@section('title')
    Calon Murid
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
                    <h2> Calon Murid</h2>
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
                                    <h4 class="card-title">Calon Murid {{ $jenjang }}</h4>
                                </div>
                                <div class="card-datatable">
                                    <table class="dt-responsive table">
                                        <thead>
                                            <tr>
                                                <th></th>
                                                <th>No</th>
                                                <th>Noreg</th>
                                                <th>Nama</th>
                                                <th>Email</th>
                                                <th>Status</th>
                                                <th>Pembayaran</th>
                                                <th>Hak Akses</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($murid as $key => $murids)
                                                <tr>
                                                    <td></td>
                                                    <td>{{$key+1}}</td>
                                                    <td>{{ $murids->muridDetail->noreg }}</td>
                                                    <td>{{$murids->name}}</td>
                                                    <td>{{$murids->email}}</td>
                                                    <td>{{$murids->muridDetail->proses}}</td>
                                                    <td>{{$murids->paymentRegis->status == 'Unpaid' ? 'Belum Bayar' : 'Berhasil'}}</td>
                                                    <td>{{$murids->role == 'Terverifikasi' ? 'Calon Murid' : 'Pendaftar'}}</td>
                                                    <td>
                                                        <a href="{{route('data-murid.show', $murids->id)}}" class="btn btn-info btn-sm" style="display: {{$murids->paymentRegis->file == null || $murids->paymentRegis->approve_date != null ? '' : 'none'}}">Detail</a>
                                                        {{-- <a href="{{asset('storage/images/payment_pendaftaran/' .$murids->paymentRegis->file)}}" class="btn btn btn-secondary btn-sm" target="_blank" style="display: {{$murids->paymentRegis->file == null || $murids->paymentRegis->approve_date != null ? 'none' : ''}}">Bukti Pembayaran</a> --}}
                                                        <a href="{{asset('storage/images/payment_pendaftaran/' .$murids->paymentRegis->file)}}" data-download-link="{{ asset('storage/images/payment_pendaftaran/' . $murids->paymentRegis->file) }}" class="btn btn-secondary btn-sm" id="openModalBtn" style="display: {{$murids->paymentRegis->file == null || $murids->paymentRegis->approve_date != null ? 'none' : ''}}">Bukti Pembayaran</a>
                                                        <a data-id="{{$murids->paymentRegis->id}}" id="updatePayment" class="btn btn btn-success btn-sm" style="display: {{$murids->paymentRegis->file == null || $murids->paymentRegis->approve_date != null ? 'none' : ''}}">konfirmasi Pembayaran</a>
                                                        <a data-id="{{ $murids->id }}" id="updatePerbaikan" class="btn btn-warning btn-sm" style="display: {{ $murids->role !== 'Guest' || $murids->berkas == null || $murids->muridDetail->proses == 'Perbaikan' ? 'none' : ''}}">Perbaikan</a>
                                                        <a data-id="{{ $murids->id }}" id="updateLulus" class="btn btn-success btn-sm" style="display: {{ $murids->role !== 'Terverifikasi' ? 'none' : '' }}">Lulus</a>
                                                        <a data-id="{{ $murids->id }}" id="updateTidakLulus" class="btn btn-danger btn-sm" style="display: {{ $murids->role !== 'Terverifikasi' ? 'none' : '' }}">Tidak Lulus</a>
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
        <div class="modal" tabindex="-1" role="dialog" id="paymentModal">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title">Bukti Pembayaran</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img id="paymentImage" src="" alt="Bukti Pembayaran" class="img-fluid">
                </div>
                <div class="modal-footer">
                    <a id="downloadButton" class="btn btn-success" download>Download</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                </div>
              </div>
            </div>
            </div>
    </div>
</div>
@endsection
@section('scripts')
<script type="text/javascript">
    $(document).on('click', '#updatePayment', function () {
        var id = $(this).attr('data-id');
        $.get('konfirm-payment-regis', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
            location.reload()
        });
    });
    $(document).on('click', '#updatePerbaikan', function () {
        var id = $(this).attr('data-id');
        $.get('update-murid-perbaikan', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
            location.reload()
        });
    });
    $(document).on('click', '#updateLulus', function () {
        var id = $(this).attr('data-id');
        $.get('update-murid-lulus', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
            location.reload()
        });
    });
    $(document).on('click', '#updateTidakLulus', function () {
        var id = $(this).attr('data-id');
        $.get('update-murid-tidak-lulus', {'_token' : $('meta[name=csrf-token]').attr('content'),id:id}, function(_resp){
            location.reload()
        });
    });
</script>
<script>
    $(document).ready(function() {
      // Handle click event on the button to open the modal
      $('#openModalBtn').on('click', function() {
        // Get the image source from the link's href attribute
        var paymentImageSrc = $(this).attr('href');
        var downloadLink = $(this).attr('data-download-link');
  
        // Set the image source in the modal
        $('#paymentImage').attr('src', paymentImageSrc);
        $('#downloadButton').attr('href', downloadLink);
  
        // Open the modal
        $('#paymentModal').modal('show');
  
        // Prevent the default behavior of the link
        return false;
      });
    });
</script>
@endsection
