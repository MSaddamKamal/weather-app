<?php

namespace App\Http\Requests\User;

use App\Http\Requests\BaseFormRequest;
use Illuminate\Foundation\Http\FormRequest;

class ListUsersRequest extends BaseFormRequest
{
    
    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\Rule|array|string>
     */
    public function rules(): array
    {
        return [
            'perPage' => 'numeric',
            'page' => 'numeric',
            'pagination' => 'in:true,false',
            'with_weather_details' => 'in:true,false',
        ];
    }
}
