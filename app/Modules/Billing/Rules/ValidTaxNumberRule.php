<?php

declare(strict_types=1);

namespace App\Modules\Billing\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

final class ValidTaxNumberRule implements ValidationRule
{
    private string $pattern = "/\b([A-Z]{2})([0-9]{9})\b/";
    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        if (!preg_match($this->pattern, $value)) {
            $fail("Invalid tax number!");
        }
    }
}
