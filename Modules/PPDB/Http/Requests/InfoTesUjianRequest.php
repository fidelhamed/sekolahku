<?php

namespace Modules\PPDB\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class InfoTesUjian extends FormRequest
{
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'waktu_tgl'     => 'required',
            'jam_mulai'     => 'required',
            'jam_berakhir'  => 'required',
            'lokasi'        => 'required',
            'deskripsi'     => 'nullable',
            'jenjang'       => 'required'
        ];
    }

    public function messages()
    {
        return [
            'waktu_tgl.required'     => 'Waktu Tanggal tidak boleh kosong',
            'jam_mulai.required'     => 'Jam Mulai tidak boleh kosong',
            'jam_berakhir.required'  => 'Jam Berakhir tidak boleh kosong',
            'lokasi.required'        => 'Lokasi tidak boleh kosong',
            'jenjang.required'       => 'Pilih salah satu Jenjang'
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
