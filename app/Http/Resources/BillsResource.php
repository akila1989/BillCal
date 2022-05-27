<?php

namespace App\Http\Resources;

use App\Models\Bill;
use Illuminate\Http\Resources\Json\JsonResource;

class BillsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id' => (string)$this -> id,
            'name' => $this -> name,
            'type' => Bill::BILL_TYPE,
            'units' => (string)$this -> units,
            'cost' => (string) $this -> cost,
            'meta_data' => [
                'created' => $this -> created_at,
                'updated' => $this -> updated_at
            ]
        ];
    }
}
