<?php

declare(strict_types=1);

namespace Tests\Feature;

use App\Modules\Billing\Models\Product;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

final class CalculatorTest extends TestCase
{
    use WithFaker;

    protected function setUp(): void
    {
        parent::setUp();
        $this->withoutExceptionHandling();
    }

    public function testCalculateProductPriceWithTax()
    {
        $number = $this->faker->numerify("#########");
        $countryID = $this->faker->randomElement([
            "DE",
            "GR",
            "IT"
        ]);

        /** @var Product $product */
        $product   = Product::factory()->create();
        $taxNumber = $countryID . $number;

        $response = $this->getJson(route('v1.calculator.calculate', [
            'productId' => $product->getId(),
            'taxNumber' => $taxNumber
        ]));

        $response->assertSuccessful()
            ->assertJsonStructure([
                'price'
            ]);
    }
}
