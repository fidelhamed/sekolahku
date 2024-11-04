<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ppdbRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        if ($this->method() == 'POST') {
            return [
                'name'          => ['required','unique:users'],
                'email'         => ['required','unique:users','email'],
                'foto_profile'  => ['required','image','max:1024'],
                'nip'           => ['required','numeric'],
                'pj_jenjang'    => ['required', 'in:TKTQ,SD-IT,SMP-IT,SMA-IT,MA'],
            ];
        }

        return [
            'name'          => ['required'],
            'email'         => ['required','email'],
            'foto_profile'  => ['image','max:1024'],
            'nip'           => ['required','numeric'],
            'pj_jenjang'    => ['required', 'in:TKTQ,SD-IT,SMP-IT,SMA-IT,MA'],
        ];
    }

    public function messages()
    {
        return [
            'name.required'         => 'Nama tidak boleh kosong.',
            'name.unique'           => 'Nama sudah pernah digunakan.',
            'email.required'        => 'Email tidak boleh kosong.',
            'email.unique'          => 'Email sudah pernah digunakan.',
            'email.email'           => 'Email yang dimasukan tidak valid.',
            'foto_profile.required' => 'Foto Profile tidak boleh kosong.',
            'foto_profile.image'    => 'Foto yang dimasukan tidak valid.',
            'foto_profile.max'      => 'Maksimal ukuran foto adalah 1MB.',
            'nip.required'          => 'NIP tidak boleh kosong.',
            'nip.numeric'           => 'NIP yang dimasukan tidak valid.',
            'pj_jenjang.required'   => 'Admin PJ Jenjang tidak boleh kosong.',
            'pj_jenjang.in'         => 'Pilihan jenjang tidak valid.'
        ];
    }
}
