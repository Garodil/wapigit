<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProducersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            "id"=> $this->id,
            "name"=> $this->name,
            "goods_amount"=> $this->pgoods()->get()->count(),
            "goods_list"=> $this->pgoods()->select('id','name','cost','categories_id')->get(),
        ];
    }
}
