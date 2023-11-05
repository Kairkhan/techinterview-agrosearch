<?php

declare(strict_types=1);

namespace App\Modules\Billing\Controllers\v1;

use App\Http\Controllers\Controller;
use App\Modules\Billing\Contracts\Services\CalculatorService;
use App\Modules\Billing\Requests\CalculatorRequest;
use Illuminate\Http\JsonResponse;

final class CalculatorController extends Controller
{
    public function __construct(
      private readonly CalculatorService $service
    ) {
    }

    public function calculate(CalculatorRequest $request): JsonResponse
    {
        $price = $this->service->getPriceWithTax($request->getDTO());

        return response()->json([
            'price' => $price
        ]);
    }
}
