<?php

namespace App\Http\Requests;

use App\Http\Requests\Request;
use Illuminate\Support\Facades\Validator;
class CardsRequests extends Request
{

    public function __construct()
    {
        /*Validator::extend('accepted_title', function ($attribute, $value, $parameters) {
            $accepted_title = [
                'jigar',
                'joy'
            ];
            $is_accepted = in_array($value, $accepted_title);
            return preg_match('/^[\pL\s]+$/u', $value);
        });*/
    }
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
            'title'=>"required|accepted_title|unique:cards,title",
            'description'=>"required",
        ];
    }

    public function messages()
    {
        return [
            'title.required'=>'Please Enter Title Field',
            'title.accepted_title'=>'Enter Valid Title Name',
            'description.required'=>'WithOut Description Cards is Not Created',
        ];
    }
}
