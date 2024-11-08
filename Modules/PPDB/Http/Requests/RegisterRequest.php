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
            'password'              => 'required|min:8|max:255|regex:/[a-zA-Z]/|regex:/[0-9]/',
            'confirm_password'      => 'required|same:password',
            'nik'                   => 'required|numeric|digits:16|unique:data_murids',
            'whatsapp'              => 'required|numeric|unique:data_murids|digits_between:10,15',
            'nama_sekolah_asal'     => 'required',
        ];
    }

    public function messages()
    {
        return [
            'name.required'             => 'Nama Lengkap tidak boleh kosong.',
            'email.required'            => 'Email tidak boleh kosong.',
            'email.email'               => 'Email yang digunakan tidak valid.',
            'email.unique'              => 'Email sudah pernah digunakan.',
            'password.required'         => 'Password tidak boleh kosong.',
            'password.min'              => 'Password minimal 8 karakter.',
            'password.max'              => 'password maksimal 255 karakter.',
            'password.regex'            => 'Password harus mengandung setidaknya satu huruf dan satu angka.',
            'confirm_password.required' => 'Password konfirmasi tidak boleh kosong.',
            'confirm_password.same'     => 'Password konfirmasi tidak cocok.',
            'nik.required'              => 'NIK tidak boleh kosong.',
            'nik.numeric'               => 'NIK hanya boleh angka.',
            'nik.digits'                => 'NIK harus terdiri dari 16 digit.',
            'nik.unique'                => 'NIK sudah pernah digunakan.',
            'whatsapp.required'         => 'Nomor WhatasApp tidak boleh kosong.',
            'whatsapp.numeric'          => 'Nomor WhatsApp hanya boleh angka.',
            'whatsapp.unique'           => 'Nomor WhatsApp sudah pernah digunakan.',
            'whatsapp.digits_between'   => 'Nomor Whatsapp harus terdiri dari 10-15 digit.',
            'nama_sekolah_asal.required'=> 'Asal Sekolah tidak boleh kosong.',
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
