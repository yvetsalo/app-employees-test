<?php

namespace App\Employee\Employees\Domain;

use App\Core\Domain\Criteria\OffsetCriteria;
use App\Core\Domain\Criteria\OrderedSingleValueCriteria;
use App\Core\Domain\Criteria\SingleValueCriteria;

class EmployeesListFilter
{
    private OffsetCriteria $offsetCriteria;
    private SingleValueCriteria $nameCriteria;
    private OrderedSingleValueCriteria $language;
    private OrderedSingleValueCriteria $availability;

    public function setOffsetCriteria(OffsetCriteria $offsetCriteria): void
    {
        $this->offsetCriteria = $offsetCriteria;
    }

    public function setNameCriteria(SingleValueCriteria $nameCriteria): void
    {
        $this->nameCriteria = $nameCriteria;
    }

    public function setLanguage(OrderedSingleValueCriteria $language): void
    {
        $this->language = $language;
    }

    public function setAvailability(OrderedSingleValueCriteria $availability): void
    {
        $this->availability = $availability;
    }

    public function getOffsetCriteria(): OffsetCriteria
    {
        return $this->offsetCriteria;
    }

    public function getNameCriteria(): SingleValueCriteria
    {
        return $this->nameCriteria;
    }

    public function getLanguage(): OrderedSingleValueCriteria
    {
        return $this->language;
    }

    public function getAvailability(): OrderedSingleValueCriteria
    {
        return $this->availability;
    }
}
