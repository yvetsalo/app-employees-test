<?php

namespace App\Employee\Employees\Domain;

use Illuminate\Support\Carbon;

class Employee
{
    private ?int $id;
    private string $name;
    private Position $position;
    private ?Employee $superior;
    private Carbon $startDate;
    private Carbon $endDate;


    public function __construct(?int $id, string $name, Position $position, ?Employee $superior, Carbon $startDate, Carbon $endDate)
    {
        $this->id = $id;
        $this->name = $name;
        $this->position = $position;
        $this->superior = $superior;
        $this->startDate = $startDate;
        $this->endDate = $endDate;
    }

    public function getId(): ?int
    {
        return $this->id;
    }

    public function setId(?int $id): void
    {
        $this->id = $id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function setName(string $name): void
    {
        $this->name = $name;
    }

    public function getPosition(): Position
    {
        return $this->position;
    }

    public function setPosition(Position $position): void
    {
        $this->position = $position;
    }

    public function getSuperior(): ?Employee
    {
        return $this->superior;
    }

    public function setSuperior(?Employee $superior): void
    {
        $this->superior = $superior;
    }

    public function getStartDate(): Carbon
    {
        return $this->startDate;
    }

    public function setStartDate(Carbon $startDate): void
    {
        $this->startDate = $startDate;
    }

    public function getEndDate(): Carbon
    {
        return $this->endDate;
    }

    public function setEndDate(Carbon $endDate): void
    {
        $this->endDate = $endDate;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'] ?? null,
            $data['name'] ?? null,
            $data['position'] ?? null,
            $data['superior'] ?? null,
            $data['startDate'] ?? null,
            $data['endDate'] ?? null,
        );
    }
}
