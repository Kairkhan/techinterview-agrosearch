<?php

declare(strict_types=1);

namespace App\Modules\Billing\Models;

use Database\Factories\ProductFactory;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * @property int $id
 * @property int $price
 */
final class Product extends Model
{
    use HasFactory;

    protected static function newFactory(): ProductFactory
    {
        return ProductFactory::new();
    }

    public function getId(): int
    {
        return $this->id;
    }


    public function getPrice(): int
    {
        return $this->price;
    }
}
