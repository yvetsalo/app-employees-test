<?php

namespace App\Core\Domain\Criteria;

class OrderedSingleValueCriteria
{
    private string|int|float|bool $value;
    //todo add enum for order or something..
    private string $order;

    public function __construct(float|bool|int|string $value, string $order)
    {
        $this->value = $value;
        $this->order = $order;
    }

    public function getValue(): float|bool|int|string
    {
        return $this->value;
    }

    public function getOrder(): string
    {
        return $this->order;
    }
}
