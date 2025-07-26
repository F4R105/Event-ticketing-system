<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class EditEventRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Get the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */
    public function rules(): array
    {
        return [
            'name' => 'required|string',
            'venue' => 'required|string',
            'details' => 'string',
            'ticket_price' => 'required|integer',
            'available_tickets' => 'required|integer',
            'event_date' => ['required', 'date', 'after_or_equal:booking_deadline_date'],
            'booking_start_date' => ['required', 'date', 'before_or_equal:booking_deadline_date', 'before_or_equal:event_date'],
            'booking_deadline_date' => ['required', 'date', 'after_or_equal:booking_start_date', 'before_or_equal:event_date'],
        ];
    }
}
