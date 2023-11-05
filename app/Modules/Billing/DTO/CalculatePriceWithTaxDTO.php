<?php

declare(strict_types=1);

namespace App\Modules\Billing\DTO;

final class CalculatePriceWithTaxDTO
{
    public function __construct(
      public readonly int $productPrice,
      public readonly int $countryId
    ) {
    }
}
