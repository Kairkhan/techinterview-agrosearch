<?php

declare(strict_types=1);

namespace App\Modules\Billing\Queries;

use App\Modules\Billing\Contracts\Queries\GetByIdProductQuery;
use App\Modules\Billing\Models\Product;

final class ProductQuery implements GetByIdProductQuery
{

    public function getById(int $productId): ?Product
    {
        /** @var ?Product $product */
        $product = Product::query()
            ->find($productId);

        return $product;
    }
}
