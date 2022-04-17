<?php

namespace App\Services;

use App\Constants\CurrencyConstant;
use App\Repositories\CurrencyRepository;
use Exception;

/**
 *
 */
class ExchangeService
{
    private $currencyRepo;

    public function __construct(CurrencyRepository $currencyRepository)
    {
        $this->currencyRepo = $currencyRepository;
    }

    public function getExchangeRate(string $from, string $to, $amount = 1)
    {
      $fromRate = $this->currencyRepo->getExchangeRate($from);
      $toRate   = $this->currencyRepo->getExchangeRate($to);
      if (empty($fromRate) || empty($toRate)) {
        throw new Exception();
      }

      $exchangeRate = $toRate['Exrate']/$fromRate['Exrate'];
      $exchangeDate = date('Y-m-d H:i:s', strtotime($fromRate['UTC']) + 8*3600);

      return array(
        'exchange_rate' => $exchangeRate,
        'updated_at'    => $exchangeDate
      );
    }
}