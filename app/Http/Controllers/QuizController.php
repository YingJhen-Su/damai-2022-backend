<?php

namespace App\Http\Controllers;

use App\Http\Resources\ExchangeResource;
use App\Services\ExchangeService;

use Exception;
use Illuminate\Http\Request;

/**
 *
 */
class QuizController extends Controller
{
    private $exchangeService;

    public function __construct(
        ExchangeService $exchangeService
    ) {
        $this->exchangeService = $exchangeService;
    }

    public function getExchangeRate(Request $request)
    {
        $response = collect([]);

        // TODO: 實作取得匯率
        $from = $request->query('from');
        $to   = $request->query('to');

        try {
          $response = $this->exchangeService->getExchangeRate($from, $to);
        } catch (Exception $e) {
          return response()->json(["message" => "input error"], 400);
        }

        // API回傳結果
        return new ExchangeResource($response);
    }
}