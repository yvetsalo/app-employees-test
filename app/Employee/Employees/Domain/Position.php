<?php

namespace App\Employee\Employees\Domain;

class Position
{
    private ?int $id;
    private string $name;
    private bool $isManagement;

    public function __construct(?int $id, string $name, bool $isManagement)
    {
        $this->id = $id;
        $this->name = $name;
        $this->isManagement = $isManagement;
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

    public function isManagement(): bool
    {
        return $this->isManagement;
    }

    public function setIsManagement(bool $isManagement): void
    {
        $this->isManagement = $isManagement;
    }

    public static function fromArray(array $data)
    {
        return new self(
            $data['id'],
            $data['name'],
            $data['isManagement'],
        );
    }
}
