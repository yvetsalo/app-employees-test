<?php

namespace App\Employee\Employees\Infrastructure\Persistance\Eloquent\Repository;

use App\Core\Domain\Exceptions\ModelNotFoundException;
use App\Employee\Employees\Domain\Position;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Models\Position as PositionEntity;
use App\Employee\Employees\Domain\Repository\PositionRepositoryInterface;

class EloquentPositionRepository implements PositionRepositoryInterface
{
    public function getById(int $id): Position
    {
        $entity = PositionEntity::query()->find($id);

        if (!$entity) {
            throw new ModelNotFoundException(sprintf('Position %s not found', $entity->getId()));
        }

        return $this->toDomain($entity);
    }

    private function toDomain(PositionEntity $position): Position
    {
        return new Position($position->id, $position->name, $position->is_management);
    }
}
