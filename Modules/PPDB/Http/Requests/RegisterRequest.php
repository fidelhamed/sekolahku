<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class RegisterRequest extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'name'                  => 'required',
            'email'                 => 'required|email|unique:users',
            'password'              => 'required|min:8',
            'confirm_password'      => 'required|same:password',
            'whatsapp'              => 'required|numeric|unique:data_murids|digits_between:10,15',
            'asal_sekolah'          => 'required',
            'jenjang'               => 'required|in:TKTQ,TKTQ-2,SD-IT,SD-IT-2,SMP-IT,SMA-IT,MA'
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama Lengkap tidak boleh kosong.',
            'email.required'        => 'Email tidak boleh kosong.',
            'email.email'           => 'Email yang digunakan tidak valid.',
            'email.unique'          => 'Email sudah pernah digunakan.',
            'password.required'     => 'Password tidak boleh kosong.',
            'password.min'          => 'Password minimal 8 karakter.',
            'confirm_password.required' => 'Konfirmasi password tidak boleh kosong.',
            'confirm_password.same' => 'Konfirmasi password tidak sesuai.',
            'whatsapp.required'     => 'Nomor WhatasApp tidak boleh kosong.',
            'whatsapp.numeric'      => 'Nomor WhatsApp tidak valid.',
            'whatsapp.unique'       => 'Nomor WhatsApp sudah pernah digunakan.',
            'whatsapp.digits_between'   => 'Nomor Whatsapp harus terdiri dari 10-15 digit.',
            'asal_sekolah.required' => 'Asal Sekolah tidak boleh kosong.',
            'jenjang.required'      => 'Pilih salah satu jenjang.',
            'jenjang.in'            => 'Pilihan jenjang tidak valid.'

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
