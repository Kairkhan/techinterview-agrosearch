<?php

declare(strict_types=1);

namespace App\Modules\Billing\Services;

use App\Modules\Billing\Contracts\Queries\GetByIdProductQuery;
use App\Modules\Billing\Contracts\Services\CalculatorService as CalculatorServiceContract;
use App\Modules\Billing\DTO\CalculatePriceWithTaxDTO;
use App\Modules\Billing\DTO\PriceDTO;
use App\Modules\Billing\Models\Country;
use App\Modules\Billing\Pipes\GermanyProductTaxPipe;
use App\Modules\Billing\Pipes\GreeceProductTaxPipe;
use App\Modules\Billing\Pipes\ItalyProductTaxPipe;
use Illuminate\Contracts\Pipeline\Pipeline;

final class CalculatorService implements CalculatorServiceContract
{
    public function __construct(
      private readonly GetByIdProductQuery $productQuery
    ) {
    }

    public function getPriceWithTax(PriceDTO $dto): int
    {
        $countryId = $this->getCountryIdByTaxNumber($dto->getTaxNumber());
        $product   = $this->productQuery->getById($dto->getProductId());

        return app(Pipeline::class)
            ->send(new CalculatePriceWithTaxDTO($product->getPrice(), $countryId))
            ->through([
                GermanyProductTaxPipe::class,
                ItalyProductTaxPipe::class,
                GreeceProductTaxPipe::class
            ])
            ->thenReturn();
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
