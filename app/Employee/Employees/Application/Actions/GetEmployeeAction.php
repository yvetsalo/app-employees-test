<?php

namespace App\Employee\Employees\Application\Actions;

use App\Employee\Employees\Domain\Employee;
use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;

class GetEmployeeAction
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function __invoke(int $employeeId): Employee
    {
        return $this->employeeRepository->getById($employeeId);
    }
}
