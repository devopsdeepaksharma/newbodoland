<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class VillageCouncilDevelopmentCommittee extends Model
{
    use HasFactory;

    protected $fillable = [
        'vcdc_name',
        'block_id'
    ];

    /**
     * Get the block that owns the VillageCouncilDevelopmentCommittee
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function block(): BelongsTo
    {
        return $this->belongsTo(Block::class);
    }


    /**
     * Get all of the villages for the VillageCouncilDevelopmentCommittee
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function villages(): HasMany
    {
        return $this->hasMany(Village::class);
    }
}
