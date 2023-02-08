<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Support\Facades\Auth;

class TechnicianPostRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        if (Auth::check())
        {
            return true;
        }
        //test change to false once production
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
            'given_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'given_name' => 'required|string',
            'technician_status_id' => 'nullable|int',
            'location_id' => 'nullable|int',
            'current_ticket' => 'nullable|int',
        ];
    }
}
