<?php

namespace App\Core\Domain\Criteria;

class SingleValueCriteria
{
    private string|int|float|bool $value;

    public function __construct(float|bool|int|string $value)
    {
        $this->value = $value;
    }

    public function getValue(): float|bool|int|string
    {
        return $this->value;
    }
}
