<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class StoreGameRequest extends FormRequest
{
    /**
     * Indicates if the validator should stop on the first rule failure.
     *
     * @var bool
     */
    protected $stopOnFirstFailure = true;

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
            'user.name'    => 'required|string',
            'user.hand.*'  => 'required|string|in:2,3,4,5,6,7,8,9,10,J,Q,K,A',
            '*.score'      => 'required|numeric',
        ];
    }

    /**
     * Custom validation messages 
     */
    public function messages()
    {
        return [
            'user.name.required' => 'User name is required.',
            'user.name.string'   => 'User name cannot contain any numbers or special characters.',
            '*.score'            => 'Scores are required.',
            'user.hand.*.in'     => 'Card selections must be from the provided list.',
        ];
    }
}
