<?php

declare(strict_types=1);

namespace App\Modules\Billing\Services;

use App\Modules\Billing\Contracts\Services\CalculatorService as CalculatorServiceContract;
use App\Modules\Billing\DTO\PriceDTO;
use App\Modules\Billing\Models\Country;

final class CalculatorService implements CalculatorServiceContract
{
    public function getPriceWithTax(PriceDTO $dto): int
    {
        $countryId = $this->getCountryIdByTaxNumber($dto->getTaxNumber());

    }

    private function getCountryIdByTaxNumber(string $taxNumber): int
    {
        return match (substr($taxNumber, 0, 2)) {
            "DE" => Country::ID_GERMANY,
            "IT" => Country::ID_ITALY,
            "GR" => Country::ID_GREECE,
            default => throw new \DomainException('Invalid tax number!')
        };
    }
}
