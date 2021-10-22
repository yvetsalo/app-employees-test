<?php

namespace App\Employee\Employees\Application\Mappers;

use App\Employee\Employees\Domain\Employee;
use App\Employee\Employees\Domain\Position;
use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;
use App\Employee\Employees\Domain\Repository\PositionRepositoryInterface;
use Illuminate\Support\Carbon;

class EmployeeMapper
{
    private EmployeeRepositoryInterface $employeeRepository;
    private PositionRepositoryInterface $positionRepository;

    public function __construct(EmployeeRepositoryInterface $employeeRepository, PositionRepositoryInterface $positionRepository)
    {
        $this->employeeRepository = $employeeRepository;
        $this->positionRepository = $positionRepository;
    }

    public function employeeFromArray(array $data): Employee
    {
        return new Employee(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $this->positionRepository->getById($data['position_id']),
            $data['superior_id'] ? $this->employeeRepository->getById($data['superior_id']) : null,
            $data['start_date'] ? Carbon::parse($data['start_date']) : null,
            $data['end_date'] ? Carbon::parse($data['end_date']) : null,
        );
    }

    public function employeeToArray(?Employee $employee): ?array
    {
        if (!$employee) {
            return null;
        }
        return [
            'id' => $employee->getId(),
            'name' => $employee->getName(),
            'position' => $this->positionToArray($employee->getPosition()),
            'superior' => $this->employeeToArray($employee->getSuperior()),
            'startDate' => $employee->getStartDate(),
            'endDate' => $employee->getEndDate(),
        ];
    }

    private function positionToArray(Position $position)
    {
        return [
            'position_id' => $position->getId(),
        ];
    }
}
