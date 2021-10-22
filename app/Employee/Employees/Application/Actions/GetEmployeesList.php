<?php

namespace App\Employee\Employees\Application\Actions;

use App\Employee\Employees\Domain\EmployeesListFilter;
use App\Employee\Employees\Domain\Repository\EmployeeListRepositoryFilter;
use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;

class GetEmployeesList
{
    private EmployeeRepositoryInterface $employeeRepository;
    private EmployeeListRepositoryFilter $employeeListRepositoryFilter;

    public function __construct(EmployeeRepositoryInterface $employeeRepository, EmployeeListRepositoryFilter $employeeListRepositoryFilter)
    {
        $this->employeeRepository = $employeeRepository;
        $this->employeeListRepositoryFilter = $employeeListRepositoryFilter;
    }

    public function __invoke(EmployeesListFilter $employeesListFilter)
    {
        //@todo implement
    }
}
