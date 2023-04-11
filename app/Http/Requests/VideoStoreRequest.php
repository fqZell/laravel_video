<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class VideoStoreRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'title' => 'required|min:6|max:40',
            'description' => 'required|max:60|min:10',
            'poster' => 'nullable|mimes:jpg,jpeg,png',
            'video_path' => 'required|mimes:mp4'
        ];
    }
}
