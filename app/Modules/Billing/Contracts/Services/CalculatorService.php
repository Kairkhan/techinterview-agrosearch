<?php

declare(strict_types=1);

namespace App\Modules\Billing\Contracts\Services;

use App\Modules\Billing\DTO\PriceDTO;

interface CalculatorService
{
    public function getPriceWithTax(PriceDTO $dto): int;
}
