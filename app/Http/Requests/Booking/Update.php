<?php

namespace App\Http\Requests\Booking;

use App\Http\Requests\CanAuthorise;
use Illuminate\Foundation\Http\FormRequest;

class Update extends FormRequest
{
    use CanAuthorise;

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array
     */
    public function rules()
    {
        return [
            'client_id' => 'required',
            'room_id' => 'required',
            'start_date' => 'required',
            'end_date' => 'required',
        ];
    }
}
