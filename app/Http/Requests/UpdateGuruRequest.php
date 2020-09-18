<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use App\Models\Guru;

class UpdateGuruRequest extends FormRequest
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
        $rules = Guru::$rules;

        $rules['kode_guru'] = $rules['kode_guru'] . ',' . request()->segment(2);
        
        return $rules;
    }
}