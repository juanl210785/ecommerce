<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CarritoProductRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if ($this->user_id == auth()->user()->id) {
            return true;
        }else{
            return false;
        }
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        $rules = [
            'cantidad' => 'required|integer|min:1'
        ];

        return $rules;
        //Para seguir validando de acuerdo a una condicion
        /* if ($this->status == 2) {
            $rules = array_merge($rules, [
                //El resto de las validaciones
            ]);
        } */
    }
}
