<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoriesResource extends JsonResource
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
            "goods_amount"=> $this->cgoods()->get()->count(),
            "goods_list"=> $this->cgoods()->select('id', 'name', 'cost', 'producers_id')->get()
        ];
    }
}
