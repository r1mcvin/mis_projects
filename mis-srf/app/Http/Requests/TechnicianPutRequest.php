<?php

namespace App\Http\Requests;

use App\Rules\IsCompositeUnique;
use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

use function PHPSTORM_META\map;

class TechnicianPutRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     *
     * @return bool
     */
    public function authorize()
    {
        return false;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, mixed>
     */
    public function rules()
    {
        return [
            'given_name' => 'required|string', new IsCompositeUnique('technicians', ['given_name' => $this->given_name, 'middle_name' => $this->middle_name, 'last_name' => $this->last_name], $this->id),
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'technician_status_id' => 'nullable|int',
            'location_id' => 'nullable|int',
            'current_ticket' => 'nullable|int'
        ];
    }
}
