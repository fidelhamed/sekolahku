<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataMuridRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'          => 'required',
            'nik'           => 'required|numeric|digits:16',
            'nama_panggilan'=> 'required',
            'nisn'          => 'numeric',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'anak_ke'       => 'required|numeric',
            'jumlah_saudara'=> 'required|numeric',
            'telp'          => 'required|digits_between:10,15',
            'whatsapp'      => 'required|digits_between:10,15',
            'alamat'        => 'required',
            'kelurahan'     => 'required',
            'kecamatan'     => 'required',
            'kabupaten'     => 'required',
            'provinsi'      => 'required',
            'kode_pos'      => 'required',
            'nama_sekolah_asal' => 'nullable',
            'npsn_sekolah_asal' => 'nullable',
            'kecamatan_sekolah_asal' => 'nullable',
            'kabupaten_sekolah_asal' => 'nullable',
            'lingkar_kepala'=> 'nullable|numeric',
            'tinggi_badan'  => 'nullable|numeric',
            'berat_badan'   => 'nullable|numeric',
            'gol_darah'     => 'nullable',
            'sakit'         => 'nullable',
            'prestasi'      => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Nama Lengkap tidak boleh kosong.',
            'nik.required'              => 'NIK tidak boleh kosong.',
            'nik.numeric'               => 'NIK harus terdiri dari angka.',
            'nik.digits'                => 'NIK harus terdiri dari 16 digit.',
            'nama_panggilan.required'   => 'Nama Panggilan tidak boleh kosong',
            'nisn.numeric'              => 'NISN harus terdiri dari angka.',
            'jenis_kelamin.required'    => 'Jenis Kelamin tidak boleh kosong',
            'tempat_lahir.required'     => 'Tempat Lahir tidak boleh kosong.',
            'tgl_lahir.required'        => 'Tanggal Lahir tidak boleh kosong.',
            'anak_ke.required'          => 'Anak ke- tidak boleh kosong',
            'anak_ke.numeric'           => 'Anak ke- harus terdiri dari angka.',
            'jumlah_saudara.required'   => 'Jumlah Saudara Kandung tidak boleh kosong',
            'jumlah_saudara.numeric'    => 'Jumlah Saudara Kandung harus terdiri dari angka.',
            'telp.required'             => 'No Telp tidak boleh kosong.',
            'telp.digits_between'       => 'No Telp harus terdiri dari 10-15 digit',
            'whatsapp.required'         => 'No WhatsApp tidak boleh kosong.',
            'whatsapp.digits_between'   => 'No WhatsApp harus terdiri dari 10-15 digit',
            'alamat.required'           => 'Alamat tidak boleh kosong.',
            'kelurahan.required'        => 'Kelurahan/Desa tidak boleh kosong.',
            'kecamatan.required'        => 'Kecamatan tidak boleh kosong.',
            'kabupaten.required'        => 'Kabupaten/Kota tidak boleh kosong.',
            'provinsi.required'         => 'Provinsi tidak boleh kosong.',
            'kode_pos.required'         => 'Kode Pos tidak boleh kosong.',
            'lingkar_kepala.numeric'    => 'Lingkar Kepala harus terdiri dari angka.',
            'tinggi_badan.numeric'      => 'Tinggi Badan harus terdiri dari angka.',
            'berat_badan.numeric'       => 'Berat Badan harus terdiri dari angka.',
        ];
    }

    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }
}
