<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class RatingsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id" => $this->id,
            "rate" => $this->rate,
            "goods_id" => $this->goods_id,
            "good" => $this->goods()->select('id','name','cost','categories_id','producers_id')->first(),
            "good_average_rate" => round($this->goods()->get()->first()->ratings->average('rate'),0,PHP_ROUND_HALF_UP)
        ];
    }
}
