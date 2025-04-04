<?php

declare(strict_types=1);

namespace models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Invoice extends Model
{
    CONST UPDATED_AT = null;

    public function items(): HasMany
    {
        return $this->hasMany(InvoiceItem::class);
    }
}