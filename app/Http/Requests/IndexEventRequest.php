<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class IndexEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('show events');
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
