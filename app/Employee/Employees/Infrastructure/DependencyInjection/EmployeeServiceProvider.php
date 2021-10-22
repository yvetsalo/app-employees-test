<?php

namespace App\Employee\Employees\Infrastructure\DependencyInjection;

use App\Employee\Employees\Domain\Repository\EmployeeRepositoryInterface;
use App\Employee\Employees\Domain\Repository\PositionRepositoryInterface;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Repository\EloquentEmployeeRepository;
use App\Employee\Employees\Infrastructure\Persistance\Eloquent\Repository\EloquentPositionRepository;
use Illuminate\Support\ServiceProvider;

class EmployeeServiceProvider extends ServiceProvider
{
    public function register()
    {
        $this->app->bind(EmployeeRepositoryInterface::class, EloquentEmployeeRepository::class);
        $this->app->bind(PositionRepositoryInterface::class, EloquentPositionRepository::class);
    }
}
