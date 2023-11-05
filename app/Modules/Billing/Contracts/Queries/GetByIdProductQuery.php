<?php

declare(strict_types=1);

namespace App\Modules\Billing\Contracts\Queries;

use App\Modules\Billing\Models\Product;

interface GetByIdProductQuery
{
    public function getById(int $productId): ?Product;
}
