<?php

declare(strict_types=1);

namespace App\Modules\Billing\DTO;

use Illuminate\Http\Request;

final class PriceDTO
{
    private int $productId;
    private string $taxNumber;

    public static function fromRequest(Request $request): self
    {
        $self            = new self();
        $self->productId = $request->input('productId');
        $self->taxNumber = $request->input('taxNumber');

        return $self;
    }


    public function getProductId(): int
    {
        return $this->productId;
    }

    public function getTaxNumber(): string
    {
        return $this->taxNumber;
    }
}
