<?php

declare(strict_types=1);

namespace App\Modules\Billing\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $price
 */
final class Product extends Model
{
    public function getPrice(): int
    {
        return $this->price;
    }
}
