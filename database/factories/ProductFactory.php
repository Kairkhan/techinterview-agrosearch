<?php

declare(strict_types=1);

namespace Database\Factories;

use App\Modules\Billing\Models\Product;
use Illuminate\Database\Eloquent\Factories\Factory;

final class ProductFactory extends Factory
{
    protected $model = Product::class;

    public function definition(): array
    {
        return [
            'name' => fake()->name(),
            'price' => fake()->numberBetween(),
        ];
    }
}
