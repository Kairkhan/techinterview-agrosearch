<?php

declare(strict_types=1);

namespace App\Modules\Billing\Pipes;

use App\Modules\Billing\DTO\CalculatePriceWithTaxDTO;
use App\Modules\Billing\Models\Country;

final class GreeceProductTaxPipe
{
    public function handle(CalculatePriceWithTaxDTO $dto, \Closure $next)
    {
        if ($dto->countryId === Country::ID_GREECE) {
            return $dto->productPrice * (1 + Country::TAX_PERCENT_GREECE / 100);
        }

        return $next($dto);
    }
}
