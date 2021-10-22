<?php

namespace Tests\Functional\Employee;

use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeDeleteTest extends TestCase
{
    use RefreshDatabase;

    public function test_delete_employee()
    {
        $employee = Employee::factory()->create();

        $this->assertDatabaseCount('employees', 1);

        $this->delete(route('employee-delete', ['employee' => $employee->id]))->assertSuccessful();

        $this->assertDatabaseCount('employees', 0);
    }
}
