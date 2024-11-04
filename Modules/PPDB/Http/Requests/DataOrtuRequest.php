<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DataOrtuRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */ 
    public function rules()
    {
        return [
            'nama_ayah'         => 'required',
            'pendidikan_ayah'   => 'required',
            'pekerjaan_ayah'    => 'required',
            'penghasilan_ayah'  => 'required|numeric',
            'telp_ayah'         => 'required|numeric|digits_between:10,15',
            'alamat_ayah'       => 'required',

            'nama_ibu'          => 'required',
            'pendidikan_ibu'    => 'required',
            'pekerjaan_ibu'     => 'required',
            'penghasilan_ibu'   => 'required|numeric',
            'telp_ibu'          => 'required|numeric|digits_between:10,15',
            'alamat_ibu'        => 'required',

            'nama_wali'         => 'nullable',
            'telp_wali'         => 'nullable|digits_between:10,15',
            'alamat_wali'       => 'nullable'
        ];
    }

    public function messages()
    {
        return [
            'nama_ayah.required'        => 'Nama Ayah tidak boleh kosong.',
            'pendidikan_ayah.required'  => 'Pendidikan Ayah tidak boleh kosong.',
            'pekerjaan_ayah.required'   => 'Pekerjaan Ayah tidak boleh kosong.',
            'penghasilan_ayah.required' => 'Penghasilan Ayah tidak boleh kosong.',
            'penghasilan_ayah.numeric'  => 'Penghasilan Ayah hanya mendukung angka.',
            'telp_ayah.required'        => 'No Telp/WhatsApp tidak boleh kosong.',
            'telp_ayah.numeric'         => 'No Telp/WhatsApp hanya mendukung angka.',
            'telp_ayah.digits_between'  => 'No Telp/WhatsApp harus terdiri dari 10-15 digit.',
            'alamat_ayah.required'      => 'Alamat Ayah tidak boleh kosong.',

            'nama_ibu.required'        => 'Nama Ibu tidak boleh kosong.',
            'pendidikan_ibu.required'  => 'Pendidikan Ibu tidak boleh kosong.',
            'pekerjaan_ibu.required'   => 'Pekerjaan Ibu tidak boleh kosong.',
            'penghasilan_ibu.required' => 'Penghasilan Ibu tidak boleh kosong.',
            'penghasilan_ibu.numeric'  => 'Penghasilan Ibu hanya mendukung angka.',
            'telp_ibu.required'        => 'No Telp/WhatsApp tidak boleh kosong.',
            'telp_ibu.numeric'         => 'No Telp/WhatsApp hanya mendukung angka.',
            'telp_ibu.digits_between'  => 'No Telp/WhatsApp harus terdiri dari 10-15 digit.',
            'alamat_ibu.required'      => 'Alamat Ibu tidak boleh kosong.',

            'telp_wali.digits_between'  => 'No Telp/WhatsApp harus terdiri dari 10-15 digit.',
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
