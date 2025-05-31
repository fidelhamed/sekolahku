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
                    <h2> Calon Peserta Didik</h2>
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
                                    <h4 class="card-title">Calon Peserta Didik {{ $jenjang }}</h4>
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
                                                <!--<th>Email</th>-->
                                                <th>No Kontak</th>
                                                <th>Status</th>
                                                <th>Pembayaran/Prestasi</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($murids as $key => $murid)
                                                <tr>
                                                    <td></td>
                                                    <td>{{ $key+1 }}</td>
                                                    <td>{{ $murid->muridDetail->noreg }}</td>
                                                    <td>{{ $murid->name }}</td>
                                                    <td>{{ $murid->muridDetail->jalur }}</td>
                                                    <!--<td>{{ $murid->email }}</td>-->
                                                    <td>{{ $murid->muridDetail->whatsapp }}</td>
                                                    <td>{{ $murid->muridDetail->proses }}</td>
                                                    <td>{{ $murid->paymentRegis->status == 'Unpaid' ? 'Belum Dikonfirmasi' : 'Berhasil'}}</td>
                                                    <td>
                                                        <a href="{{ route('data-murid.show', $murid->id) }}" 
                                                            class="btn btn-info btn-sm" 
                                                            style="display: {{ $murid->muridDetail->proses !== 'Input Data' && $murid->muridDetail->proses !== 'Lulus Administrasi' ? 'none' : ''}}">Detail</a>
                                                        <a data-id="{{ $murid->id }}" 
                                                            id="updatePerbaikan" 
                                                            class="btn btn-danger btn-sm" 
                                                            style="display: {{ $murid->muridDetail->proses !== 'Input Data' ? 'none' : ''}}">Perbaikan</a>
                                                        @if ($murid->paymentRegis->file && (Str::endsWith(strtolower($murid->paymentRegis->file), ['.jpg', '.jpeg', '.png'])))
                                                        <a href="{{ asset('storage/images/payment_pendaftaran/' .$murid->paymentRegis->file) }}"
                                                            class="btn btn-warning btn-sm openModalImg" 
                                                            style="display: {{$murid->paymentRegis->file == null || $murid->role !== 'Guest' ? 'none' : ''}}"
                                                            data-download-link="{{ asset('storage/images/payment_pendaftaran/' . $murid->paymentRegis->file) }}" 
                                                            data-title="Bukti Pembayaran/Prestasi">Bukti Pembayaran/Prestasi</a>
                                                        @elseif ($murid->paymentRegis->file && (Str::endsWith(strtolower($murid->paymentRegis->file), '.pdf')))
                                                        <a href="#" 
                                                            class="btn btn-warning btn-sm openModalDoc" 
                                                            style="display: {{$murid->paymentRegis->file == null || $murid->role !== 'Guest' ? 'none' : ''}}"
                                                            data-toggle="modal" 
                                                            data-target="#viewModal" 
                                                            data-berkas="{{asset('storage/images/payment_pendaftaran/' .$murid->paymentRegis->file)}}" 
                                                            data-title="Bukti Pembayaran/Prestasi">Bukti Pembayaran/Prestasi</a>
                                                        @endif
                                                        <a data-id="{{ $murid->paymentRegis->id }}" 
                                                            id="updatePayment" 
                                                            class="btn btn-success btn-sm" 
                                                            style="display: {{$murid->paymentRegis->file == null || $murid->paymentRegis->approve_date != null ? 'none' : ''}}">konfirmasi Pembayaran/Prestasi</a>
                                                        <a data-id="{{ $murid->id }}" 
                                                            id="updateLulus" 
                                                            class="btn btn-success btn-sm" 
                                                            style="display: {{ ($murid->role !== 'Terverifikasi' || !$showButton) ? 'none' : '' }}">Lulus</a>  
                                                         <a data-id="{{ $murid->id }}" 
                                                            id="updateTidakLulus" 
                                                            class="btn btn-danger btn-sm" 
                                                            style="display: {{ ($murid->role !== 'Terverifikasi' || !$showButton) ? 'none' : '' }}">Tidak Lulus</a>
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
        
        {{-- Modal pdf --}}
        <div class="modal fade" id="viewModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">View Doc</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body" style="height: 500px">
                    <iframe id="viewBerkas" width="100%" height="100%" src=""></iframe>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                </div>
              </div>
            </div>
        </div>

        {{-- Modal gambar --}}
        <div class="modal" tabindex="-1" role="dialog" id="imgModal">
            <div class="modal-dialog modal-lg" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="berkasTitle">View Img</h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                  <img id="docImage" src="" alt="View Doc Image" class="img-fluid">
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
<script>
    $(document).ready(function() {
        // Handle click event on the view button
        $('.openModalDoc').on('click', function() {
            // Get the image file URL and title from the data attributes
            var berkas = $(this).data('berkas');
            var berkasTitle = $(this).data('title');

            // Add timestamp to URL to prevent caching (force reload)
            var uniqueUrl = berkas + '?t=' + new Date().getTime();

            // Set the iframe source to the file URL with the unique timestamp
            $('#viewBerkas').attr('src', uniqueUrl);

            // Set the modal title dynamically
            $('#exampleModalLabel').text(berkasTitle);

            // Open the modal
            $('#viewModal').modal('show');
        });

        // Reset iframe content and modal title when modal is hidden
        $('#viewModal').on('hidden.bs.modal', function() {
            $('#viewBerkas').attr('src', '');  // Clear iframe content
            $('#exampleModalLabel').text('');  // Reset modal title
        });
    });
</script>
<script>
    $(document).ready(function() {
        // Handle click event on the button to open the modal
        $('.openModalImg').on('click', function(e) {
            // Prevent default link behavior (don't navigate to href)
            e.preventDefault();

            // Get the image source from the link's href attribute
            var docImageSrc = $(this).attr('href');
            var downloadLink = $(this).attr('data-download-link');
            var berkasTitle = $(this).data('title');

            // Add timestamp to the image URL to avoid caching
            var uniqueImgUrl = docImageSrc + '?t=' + new Date().getTime();
            
            // Set the image source in the modal
            $('#docImage').attr('src', uniqueImgUrl);
            $('#downloadButton').attr('href', downloadLink);
            $('#berkasTitle').text(berkasTitle);

            // Open the modal
            $('#imgModal').modal('show');
        });

        // Reset modal content when modal is hidden (close/reset)
        $('#imgModal').on('hidden.bs.modal', function() {
            // Clear the image src to reset the modal
            $('#docImage').attr('src', '');
            $('#berkasTitle').text('');
        });
    });
</script>
<script type="text/javascript">
    $(document).on('click', '#updatePayment', function () {
        var id = $(this).attr('data-id');
        
        Swal.fire({
            title: 'Konfirmasi Pembayaran',
            text: "Apakah Anda yakin ingin melanjutkan konfirmasi pembayaran?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745',
            cancelButtonColor: '#dc3545',
            confirmButtonText: 'Ya, Konfirmasi',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('konfirm-payment-regis', {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    id: id
                }, function(_resp) {
                    Swal.fire(
                        'Berhasil!',
                        'Pembayaran telah dikonfirmasi.',
                        'success',
                        {
                            confirmButtonColor: '#28a745' // Warna tombol Oke menjadi Success
                        }
                    ).then(() => {
                        location.reload();
                    });
                });
            }
        });
    });

    $(document).on('click', '#updatePerbaikan', function () {
        var id = $(this).attr('data-id');
        
        Swal.fire({
            title: 'Konfirmasi Update Perbaikan',
            text: "Apakah Anda yakin ingin memberikan akses PERBAIKAN formulir pendaftaran?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745', // Warna Success
            cancelButtonColor: '#dc3545', // Warna Danger
            confirmButtonText: 'Ya, Perbaikan',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('update-murid-perbaikan', {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    id: id
                }, function(_resp) {
                    Swal.fire('Berhasil!', 'Akses perbaikan formulir pendaftaran telah diberikan.', 'success', {
                        confirmButtonColor: '#28a745'
                    }).then(() => {
                        location.reload();
                    });
                });
            }
        });
    });

    $(document).on('click', '#updateLulus', function () {
        var id = $(this).attr('data-id');
        
        Swal.fire({
            title: 'Konfirmasi Update Lulus',
            text: "Apakah Anda yakin ingin memperbarui status LULUS?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745', // Warna Success
            cancelButtonColor: '#dc3545', // Warna Danger
            confirmButtonText: 'Ya, Lulus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('update-murid-lulus', {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    id: id
                }, function(_resp) {
                    Swal.fire('Berhasil!', 'Status lulus telah dikirimkan.', 'success', {
                        confirmButtonColor: '#28a745'
                    }).then(() => {
                        location.reload();
                    });
                });
            }
        });
    });

    $(document).on('click', '#updateTidakLulus', function () {
        var id = $(this).attr('data-id');
        
        Swal.fire({
            title: 'Konfirmasi Update Tidak Lulus',
            text: "Apakah Anda yakin ingin memperbarui status TIDAK LULUS?",
            icon: 'question',
            showCancelButton: true,
            confirmButtonColor: '#28a745', // Warna Success
            cancelButtonColor: '#dc3545', // Warna Danger
            confirmButtonText: 'Ya, Tidak Lulus',
            cancelButtonText: 'Batal'
        }).then((result) => {
            if (result.isConfirmed) {
                $.get('update-murid-tidak-lulus', {
                    '_token': $('meta[name=csrf-token]').attr('content'),
                    id: id
                }, function(_resp) {
                    Swal.fire('Berhasil!', 'Status tidak lulus telah dikirimkan.', 'success', {
                        confirmButtonColor: '#28a745'
                    }).then(() => {
                        location.reload();
                    });
                });
            }
        });
    });
</script>
@endsection
