<?php

use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/


Route::prefix('ppdb')->group(function () {
    Route::get('/', 'PPDBController@index');

    /// REGISTER \\\
    Route::get('/register', 'AuthController@registerView')->name('register');
    Route::post('/register', 'AuthController@registerStore')->name('register.store');
});

//// ROLE GUEST \\\\
Route::prefix('/ppdb')->middleware('role:Guest')->group(function () {

    // PAYMENT PENDAFTARAN
    Route::get('payment-pendaftaran/{id}', 'PendaftaranController@paymentPage');
    Route::put('payment-pendaftaran/{id}', 'PendaftaranController@paymentStore');

    /// DATA MURID \\\
    Route::get('form-pendaftaran', 'PendaftaranController@index')->name('ppdb.form-pendaftaran');
    Route::put('form-pendaftaran/{id}', 'PendaftaranController@update');


    /// DATA ORANG TUA \\\
    Route::get('form-data-orangtua', 'PendaftaranController@dataOrtuView');
    Route::put('form-data-orangtua/{id}', 'PendaftaranController@updateOrtu');

    /// BERKAS MURID \\\
    Route::get('form-berkas', 'PendaftaranController@berkasView');
    Route::put('form-berkas/{id}', 'PendaftaranController@berkasStore');
});

/// ROLE TERVERIFIKASI \\\
Route::prefix('/ppdb')->middleware('role:Terverifikasi')->group(function () {
    
    /// CETAK \\\
    Route::get('cetak-kartu', 'CetakController@cetakKartu')->name('ppdb.cetak-kartu');

    /// FORM ANGKET \\\
    Route::get('show-angket-form', 'AngketController@showAngketForm')->name('ppdb.show-angket-form');
    Route::post('submit-angket-form', 'AngketController@submitAngketForm')->name('ppdb.submit-angket-form');    
});


/// ROLE LULUS \\\
Route::prefix('/ppdb')->middleware('role:Lulus')->group(function () {
    
    /// CETAK \\\
    Route::get('cetak-kelulusan', 'CetakController@cetakKelulusan')->name('ppdb.cetak-kelulusan');

});


//// ROLE PPDB \\\\
Route::prefix('/ppdb')->middleware('role:PPDB')->group(function () {


    /// DATA MURID \\\
    Route::resource('data-murid', 'DataMuridController');
    Route::resource('data-kelulusan', 'KelulusanController');
    Route::get('konfirm-payment-regis', 'DataMuridController@confirmPayment');
    Route::get('update-murid-perbaikan', 'DataMuridController@updatePerbaikan');
    Route::get('update-murid-lulus', 'DataMuridController@updateLulus');
    Route::get('update-murid-tidak-lulus', 'DataMuridController@updateTidakLulus');

    // INFORMASI PPDB \\
    Route::resource('info-tes-ujian', 'InfoTesUjianController');
    Route::put('info-tes-ujian/update', 'InfoTesujianController@update');
    Route::resource('info-daftar-ulang', 'InfoDaftarUlangController');
    Route::put('info-daftar-ulang/update', 'InfoDaftarUlangController@update');

    // PERIODE REGISTRASI \\
    Route::resource('periode-registrasi', 'PeriodeRegistrasiController');
    Route::put('periode-registrasi/update', 'PeriodeRegistrasiController@update');

    // ANGKET PERTANYAAN \\
    Route::resource('angket-pertanyaan', 'AngketController');
    Route::post('angket/add', 'AngketController@addAngket')->name('ppdb.angket.add');

    // DATA ANGKET \\
    Route::resource('angket-data', 'AngketDataController'); 
    Route::post('rekap-angket/cetak', 'AngketDataController@Cetak');

    // REKAP LAPORAN \\
    Route::resource('rekap-laporan', 'RekapLaporanController');
    Route::post('rekap-laporan/cetak', 'RekapLaporanController@update');
});
