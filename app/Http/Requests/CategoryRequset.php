<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class CategoryRequset extends FormRequest
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
        $id = $this->route('id');
        return [
            //Custom Rules
            'name' => [
                'required',
                'string',
                'max:255',
                'min:3',
                Rule::unique('categories', 'id')->ignore($id)
            ],
            'parent_id' => 'nullable|integer|exists:categories,id',
            'description' => 'nullable|min:10',
            'status' => 'required',
            'image' => 'image|max:512000|dimensions:min_width=300px,min_height=300px'
        ];

        //stripos($value , 'god')  -----------> تقوم بالبحث عن مقطع سترنج داخل المدخل 
    }

    public function messages()
    {
        return [
            'required' => 'هذا الحقل مطلوب'
        ];
    }
}
