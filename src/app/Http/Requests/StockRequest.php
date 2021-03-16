<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StockRequest extends FormRequest
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
            'invoice' => ['required'],
            'expired' => ['required'],
            'price' => ['required'],
            'total' => ['required']
        ];
    }

    /**
     * Get message
     * 
     * @return array
     */
    public function messages()
    {
        return [
            'invoice.required' => 'Kolom invoice tidak boleh kosong',
            'expired.required' => 'Kolom expired tidak boleh kosong',
            'price.required' => 'Kolom price tidak boleh kosong',
            'total.required' => 'Kolom total tidak boleh kosong',
        ];
    }
}
