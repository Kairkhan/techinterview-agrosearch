<?php

declare(strict_types=1);

namespace App\Modules\Billing\Pipes;

use App\Modules\Billing\DTO\CalculatePriceWithTaxDTO;
use App\Modules\Billing\Models\Country;

final class ItalyProductTaxPipe
{
    public function handle(CalculatePriceWithTaxDTO $dto, \Closure $next)
    {
        if ($dto->countryId === Country::ID_ITALY) {
            return $dto->productPrice * (1 + Country::TAX_PERCENT_ITALY / 100);
        }

        return $next($dto);
    }
}
