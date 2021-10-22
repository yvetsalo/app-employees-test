<?php

namespace App\Employee\Employees\Infrastructure\Persistance\Eloquent\Repository;

use App\Employee\Employees\Domain\Employee;
use App\Employee\Employees\Domain\EmployeesListFilter;
use App\Employee\Employees\Domain\Position;
use App\Employee\Employees\Domain\Repository\EmployeeListRepositoryFilter;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Employee as EmployeeEntity;
use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;
use App\Core\Domain\Exceptions\ModelNotFoundException;

class EloquentEmployeeRepository implements EmployeeRepositoryInterface
{
    public function save(Employee $employee): void
    {
        EmployeeEntity::query()->create(([
            'name' => $employee->getName(),
            'position_id' => $employee->getPosition()->getId(),
            'superior_id' => $employee->getSuperior() ? $employee->getSuperior()->getId() : null,
            'start_date' => $employee->getStartDate(),
            'end_date' => $employee->getEndDate(),
        ]));
    }

    public function update(Employee $employee): Employee
    {
        $employeeEntity = EmployeeEntity::query()->find($employee->getId());

        if (!$employeeEntity) {
            throw new ModelNotFoundException(sprintf('Employee %s not found', $employee->getId()));
        }

        $employeeEntity->update([
            'name' => $employee->getName(),
            'position_id' => $employee->getPosition()->getId(),
            'superior_id' => $employee->getSuperior() ? $employee->getSuperior()->getId() : null,
            'start_date' => $employee->getStartDate(),
            'end_date' => $employee->getEndDate(),
        ]);

        return $this->toDomain($employeeEntity);
    }

    public function deleteById(int $id): void
    {
        $employeeEntity = EmployeeEntity::query()->find($id);

        if (!$employeeEntity) {
            throw new ModelNotFoundException(sprintf('Employee %s not found', $id));
        }

        $employeeEntity->delete();
    }

    public function searchList(EmployeeListRepositoryFilter $filter)
    {
        $qb = EmployeeEntity::query()->select('employees.*')->getQuery();

        $filter->apply($qb);
        //@todo implement return
    }

    public function getById(int $id): Employee
    {
        $employeeEntity = EmployeeEntity::query()->find($id);

        return $this->toDomain($employeeEntity);
    }

    private function toDomain(?EmployeeEntity $employee): ?Employee
    {
        if (!$employee) {
            return null;
        }

        return Employee::fromArray([
            'id' => $employee->id,
            'name' => $employee->name,
            'superior' => $this->toDomain($employee->superior),
            'position' => Position::fromArray(['id' => $employee->position->id, 'name' => $employee->position->name, 'isManagement' => $employee->position->is_management]),
            'startDate' => $employee->start_date,
            'endDate' => $employee->end_date,
        ]);
    }
}
