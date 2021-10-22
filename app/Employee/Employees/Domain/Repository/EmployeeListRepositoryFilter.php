<?php

namespace App\Employee\Employees\Domain\Repository;

use App\Employee\Employees\Domain\EmployeesListFilter;

interface EmployeeListRepositoryFilter
{
    public function apply(object $context);

    public function setFilter(EmployeesListFilter $employeesListFilter);
}
