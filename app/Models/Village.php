<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Village extends Model
{
    use HasFactory;


    /**
     * Get the vcdc that owns the Village
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function vcdc(): BelongsTo
    {
        return $this->belongsTo(VillageCouncilDevelopmentCommittee::class);
    }
}
