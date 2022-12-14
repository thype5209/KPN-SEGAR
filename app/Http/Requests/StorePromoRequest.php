<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StorePromoRequest extends FormRequest
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
            'kode'=> ['required', 'string', 'max:13'] ,
            'jenis_promo'=> ['required', 'numeric'] ,
            'potongan'=> ['required' ,'numeric'],
            'tgl_mulai'=> ['required' ,'date'],
            'tgl_akhir'=> ['required' ,'date'] ,
        ];
    }
}
