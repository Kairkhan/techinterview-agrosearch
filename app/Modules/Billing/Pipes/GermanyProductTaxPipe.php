<?php

declare(strict_types=1);

namespace App\Modules\Billing\Pipes;

use App\Modules\Billing\DTO\CalculatePriceWithTaxDTO;
use App\Modules\Billing\Models\Country;

final class GermanyProductTaxPipe
{
    public function handle(CalculatePriceWithTaxDTO $dto, \Closure $next)
    {
        if ($dto->countryId === Country::ID_GERMANY) {
            return $dto->productPrice * (1 + Country::TAX_PERCENT_GERMANY / 100);
        }

        return $next($dto);
    }
}
