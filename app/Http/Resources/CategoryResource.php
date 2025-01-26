<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class CategoryResource extends JsonResource
{
    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            'short_code' => $this->short_code,
            'category_parent' => $this->category_parent,
            'description' => $this->description,
            'path_image' => $this->path_image,
            'products' => $this->products,
            'is_activated' => $this->is_activated ? "Si" : "No",
        ];
    }
}
