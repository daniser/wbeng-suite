<?php

declare(strict_types=1);

namespace TTBooking\WBEngine\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @property-read int $flightGroupId
 */
class SelectRequest extends FormRequest
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
     * @return array<string, mixed>
     */
    public function rules(): array
    {
        return [
            'flightGroupId' => 'required|integer',
        ];
    }

    /**
     * Get custom attributes for validator errors.
     *
     * @return array<string, mixed>
     */
    public function attributes(): array
    {
        /** @var array<string, mixed> */
        return (array) trans('wbeng-suite::validation.attributes');
    }

    protected function passedValidation(): void
    {
        $this['flightGroupId'] = (int) $this['flightGroupId']; // @phpstan-ignore cast.int
    }
}
