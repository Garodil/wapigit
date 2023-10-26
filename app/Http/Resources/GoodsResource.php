<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class GoodsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        $rating[0] = $this->ratings->count();
        $rating[1] = round($this->ratings->average('rate'),0,PHP_ROUND_HALF_UP) . " on average";
        if ($rating[0] != 0) {$rating[0] .= " rate(s)";} else $rating = "No rating";

        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "cost"=> $this->cost,
            "producer"=> $this->producers()->select('id','name')->first(),
            "category"=> $this->categories()->select('id','name')->first(), 
            "rating"=> $rating, 
        ];


    }
}
