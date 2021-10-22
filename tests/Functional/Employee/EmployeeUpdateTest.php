<?php

namespace Tests\Functional\Employee;

use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeUpdateTest extends TestCase
{
    use RefreshDatabase;

    public function test_update_employee()
    {
        $employee = Employee::factory()->create();

        $newPosition = Position::factory()->create();

        $updateData = [
            'name' => 'newName',
            'position_id' => $newPosition->id,
            'superior_id' => null,
            'start_date' => now()->toW3cString(),
            'end_date' => now()->addDay()->toW3cString(),
        ];

        $response = $this->post(route('employee-update', ['employee' => $employee->id]), $updateData)->assertSuccessful();

        $employee->refresh();

        $this->assertEquals($updateData['name'], $employee->name);
        $this->assertEquals($updateData['position_id'], $employee->position_id);
        $this->assertEquals($updateData['superior_id'], $employee->superior_id);
        $this->assertEquals($updateData['start_date'], $employee->start_date->toW3cString());
        $this->assertEquals($updateData['end_dae'], $employee->end_date->toW3cString());
    }
}
