<?php

namespace Tests\Functional\Employee;

use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class EmployeeShowTest extends TestCase
{
    use RefreshDatabase;

    public function test_show_employee()
    {
        $employee = Employee::factory()->create();

        $response = $this->get(route('employee-show', ['employee' => $employee->id]))->assertSuccessful();

        $data = $response->json();

        $this->assertEquals($employee->id, $data['id']);
    }
}
