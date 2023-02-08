<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class TicketPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'user_id' => 'required|int',
            'requestor_firstname'=> 'required|string',
            'requestor_middlename' => 'nullable|string',
            'requestor_lastname' => 'required|string',
            'description' => 'required|string',
            'request_category_id' => 'required|int',
        ];
    }
}
