<?php

declare(strict_types=1);

namespace App\Http\Resources\API;

use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Contracts\Support\Arrayable;
use JsonSerializable;

class UserResource extends JsonResource
{
    public function toArray($request): array|Arrayable|JsonSerializable
    {
        return [
            'uuid'                           => $this->uuid,
            'name'                           => $this->name,
            'email'                          => $this->email,
            'email_verified_at'              => $this->email_verified_at,
            'updated_at'                     => $this->updated_at,
            'created_at'                     => $this->created_at,
        ];
    }
}
