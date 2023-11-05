<?php

declare(strict_types=1);

namespace App\Modules\Billing\Requests;

use App\Modules\Billing\DTO\PriceDTO;
use App\Modules\Billing\Rules\ValidTaxNumberRule;
use Illuminate\Foundation\Http\FormRequest;

final class CalculatorRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            "productId" => ["required", "int", "exists:products,id"],
            "taxNumber" => ['required', "string", "max:11", new ValidTaxNumberRule]
        ];
    }

    public function getDTO(): PriceDTO
    {
        return PriceDTO::fromRequest($this);
    }
}
