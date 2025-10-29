<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;

class StoreVideoRequest extends FormRequest
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
            'name'             => ['required'],
            'slug'               => ['required', 'unique:videos,slug', 'alpha_dash'],
            'file'                => ['required', 'file', 'mimetypes:video/mp4', 'max:51200'],
            'category_id'  => ['required', 'exists:categories,id']
        ];
    }

    protected function prepareForValidation()
    {
        $this->merge([
            'slug' => Str::slug($this->slug)
        ]);
    }

    public function messages()
    {
        return [
            'file.mimetypes' => 'فایل مورد نظر باید ویدیویی باشد.',
            'file.max' => 'حجم فایل مورد نظر بیش از حد مجاز است.',
            'file.required' => 'فایل  خود را برای بروزرسانی  ضمیمه کنید',
            'file.file' => 'فایل  خود را برای بررسی کنید',
        ];
    }
}
