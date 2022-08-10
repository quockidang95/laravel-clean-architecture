<?php

namespace App\Domain\Users\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class UserResource
 *
 * @mixin \App\Domain\Users\Entities\User
 */
class UserResource extends JsonResource
{
    /**
     * {@inheritdoc}
     */
    public function toArray($request)
    {
        return [
            'id'    => $this->id,
            'email' => $this->email,
            'name'  => $this->name,
            'email_verified_at' => $this->email_verified_at
        ];
    }
}
