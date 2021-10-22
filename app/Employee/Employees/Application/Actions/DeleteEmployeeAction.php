<?php

namespace App\Employee\Employees\Application\Actions;

use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;

class DeleteEmployeeAction
{
    private EmployeeRepositoryInterface $employeeRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository)
    {
        $this->employeeRepository = $employeeRepository;
    }

    public function __invoke(int $employeeId): void
    {
        $this->employeeRepository->deleteById($employeeId);
    }
}
