<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Str;
use Illuminate\Validation\Rule;

class UpdateVideoRequest extends StoreVideoRequest
{


    /**
     * Get the validation rules that apply to the parent request.
     *
     * @return array
     */
    public function rules()
    {
        return array_merge( parent::rules(),[
            'slug' => ['required',Rule::unique('videos')->ignore($this->video) ,'alpha_dash'],
        ]);
    }
    
    

}
