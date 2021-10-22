<?php

namespace App\Employee\Employees\Application\Http\Controllers;

use App\Employee\Employees\Application\Actions\GetEmployeeAction;
use App\Employee\Employees\Application\Actions\StoreEmployeeAction;
use App\Employee\Employees\Application\Actions\UpdateEmployeeAction;
use App\Employee\Employees\Application\Actions\DeleteEmployeeAction;
use App\Employee\Employees\Application\Mappers\EmployeeMapper;
use App\Employee\Employees\Application\Validation\EmployeeValidator;
use Illuminate\Http\Request;

class EmployeeController
{
    public function store(Request $request, EmployeeMapper $employeeMapper, StoreEmployeeAction $storeEmployeeAction)
    {
        $data = $request->all();

        $storeEmployeeAction($data);

        return response()->noContent();
    }

    public function update(Request $request, EmployeeMapper $employeeMapper, UpdateEmployeeAction $updateEmployeeAction)
    {
        $data = $request->all();

        $data['id'] = $request->route()->parameter('employee');

        $employee = $updateEmployeeAction($data);

        return response()->json($employeeMapper->employeeToArray($employee));
    }

    public function delete(Request $request, DeleteEmployeeAction $deleteEmployeeAction)
    {
        $deleteEmployeeAction($request->route('employee'));

        return response()->noContent();
    }

    public function show(Request $request, GetEmployeeAction $getEmployeeAction, EmployeeMapper $employeeMapper)
    {
        $id = $request->route()->parameter('employee');

        $employee = $getEmployeeAction($id);

        return response()->json($employeeMapper->employeeToArray($employee));
    }
}
