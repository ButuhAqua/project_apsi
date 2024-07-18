<?php

namespace App\Http\Requests;

use App\Models\Pesanan;
use Gate;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Http\Response;

class StorePesananRequest extends FormRequest
{
    public function authorize()
    {
        return Gate::allows('pesanan_create');
    }

    public function rules()
    {
        return [
            'fullname' => [
                'string',
                'required',
            ],
            'address' => [
                'string',
                'required',
            ],
            'phone' => [
                'string',
                'required',
            ],
            'email' => [
                'required',
                'email',
            ],
            'products' => [
                'required',
                'array',
            ],
            'products.*' => [
                'integer',
            ],
            'quantities' => [
                'required',
                'array',
            ],
            'quantities.*' => [
                'integer',
                'min:1',
            ],
        ];
    }
}
