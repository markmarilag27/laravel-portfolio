<?php

declare(strict_types=1);

namespace App\Models\Traits;

use Illuminate\Database\Eloquent\Model;
use Ramsey\Uuid\Uuid;

trait HasUuid
{
    /**
     * Perform any actions required after the model boots.
     *
     * @return void
     */
    protected static function bootHasUuid(): void
    {
        static::creating(function (Model $model): void {
            $model->setAttribute('uuid', (string) Uuid::uuid4());
        });
    }
}
