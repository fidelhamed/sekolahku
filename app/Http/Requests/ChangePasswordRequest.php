<?php
namespace App\Http\Requests;
use Illuminate\Foundation\Http\FormRequest;
class ChangePasswordRequest extends FormRequest
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
        return [
            'current_password'      => 'required|password',
            'password'              => 'required|min:8|max:255|regex:/[a-zA-Z]/|regex:/[0-9]/',
            'password_confirmation' => 'required|same:password',
        ];
    }

    public function messages()
    {
        return [
            'current_password.required'         => 'Password tidak boleh kosong.',
            'current_password.password'         => 'Password yang dimasukan salah.',
            'password.required'                 => 'Password Baru tidak boleh kososng.',
            'password.min'                      => 'Password minimal 8 karakter.',
            'password.max'                      => 'password maksimal 255 karakter.',
            'password.regex'                    => 'Password harus mengandung setidaknya satu huruf dan satu angka.',
            'password_confirmation.required'    => 'Password Konfirmasi tidak boleh kosong.',
            'password_confirmation.same'        => 'Password Konfirmasi tidak cocok.',

        ];
    }
}
