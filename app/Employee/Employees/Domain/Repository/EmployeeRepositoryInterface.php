<?php

namespace App\Employee\Employees\Domain\Repository;

use App\Employee\Employees\Domain\Employee;

interface EmployeeRepositoryInterface
{
    public function save(Employee $employee): void;

    public function update(Employee $employee): Employee;

    public function deleteById(int $id): void;

    public function searchList(EmployeeListRepositoryFilter $filter);

    public function getById(int $id): Employee;
}
