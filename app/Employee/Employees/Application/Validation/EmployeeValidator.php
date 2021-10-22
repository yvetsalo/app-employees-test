<?php

namespace App\Employee\Employees\Application\Validation;

use Carbon\Carbon;
use Illuminate\Support\Facades\Validator;

class EmployeeValidator
{
    public function validate(array $employee): array
    {
        return Validator::make($employee, [
            'name' => 'string|max:255|required',
            'position_id' => 'required|exists:positions,id',
            'superior_id' => 'nullable|exists:employees,id',
            'start_date' => 'date_format:' . Carbon::W3C,
            'end_date' => 'date_format:' . Carbon::W3C . '|after:start_date',
        ])->errors()->toArray();
    }
}
