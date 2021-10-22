<?php

namespace App\Employee\Employees\Domain\Repository;

use App\Employee\Employees\Domain\Position;

interface PositionRepositoryInterface
{
    public function getById(int $id): Position;
}
