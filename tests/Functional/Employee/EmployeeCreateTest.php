<?php

namespace Tests\Functional\Employee;

use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Position;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeCreateTest extends TestCase
{
    use RefreshDatabase;

    public function test_store_advisor()
    {

        $this->assertDatabaseCount('employees', 0);

        $insertData = [
            'name' => 'newName',
            'position_id' => Position::factory()->create()->id,
            'superior_id' => null,
            'start_date' => now()->toW3cString(),
            'end_date' => now()->addDay()->toW3cString(),
        ];

        $response = $this->put(route('employee-store'), $insertData)->assertSuccessful();

        $this->assertDatabaseCount('employees', 1);

        $employee = Employee::query()->first();

        $this->assertEquals($insertData['name'], $employee->name);
        $this->assertEquals($insertData['position_id'], $employee->position_id);
        $this->assertEquals($insertData['superior_id'], $employee->superior_id);
        $this->assertEquals($insertData['start_date'], $employee->start_date->toW3cString());
        $this->assertEquals($insertData['end_dae'], $employee->end_date->toW3cString());
    }
}
