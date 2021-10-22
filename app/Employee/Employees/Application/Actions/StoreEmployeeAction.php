<?php

namespace App\Employee\Employees\Application\Actions;

use App\Employee\Employees\Application\Mappers\EmployeeMapper;
use App\Employee\Employees\Application\Validation\EmployeeValidator;
use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;
use App\Core\Domain\Exceptions\ModelValidationException;

class StoreEmployeeAction
{
    private EmployeeValidator $validator;
    private EmployeeRepositoryInterface $employeeRepository;
    private EmployeeMapper $employeeMapper;

    public function __construct(EmployeeValidator $validator, EmployeeRepositoryInterface $employeeRepository, EmployeeMapper $employeeMapper)
    {
        $this->validator = $validator;
        $this->employeeRepository = $employeeRepository;
        $this->employeeMapper = $employeeMapper;
    }

    public function __invoke(array $data): void
    {
        if ($errors = $this->validator->validate($data)) {
            throw new ModelValidationException($errors);
        }

        $employee = $this->employeeMapper->employeeFromArray($data);

        $this->employeeRepository->save($employee);
    }
}
