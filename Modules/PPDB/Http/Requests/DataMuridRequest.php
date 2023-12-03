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
            'email'         => 'required|email',
            'nama_panggilan'=> 'required',
            'jenis_kelamin' => 'required',
            'tempat_lahir'  => 'required',
            'tgl_lahir'     => 'required',
            'anak_ke'       => 'required',
            'alamat'        => 'required',
            'telp'          => 'required|numeric',
            'whatsapp'      => 'required|numeric',
            'sakit'         => 'nullable',
            'asal_sekolah'  => 'required',
            'alamat_sekolah'=> 'required',
            'prestasi'      => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Nama Lengkap tidak boleh kosong.',
            'email.required'            => 'Email tidak boleh kosong.',
            'email.email'               => 'Email yang digunakan tidak valid.',
            'nama_panggilan.required'   => 'Nama Panggilan tidak boleh kosong',
            'jenis_kelamin.required'    => 'Jenis Kelamin tidak boleh kosong',
            'tempat_lahir.required'     => 'Tempat Lahir tidak boleh kosong.',
            'tgl_lahir.required'        => 'Tanggal Lahir tidak boleh kosong.',
            'anak_ke.required'          => 'Anak ke- tidak boleh kosong',
            'alamat.required'           => 'Alamat tidak boleh kosong.',
            'telp.required'             => 'No Telp tidak boleh kosong.',
            'telp.numeric'              => 'No Telp hanya mendukung angka.',
            'whatsapp.required'         => 'No WhatsApp tidak boleh kosong.',
            'whatsapp.numeric'          => 'No WhatsApp hanya mendukung angka.',
            'asal_sekolah.required'     => 'Asal Sekolah tidak boleh kosong.',
            'alamat_sekolah.required'     => 'Alamat Asal Sekolah tidak boleh kosong.'
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
