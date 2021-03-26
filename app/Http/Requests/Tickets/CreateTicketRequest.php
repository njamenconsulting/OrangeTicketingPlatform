<?php

namespace App\Http\Requests\tickets;

use Illuminate\Foundation\Http\FormRequest;

class CreateTicketRequest extends FormRequest
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
            'ticketPhone' => ['bail','required','regex:/^(2|6)([0-9]{8})$/'],
            'ticketTitle' => ['bail','required','max:255'],
            'ticketDescription' => ['bail','required','max:255']
        ];
    }
}
