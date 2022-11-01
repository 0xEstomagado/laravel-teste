<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class Product extends JsonResource
{
    public function toArray($request){
        return [
          'id' => $this->id,
          'name' => $this->name,
          'code_bar' => $this->code_bar,
          'description' => $this->description,
          'photo' => $this->photo,
          'quantity' => $this->quantity
        ];
    }
}