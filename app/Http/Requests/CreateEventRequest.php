<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateEventRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create events');
    }

    public function rules(): array
    {
        return [
            //
        ];
    }
}
