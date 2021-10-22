<?php

namespace App\Core\Domain\Criteria;

class OffsetCriteria
{
    private int $offsetStart;
    private int $offsetEnd;

    public function __construct(int $offsetStart, int $offsetEnd)
    {
        $this->offsetStart = $offsetStart;
        $this->offsetEnd = $offsetEnd;
    }

    public function getOffsetStart(): int
    {
        return $this->offsetStart;
    }

    public function getOffsetEnd(): int
    {
        return $this->offsetEnd;
    }
}
