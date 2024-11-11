<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreEventsRequest extends FormRequest
{
    public function authorize(): bool
    {
        return $this->user()->can('create events');
    }

    public function rules(): array
    {
        return [
            'title' => ['required', 'string'],
            'description' => ['required', 'string'],
            'location' => ['required', 'string'],
            'start_date' => ['required', 'date', 'after:today'],
            'price' => ['required', 'numeric', 'min:1'],
            'banner_image' => ['required', 'image', 'mimes:jpeg,png,jpg', 'max:2048'],
        ];
    }

    public function passedValidation()
    {
        $this['title'] = 'My Event - ' . $this['title'];
    }
}
