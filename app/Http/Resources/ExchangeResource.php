<?php

namespace App\Http\Resources;

use Illuminate\Contracts\Support\Arrayable;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ExchangeResource extends JsonResource
{
   public static $wrap = null;

    /**
     * Transform the resource into an array.
     *
     * @param  Request  $request
     *
     * @return array|Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        // TODO: response data {"exchange_rate": 0.25, "udpated_at": "2022-01-01 23:59:59"}
        return [
          'exchange_rate' => $this->resource['exchange_rate'],
          'updated_at'    => $this->resource['updated_at']
        ];
    }
}